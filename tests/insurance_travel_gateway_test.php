<?php
require_once('rca_gateway_functions.php');


/*
*  set test parameters
*/
$start = microtime(true);

$baseUrl="https://broker-travel-api-dev.tera76tools.it";


$userId = "TestRca163";
$password = "TestRca163";
$contractCode = 30005111;
$codiceTitolo = 35308890;

// $userId = "tera76man4";
// $password = "tera76man4";
// $contractCode = 750015119;
// $codiceTitolo = 35196632;





/*
*  Login call to get token
*/

$testCallresponseJsonAndCode = login_KTB($userId, $password);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);

$token = $testCallresponse['jwtToken'];
printStepMessage("token from login", $token);

$customerCode = $testCallresponse['infoCliente']['datiCliente']['codiceCliente'];
printStepMessage("customer_code from login", $customerCode);


/*
*  post crea user id code
*/

$testCallresponseJsonAndCode = post_crea_user_id_code($contractCode, $codiceTitolo);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);
$userIdCode = $testCallresponse['userIdentificationCode'];
printStepMessage("user id code is", $userIdCode);


/*
*  post quotation
*/

$testCallresponseJsonAndCode = post_travel_quotation($baseUrl, strtolower($userId),$userIdCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);
$quotationId = $testCallresponse['data']['quotation']['id'];
printStepMessage("quotation id is", $quotationId);



/*
*  post policy
*/

$testCallresponseJsonAndCode = post_travel_policy($baseUrl, strtolower($userId),$userIdCode, $quotationId, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);


/*
*  get policy list
*/

$testCallresponseJsonAndCode = post_travel_policy_list_json($token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);



/*
*  Terminate suite
*/

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);
