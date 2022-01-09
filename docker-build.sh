#!/bin/sh

# Extract stuff to a temporary folder
mkdir docker-curl-fly
tar -xvzf docker_to_build.tar.gz -C docker-curl-fly

# Build with docker-compose and upload
cd docker-curl-fly
docker-compose up --force-recreate --build -d
docker image prune -f

# Delete temp folders
cd ..
rm -rf docker_to_build.tar.gz docker-curl-fly
