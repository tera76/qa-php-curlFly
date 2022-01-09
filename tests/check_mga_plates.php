<?php
require_once('rca_gateway_functions.php');

if (isset($_GET['plateDate_array'])) $plateDate = explode("\n", $_GET['plateDate_array']);
else {
	$plateDate  = array(
  "CW482XJ	1967-10-11",
  "FM392XT	1986-08-09",
  "DB430EH	1966-01-14",
  "EN964PN	1965-08-18",
	"FH075DB	1977-07-03"
	);
}


?>


    <!doctype html>
    <html itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta content="IE=8" http-equiv="X-UA-Compatible"/>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

        <meta NAME="GENERATOR" Content="Brutus - login api">
        <title>BruttoZZio</title>


    </head>
    <body>


    <form method=”post”>
        <div>
            <legend>Plate Quote and Save test page</legend>
						<br>
            <div>Check if a couple PLATE-BIRTH DATE is valid for quote and, in this case</div>
            <div>check if it is valid for saving quotation (only rca).</div>
            <div>Script will check for any line of the list:</div>
						<div>- add plate to a test user (TestGL18),</div>
						<div>- try quotation MGA and, if ok, try saving quotation,</div>
						<div>- finally remove the plate from the user (added some sleep to avoid errors).</div>
						<div>ENJOY WITH MGA!</div>
            <br>
            <div align="left"><textarea rows="30" cols="30"
                                        name="plateDate_array"><?php echo implode("\n", $plateDate); ?></textarea>
            </div>
        </div>
        <div><input type="submit" name="submit" value="send"></div>


    </form>


    </body>
    </html>

<?php


/*
*  set test parameters
*/


if (isset($_GET['plateDate_array'])) {

    checkPlates($plateDate);
}


function checkPlates($plateDate)
{
	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

$start = microtime(true);

$baseUrl = "https://rca-gateway-api-test.tera76tools.it";

$customerCode=26013432;




/*
*  Login call to get token
*/

$testCallresponseJsonAndCode = login_KTB("TestGL18", "TestGL18");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
$token = $testCallresponse['jwtToken'];
printStepMessage("token from login", $token);
$customerCode = $testCallresponse['infoCliente']['datiCliente']['codiceCliente'];
printStepMessage("customer_code from login", $customerCode);

foreach ($plateDate as &$xxx)  {


$data= explode("	",$xxx,2);
 
$data[0] = trim($data[0] );
$data[1] = trim($data[1] );


echo "<br><br><strong>  *********** CHECK PLATE " . $data[0] . " WITH BIRTH DATE " . $data[1] . " *********** </strong><br>";





/*
*  post modifica targa
*/
sleep(10);
$testCallresponseJsonAndCode = post_modifica_targa( "30025765", "611713017", $data[0],$token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];


// printErrorCode($testCallresponseCode);
// printStepMessage("response from POST: ", $testCallresponse);




/*
*  post quotation more_than_26
*/

$testCallresponseJsonAndCode = post_quotation($baseUrl,  $data[0], $data[1],$customerCode,$token,"more_than_26","mga");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];
$code = $testCallresponseCode;

if (strpos($code, 'OK') == false && strpos($code, '1.1 200') == false && strpos($code, '1.1 204') == false ) {
	echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: </strong><br>" . $code . "<p>";
}
else {

printStepMessage("response from POST quotation in json", $testCallresponse);

$quotationId = $testCallresponse['id'];
printStepMessage("quotation id is", $quotationId);




/*
*  post save quotation more_than_26 only RCA
*/

$testCallresponseJsonAndCode = post_save_quotations_mga_only_rca($baseUrl ,$customerCode, $token, $quotationId,"MONTHLY");
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response from POST save quotation in json", $testCallresponse);

$savedQuotationId = $testCallresponse['id'];
printStepMessage("savedQuotation id is", $savedQuotationId);
}

/*
*  post elimina targa
*/

$testCallresponseJsonAndCode = post_elimina_targa( "30025765", "611713017", $data[0],$token);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

// printErrorCode($testCallresponseCode);
// printStepMessage("response from POST: ", $testCallresponse);


}
/*
*  Terminate suite
*/

$end = microtime(true);
$duration = $end - $start;
printStepMessage("**** Duration", $duration);

}
