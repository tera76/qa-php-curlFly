<?php
require_once('rca_gateway_functions.php');


/*
*  set test parameters
*/
$start = microtime(true);

$baseUrl="https://broker-metlife-api-dev.tera76tools.it";
$baseUrl_insurance="https://insurance-gateway-api-dev.tera76tools.it";

$userId_not_ass = "giorgio.verde26";
$password_not_ass = "giorgio.verde26";
$contractCode_not_ass = 30003511;

$userId_ass = "tera76man4";
$password_ass = "tera76man4";
$contractCode_ass = 30025177;

$userId_pol = "giorgio.verde28";
$password_pol = "giorgio.verde28";
$contractCode_pol = 30005877;


/*
*  Login call to get token
*/

$testCallresponseJsonAndCode = login_KTB($userId_not_ass, $password_not_ass);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);

$token = $testCallresponse['jwtToken'];
printStepMessage("token from login", $token);

$customerCode = $testCallresponse['infoCliente']['datiCliente']['codiceCliente'];
printStepMessage("customer_code from login", $customerCode);


/*
*  setup
*/

$testCallresponseJsonAndCode = post_metlife_setup($baseUrl, $contractCode_not_ass, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);


/*
*  quote update product 1 not ass
*/

$testCallresponseJsonAndCode = post_metlife_quotation_update($baseUrl, $contractCode_not_ass, 1, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);


/*
*  quote update product 2 not ass
*/

$testCallresponseJsonAndCode = post_metlife_quotation_update($baseUrl, $contractCode_not_ass, 2, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);



/*
*  get policy archive
*/

$testCallresponseJsonAndCode = get_policy_list($baseUrl, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);



/*
*  Login call to get token for ass
*/

$testCallresponseJsonAndCode = login_KTB($userId_ass, $password_ass);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);

$token = $testCallresponse['jwtToken'];
printStepMessage("token from login", $token);

$customerCode = $testCallresponse['infoCliente']['datiCliente']['codiceCliente'];
printStepMessage("customer_code from login", $customerCode);


/*
*  setup
*/

$testCallresponseJsonAndCode = post_metlife_setup($baseUrl, $contractCode_ass, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);



/*
*  quote update product 1
*/

$testCallresponseJsonAndCode = post_metlife_quotation_update($baseUrl, $contractCode_ass, 1, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);


/*
*  quote update product 2
*/

$testCallresponseJsonAndCode = post_metlife_quotation_update($baseUrl, $contractCode_ass, 2, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);


/*
*  get policy archive
*/

$testCallresponseJsonAndCode = get_policy_list($baseUrl, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);





/*
*  Login call to get token for see policies
*/

$testCallresponseJsonAndCode = login_KTB($userId_pol, $password_pol);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);

$token = $testCallresponse['jwtToken'];
printStepMessage("token from login", $token);

$customerCode = $testCallresponse['infoCliente']['datiCliente']['codiceCliente'];
printStepMessage("customer_code from login", $customerCode);


/*
*  get policy archive
*/

$testCallresponseJsonAndCode = get_policy_list($baseUrl, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);


/*
*  call endpoint generali customer  26025479
*/
$customerCode = 26025479;
$testCallresponseJsonAndCode = head_generali_customer( $baseUrl_insurance, $customerCode);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);

/*
*  call endpoint generali customer  26025485
*/
$customerCode = 26025485;
$testCallresponseJsonAndCode = head_generali_customer( $baseUrl_insurance, $customerCode);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json", $testCallresponse);


/*
*  Terminate suite
*/

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);
