<?php
/*
 *  set test parameters
 */
$start = microtime(true);

$baseUrl="https://ws.tera76.com/tera76KTB_REST/ktb/utente/login";
$userId = "robisam";
$passwordArray  = array(
	'robisam1',
	'12345678'
);


/*
 *  Login call to get token
 */

error_reporting(E_ALL ^ E_WARNING);
foreach ($passwordArray as &$password)  {



$request = <<<EOD
{
	"request":{

		"name": "TEST POST LOGIN:",
		"parameters": {
			"url": "__BASEURL__",
			"method": "POST",
			"header": ["content-type: application/json",
				"x-sistema-chiamante: aci"
			],
			"data": {
				"registraAccesso": true,
				"userId": "__USERID__",
				"password": "__PASSWORD__",
				"fromApp": true
			}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__USERID__/', $userId, $request);
$request = preg_replace('/__PASSWORD__/', $password, $request);

$dataToArray = json_decode($request);
$title = $dataToArray->request->name;


$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];


printTitle($title);

printStepMessage("Try password: ", $password);
printErrorCode($testCallresponseCode);

}
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
		else {
			echo "<p style='color: green'><br><br><strong>********* YEAH!!!!!!!! BRUTUS DONE!!!!!!!! ;-) *********</strong><br><p>";
			exit;
		};

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
    $data = json_encode($data);


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
