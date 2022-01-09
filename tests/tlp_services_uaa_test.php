<?php

$start = microtime(true);

$baseUrl="https://ws-test.tera76.com";
$username = "MACPAPER";
$password = "MACPAPER";


/*
 *  Login call to get token
 */
$request = <<<EOD
{
	"request":{

		"name": "TEST POST LOGIN:",
		"parameters": {
            "url": "https://ws.tera76.com/api/uaa/oauth/token?grant_type=2fa&client_id=tpay-app&username=__USERNAME__&&password=__PASSWORD__&device_id=f57d7f463109a029",
			"method": "POST",
            "header": ["Authorization: Basic dHBheS1hcHA6dHBheS1zM2NyM3Q=",
                       "Content-Type: application/x-www-form-urlencoded",
                       "X-TPay-Device-Id: f57d7f463109a029",
                       "X-TPay-App-Version: 3.3.2",
                       "X-TPay-OS-Type: ios"
            ],
            "data": {

             }
		}
	}
}
EOD;
$request = preg_replace('/__USERNAME__/', $username, $request);
$request = preg_replace('/__PASSWORD__/', $password, $request);
$dataToArray = json_decode($request);
$title = $dataToArray->request->name;

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];


printTitle($title);
printErrorCode($testCallresponseCode);

$token = $testCallresponse['access_token'];
printStepMessage("token from login", $token);

$customerCode = $testCallresponse['customer_code'];
printStepMessage("customer_code from login", $customerCode);




die();

/*
 *  Login call to get token
 */
$request = <<<EOD
{
	"request": {

		"name": "TEST POST LOGIN:",
		"parameters": {
			"url": "https://apigee-x-test.tera76.com/transmit/api/v2/auth/login?aid=appunicatclub&did=92bfe10c-7f6f-4593-9119-075333be0e98&locale=en-US",
			"method": "POST",
			"header": ["Authorization: TSToken 93ffa998-5fc5-4130-9822-554b2b482e6d; tid=tera76-tokenappunica",
				"Content-Type: application/json",
				"Content-Signature: data:MEUCIAMAs7wNytpaDfhMGmNIkmKKqoeTtfXRHwwm4JD/L/VLAiEAg8njTPJS1h5fPHQ7RHEh8DLmLUpukWAZVATs3MH6FIo=;key-id:92bfe10c-7f6f-4593-9119-075333be0e98;scheme:3"
			],
			"data": {
				"headers": [{
					"type": "uid",
					"uid": "TestGL19"
				}],
				"data": {
					"collection_result": {
						"metadata": {
							"scheme_version": 2,
							"version": "5.0.2 (7312)",
							"timestamp": 1636988385
						},
						"content": {
							"hw_authenticators": {
								"device_biometrics": {
									"supported": true,
									"secure": true,
									"user_registered": false,
									"possible_types": ["fingerprint"]
								},
								"fingerprint": {
									"supported": false,
									"secure": false,
									"user_registered": false
								},
								"face_id": {
									"supported": false,
									"secure": false,
									"user_registered": false
								}
							},
							"device_details": {
								"logged_users": 1,
								"hw_type": "Phone",
								"wifi_network": {
									"bssid": "0f607264fc6318a92b9e13c65db7cd3c",
									"ssid": "d9c471b76710fca876003681b785db87"
								},
								"tampered": true,
								"sim_operator": "310260",
								"roaming": false,
								"master_key_generated": 1636969900765,
								"device_model": "Google/Android SDK built for x86",
								"tz": "Europe/Rome",
								"os_version": "10",
								"jailbroken": false,
								"sim_operator_name": "T-Mobile",
								"frontal_camera": true,
								"device_name": "263e7f43cf741091",
								"has_hw_security": false,
								"screen_lock": false,
								"os_type": "Android",
								"sflags": 2147483647,
								"connection": "wifi: 10.0.2.16"
							},
							"installed_packages": ["d4332a2978a5ab71678dba6b7d4e0bf3", "9f9648d16b65b96c9c738a130701cec3", "3c73864f18e54768ed4939429a7de7c0", "e350a43d7d665fd75976e01733d41178", "b7c039c51c133a83a8096a098526d731", "e09f60c45c2dd101155830b89153a05e", "3a7ff3f733abdc70f6774b78da84cda1", "6c70af33cc0c8bb58b3cdafba954835d", "002cfeeaaf303d9c1a9746699773d8e8"],
							"capabilities": {
								"audio_acquisition_supported": true,
								"finger_print_supported": false,
								"image_acquisition_supported": true,
								"persistent_keys_supported": true,
								"face_id_key_bio_protection_supported": false,
								"fido_client_present": false,
								"dyadic_present": false,
								"installed_plugins": [],
								"host_provided_features": "19"
							},
							"collector_state": {
								"accounts": "disabled",
								"devicedetails": "active",
								"contacts": "disabled",
								"owner": "disabled",
								"software": "active",
								"location": "disabled",
								"locationcountry": "disabled",
								"bluetooth": "disabled",
								"externalsdkdetails": "active",
								"hwauthenticators": "active",
								"capabilities": "active",
								"fidoauthenticators": "disabled",
								"largedata": "disabled",
								"localenrollments": "active"
							},
							"local_enrollments": {}
						}
					},
					"policy_request_id": "Refresh_Token",
					"params": {
						"device": "42b0a6e5-051d-4d27-89a5-082205cbb2de",
						"refresh_token": "eyJraWQiOiJ7XCJwcm92aWRlcl90eXBlXCI6XCJkYlwiLFwiYWxpYXNcIjpcImtzcWtleVwiLFwidHlwZVwiOlwibG9jYWxcIixcInZlcnNpb25cIjpcIjFcIn0iLCJhbGciOiJSUzI1NiJ9.eyJvdGhlcl9jdXN0b21lcl9jb2RlIjpbXSwicHJvZmlsZV90eXBlIjoiVExQIiwiY29sbF9jb250cmFjdF9saXN0IjpbXSwidXNlcl9uYW1lIjoidGVzdGdsMTkiLCJhdGkiOiJmZTY1ZjUyOS1jMjJjLTQxMjctOWE2OC04YTlmNTJmMjVhY2QiLCJzY29wZSI6WyJwcm9maWxlVGxwIl0sImNvbnRyYWN0X2xpc3QiOlt7InByb2R1Y3RDb2RlIjoiRkEiLCJpc1RMUCI6dHJ1ZSwiY3VzdG9tZXJDb2RlIjoyNjAxMzQzMywidGVtcGxhdGVDb2RlIjoiRElSRkEiLCJjb250cmFjdFN0YXR1c0NvZGUiOiIwMSIsImNvbnRyYWN0Q29kZSI6MzAwMjU3NjYsImFzc29jaWF0ZWRDb250cmFjdENvZGUiOm51bGx9XSwiZXhwIjoxNjUyNTM4MzU1LCJjdXN0b21lcl9jb2RlIjoyNjAxMzQzMywiaWF0IjoxNjM2OTg2MzU1LCJjbGllbnRfaWQiOiJ0bHAtYXBwIiwianRpIjoiMGJmZDk5OGUtZmZmZi00YTM5LThmYTQtMzg4MTI4N2NiNWZlIn0.jYFPN3WBTFbfhRHMvKJjvsb0JRRNJBKC2IsCQWl9dxaazyRsupTeA57LPVQOFcQepncC_MxuEWHb8hhl6fEFt9evMeMVdlzv5L0bBbW733_XGvkeYPMNMR60WjQPzy46GSZBaUz_qoqzxgxgnC0UvEdMNXdd-fRbcWB7Co3rmiNm4NIHF0hGsarcBpjfR8UUNeVhTUIhiqhzhqn1kKJJp1N8e7ZVLgp9OBzpcMsIVdyCV40OxLZpeoaBh_jlUyJhGJ3pWwY13d90r0v06WIxTJb8xwYs31a1HYuLTbjKHcL5UIhTqzq5BMGH2QvTD7MAs0EIKK3Pd1g6CtBBvWgBpA",
						"grant_type": "CNS",
						"client_id": "tlp-app"
					}
				}
			}
		}
	}
}
EOD;

