<?php
require_once('rca_gateway_functions.php');

$baseUrl_ski="https://broker-sci-api-dev.tera76tools.it";
/*
*  set test parameters
*/
$start = microtime(true);



$userArray  = array(
	"medpass52",
	"tera76man4",
	"TestGL10"


);
foreach ($userArray as &$userId)  {

$password = $userId;




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
*  post insurancee policy json
*/

$testCallresponseJsonAndCode = post_insurance_policy_list_json(   $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);


/*
*  post travel policy json
*/

$testCallresponseJsonAndCode = post_travel_policy_list_json(  $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);

/*
*  get metlife policy json
*/

$testCallresponseJsonAndCode = get_metlife_policy_list_json(  $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);

/*
*  get ski policy json
*/

$testCallresponseJsonAndCode = get_ski_policy_list_json($baseUrl_ski, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);





}
/*
*  Terminate suite
*/

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);
