<?php
/*
 *  set test parameters
 */
$start = microtime(true);

$baseUrl="https://ws.tera76.com";
$username = "MACPAPER";
$password = "MACPAPER";
$customerCode = 26012764;
$contractCode = 750015119;
$codiceTitolo = 35196632;


/*
 *  Login call to get token
 */
$request = <<<EOD
{
	"request": {

		"name": "TEST POST login as server user:",
		"parameters": {
			"url": "__BASEURL__/api/uaa/oauth/token",
			"method": "POST",
			"header": ["content-type: application/x-www-form-urlencoded",
				"X-TPay-App-Version: 2.0.4",
				"Authorization: Basic d2lzZS1zZXJ2ZXI6MkE0eHg4TmdnbTJuNHkkIQ=="
			],
			"dataUrlEncoded": "grant_type=client_credentials"
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);


$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);



$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];



printErrorCode($testCallresponseCode);

$token = $testCallresponse['access_token'];
printStepMessage("token from login", $token);



/*
 *  leggi-profilo
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST leggi-profilo:",
		"parameters": {
			"url": "__BASEURL__/api-third-party/v1/services-support/profilo/leggi-profilo",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__"
			],
			"data": {
				"codiceCliente": "__CUSTOMERCODE__"
			}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CUSTOMERCODE__/', $customerCode, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);
$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));



/*
 *  lleggi-titoli-contratto
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST leggi-titoli-contratto:",
		"parameters": {
			"url": "__BASEURL__/api-third-party/v1/services-support/titoli/leggi-titoli-contratto",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__"
			],
			"data": {
  		"codiceContratto": "__CONTRACTCODE__",
		  "leggiTarghe": true,
  		"statoAutorizzazione": true
							}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CONTRACTCODE__/', $contractCode, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);
$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));



/*
 *  lista-contratti
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST lista-contratti:",
		"parameters": {
			"url": "__BASEURL__/api-third-party/v1/services-support/contratto/lista-contratti",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__"
			],
			"data": {
				"codiceCliente": "__CUSTOMERCODE__"
			}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CUSTOMERCODE__/', $customerCode, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);
$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));

/*
 *  leggi-targhe-consensi
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST GET leggi-targhe-consensi:",
		"parameters": {
			"url": "__BASEURL__/api-third-party/v1/services-support/targa/leggi-targhe-consensi?codiceCliente=__CUSTOMERCODE__",
			"method": "GET",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__"
			],
			"data": {}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CUSTOMERCODE__/', $customerCode, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);
$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));


/*
 *  get pois
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST GET POIs:",
		"parameters": {
			"url": "__BASEURL__/api/services/pois?bboxLon1=0&bboxLat1=0&bboxLon2=90&bboxLat2=90&serviceCode=33",
			"method": "GET",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-TPay-Device-Id: afb0d4a493ba86c7",
				"X-TPay-Latitude: 90",
				"X-TPay-Longitude: 123",
				"X-TPay-GPS-Error: 123",
				"X-TPay-App-Millis: 1000000000"
			]
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);
$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));


/*
 *  post crea-user-id-code
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST CREA_USER_ID_CODE:",
		"parameters": {
			"url": "__BASEURL__/api-third-party/v1/services-support/acquisto-generico/crea-user-id-code",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__"
			],
			"data": {
				"builder": {},
				"codiceContratto": __CONTRACTCODE__,
				"codiceTitolo": __CODICETITOLO__,
				"username": "DUMMY_USERNAME"
			}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CONTRACTCODE__/', $contractCode, $request);
$request = preg_replace('/__CODICETITOLO__/', $codiceTitolo, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);
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

    if (strpos($code, 'OK') == false && strpos($code, '1.1 200') == false) {
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
