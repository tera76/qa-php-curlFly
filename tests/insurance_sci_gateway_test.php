<?php
require_once('rca_gateway_functions.php');


/*
*  set test parameters
*/
$start = microtime(true);

$baseUrl="https://broker-sci-api-dev.tera76tools.it";
$baseUrl_customer_friend="https://customer-friends-api-dev.tera76tools.it";



$userId = "tera76man4";
$password = "tera76man4";
$contractCode = 30025177;
$customerCode = 26012764;


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
*  setup
*/

$testCallresponseJsonAndCode = get_sci_setup($baseUrl, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);


/*
*  post quotation
*/

$testCallresponseJsonAndCode = post_sci_quotation($baseUrl, $contractCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);
$quotationId = $testCallresponse['data']['quotation']['id'];
printStepMessage("quotation id is", $quotationId);


/*
*  update quotation
*/

$testCallresponseJsonAndCode = post_sci_quotaion_update($baseUrl, $contractCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);


/*
*  post policy
*/

$testCallresponseJsonAndCode = post_sci_policy($baseUrl, $contractCode, $quotationId, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);


/*
*  get policy list
*/

$testCallresponseJsonAndCode = get_policy_list($baseUrl, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response in json:", $testCallresponse);

/*
*  get ski policy json
*/

$testCallresponseJsonAndCode = get_ski_policy_list_json($baseUrl, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);

/*
*  post customer friends hidden
*/

$testCallresponseJsonAndCode = post_customer_friends($baseUrl_customer_friend, $customerCode, "true");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);

/*
*  post customer friends not hidden
*/

$testCallresponseJsonAndCode = post_customer_friends($baseUrl_customer_friend, $customerCode);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);



/*
*  get customer friends
*/

$testCallresponseJsonAndCode = get_customer_friends($baseUrl_customer_friend, $customerCode);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response json", $testCallresponse);




/*
*  Terminate suite
*/

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);
