<?php
require_once('rca_gateway_functions.php');


/*
*  set test parameters
*/
$start = microtime(true);

$baseUrl="https://rca-gateway-api-dev.tera76tools.it";
$userId = "TestGenertel8";
$password = "Generali8";

$plate ="FA037MJ";
$ownerBirthday= "1959-10-26";

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
*  Content
*/

$testCallresponseJsonAndCode = get_content($baseUrl, $customerCode, $token);

$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET content in json", $testCallresponse);




/*
*  get vehicle
*/
$testCallresponseJsonAndCode = get_vehicle($baseUrl, $customerCode, $token);

$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET vehicle in json", $testCallresponse);


/*
*  get policy
*/
$testCallresponseJsonAndCode = get_policy($baseUrl, $customerCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET policy in json", $testCallresponse );


/*
*  get saved-quotation
*/


$testCallresponseJsonAndCode = get_savedQuotations($baseUrl, $customerCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET saved quotation in json", $testCallresponse);



/*
*  get saved-quotation special
*/

$testCallresponseJsonAndCode = get_savedQuotationsSpecials($baseUrl, $customerCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET saved quotation in json", $testCallresponse);


/*
*  get pertner
*/

$testCallresponseJsonAndCode = get_partners($baseUrl, $customerCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET partners json", $testCallresponse);


/*
*  get policy expiration
*/

$testCallresponseJsonAndCode =  get_policyExpiration($baseUrl, $customerCode, $token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response",  $testCallresponse);


/*
*  post quotation between_23_and_25
*/
$testCallresponseJsonAndCode = post_quotation($baseUrl,  $plate, $ownerBirthday,$customerCode,$token,"between_23_and_25","broker");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST quotation in json", $testCallresponse);

$quotationId = $testCallresponse['id'];
printStepMessage("quotation id is", $quotationId);



/*
*  post save quotation between_23_and_25
*/


$testCallresponseJsonAndCode = post_save_quotations_genertel($baseUrl ,$customerCode, $token, $quotationId);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST save quotation in json", $testCallresponse);
$savedQuotationId = $testCallresponse['id'];
printStepMessage("savedQuotation id is", $savedQuotationId);




/*
*  post quotation less_than_23
*/


$testCallresponseJsonAndCode = post_quotation($baseUrl,  $plate, $ownerBirthday,$customerCode,$token,"less_than_23","broker");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST quotation in json", $testCallresponse);

$quotationId = $testCallresponse['id'];
printStepMessage("quotation id is", $quotationId);




/*
*  post save quotation less_than_23
*/

$testCallresponseJsonAndCode = post_save_quotations_genertel($baseUrl ,$customerCode, $token, $quotationId);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST save quotation in json", $testCallresponse);




/*
*  post quotation more 26
*/


$testCallresponseJsonAndCode = post_quotation($baseUrl,  $plate, $ownerBirthday,$customerCode,$token,"more_than_26","broker");

$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST quotation in json", $testCallresponse);

$quotationId = $testCallresponse['id'];
printStepMessage("quotation id is", $quotationId);




/*
*  post save quotation more 26
*/


$testCallresponseJsonAndCode = post_save_quotations_genertel($baseUrl ,$customerCode, $token, $quotationId);

$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST save quotation in json", $testCallresponse);

$savedQuotationId = $testCallresponse['id'];
printStepMessage("savedQuotation id is", $savedQuotationId);


/*
*  post save quotation bis
*/

$testCallresponseJsonAndCode = post_save_quotations_genertel($baseUrl ,$customerCode, $token, $quotationId);


$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST save quotation in json", $testCallresponse);


$savedQuotationId = $testCallresponse['id'];
printStepMessage("savedQuotation id is", $savedQuotationId);




/*
*  get document informative broker
*/


$testCallresponseJsonAndCode = get_document_informative($baseUrl ,$customerCode, $token, $savedQuotationId, "broker");

$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET informative in json", $testCallresponse);



/*
*  get document quotation
*/

printStepMessage("wait ","20 seconds");
sleep(20);

$testCallresponseJsonAndCode = get_document_quotation($baseUrl ,$customerCode, $token, $savedQuotationId,"BROKER");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET document in json", $testCallresponse);




/*
*  get document attachment3
*/
$testCallresponseJsonAndCode = get_documents_attachment($baseUrl ,$customerCode, $token,"genertel","attachment_3");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET attachment_3 in json", $testCallresponse);




/*
*  get document attachment4
*/

$testCallresponseJsonAndCode = get_documents_attachment($baseUrl ,$customerCode, $token,"genertel","attachment_4");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET attachment_4 in json", $testCallresponse);


/*
*  get document attachment4_ter
*/

$testCallresponseJsonAndCode = get_documents_attachment($baseUrl ,$customerCode, $token,"genertel","attachment_4_ter");

$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET attachment_4_ter in json", $testCallresponse);


/*
*  get document info privacy
*/

$testCallresponseJsonAndCode = get_documents_attachment($baseUrl ,$customerCode, $token,"genertel","company_informative_privacy");


$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET info privacy in json", $testCallresponse);





/*
*  get tnc CONSISTENCY_QUESTIONNAIRE wow false
*/
$testCallresponseJsonAndCode = get_tnc_broker($baseUrl ,$customerCode, $token, $savedQuotationId, "genertel","CONSISTENCY_QUESTIONNAIRE","false");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET tnc in json", $testCallresponse);



/*
*  get tnc TERM_AND_CONDITION wow false
*/


$testCallresponseJsonAndCode = get_tnc_broker($baseUrl ,$customerCode, $token, $savedQuotationId, "genertel","TERM_AND_CONDITION","false");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET tnc in json", $testCallresponse);


/*
*  get tnc CONSISTENCY_QUESTIONNAIRE wow true
*/
$testCallresponseJsonAndCode = get_tnc_broker($baseUrl ,$customerCode, $token, $savedQuotationId, "genertel","CONSISTENCY_QUESTIONNAIRE","true");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET tnc in json", $testCallresponse);



/*
*  get tnc TERM_AND_CONDITION wow true
*/


$testCallresponseJsonAndCode = get_tnc_broker($baseUrl ,$customerCode, $token, $savedQuotationId, "genertel","TERM_AND_CONDITION","true");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from GET tnc in json", $testCallresponse);





/*
*  Terminate suite
*/

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);