$dataToArray = json_decode($request);
$title = $dataToArray->request->name;

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];


printTitle($title);
printErrorCode($testCallresponseCode);

$token = $testCallresponse['access_token'];
printStepMessage("token from login", $token);

$customerCode = $testCallresponse['customer_code'];
printStepMessage("customer_code from login", $customerCode);


die();

/*
 *  vehicle v2
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST GET profile/me/vehicles:",
		"parameters": {
			"url": "$baseUrl/api/v2/users/profile/me/vehicles",
			"method": "GET",
			"header": [
				"content-type: application/json",
				"Authorization: Bearer $token",
				"Accept-Encoding: UTF-8",
				"X-TPay-App-Millis: 1636976784207",
				"X-TPay-Connection-Type: fast",
				"X-TPay-App-Version: 4.9.0",
				"X-TPay-OS-Type: Android",
				"X-TPay-OS-Version: 29",
				"X-TPay-Device-Id: f66db951-e1ed-4c6c-9edc-192b7c70ebda",
				"X-TPay-GPS-Error: 0.0",
        "X-TPay-Latitude: 0.0",
        "X-TPay-Longitude: 0.0",
				"X-TPay-Mobile-Network-Type: wifi"
			],
				"data": {}
		}
	}
}
EOD;

$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));




/*
 *  Terminate suite
 */

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);
die();


/*
 *  Now we define some standard function for style and print formatting
 * This can be general or defined in each test report
 */


function printTitle($title)
{


    echo "<br><br><strong>" . $title . "</strong><br>";
}

function printErrorCode($code)
{

	if (strpos($code, 'OK') == false && strpos($code, '1.1 200') == false && strpos($code, '1.1 204' ) == false) {
			echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: </strong><br>" . $code . "<p>";
	}

}

function printStepMessage($step, $value)
{

    echo "<br><br><strong>" . $step . ":  </strong><br>" . $value;


}

function arrayFromCurl($input)
{


    $url = $input->url;
    $method = $input->method;
    $header = $input->header;
    $data = $input->data;
		$dataUrlEncoded = $input->dataUrlEncoded;
		if(is_null($dataUrlEncoded)) {
    $data = json_encode($data);}
		else $data=$dataUrlEncoded;

    $opts = array('http' =>
        array(
            'url' => $url,
            'method' => $method,
            'header' => $header,
            'content' => $data
        )
    );


    ini_set('memory_limit', '256M');
    $context = stream_context_create($opts);
    $curlResponse = file_get_contents($url, false, $context);


    // header("content-type:application/json");
    $response_decode = json_decode($curlResponse, true);
    $response['responseJson'] = $response_decode;
    $response['responseCode'] = $http_response_header[0];


    return $response;

}
