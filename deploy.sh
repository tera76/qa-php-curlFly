#!/bin/sh

mkdir -p ~/.ssh

curl "$BITRISEIO_ID_RSA_URL" -o id_rsa
curl "$BITRISEIO_ID_RSA_PUB_URL" -o id_rsa_pub
chmod 400 ./id_rsa
ssh-add ./id_rsa

# Add Scaleway public key to authorized keys
cat ./id_rsa_pub > ~/.ssh/authorized_keys
eval "$(ssh-agent -s)"

# Tar everything and send
tar -zcvf docker_to_build.tar.gz .
scp -i ./id_rsa docker_to_build.tar.gz root@"$SCALEWAY_HOST":docker_to_build.tar.gz

# Deploy via SSH
ssh -i ./id_rsa root@"$SCALEWAY_HOST" 'bash -s' < './docker-build.sh'