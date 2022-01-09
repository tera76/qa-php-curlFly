<?php


if (isset($_GET['user_array'])) $username_array = explode("\n", $_GET['user_array']);
else {
    $username_array = array(
        'TestGenertel1',
        'tera76man4'
    );
}

// if(isset($_GET['password_array'])) $data= $_GET['password_array'];

if (isset($_GET['pass_array'])) $password_array = explode("\n", $_GET['pass_array']);
else {
    $password_array = array(
        '__USERNAME__',
        '123456',
        'Generali1',
        'attak66'
    );
}

if (isset($_GET['mode'])) $mode = $_GET['mode'];

if (isset($_GET['env'])) $env = $_GET['env'];
else $env='on';


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
            <legend>Brutus test page</legend>
            <div>Check a list of username and password in test or prod env, KTB or UAA api.</div>
            <div>Script will end at the first OK.</div>
            <div>Password __USERNAME__ will replace the username as password.</div>
            <br>
            <div><input name="env"  type="hidden" value="off" />
                <label>Test Evn</label><input name="env"   type="checkbox" value="on" <?php if($env == "on") echo "checked"; ?>  /></div>

            <div><input type="radio" id="ktb" name="mode" value="KTB" checked><label for="ktb">KTB</label></div>
            <div><input type="radio" id="uaa" name="mode" value="UAA"><label for="uaa">UAA</label></div>

            <div align="left"><textarea rows="10" cols="30"
                                        name="user_array"><?php echo implode("\n", $username_array); ?></textarea>
                <textarea rows="10" cols="30" name="pass_array"><?php echo implode("\n", $password_array); ?></textarea>
            </div>
        </div>
        <div><input type="submit" name="submit" value="send"></div>


    </form>


    </body>
    </html>

<?php

if (isset($_GET['env']) && isset($_GET['mode'])) {
    brutusCall($username_array, $password_array, $mode, $env);
}


function brutusCall($username_array, $password_array, $mode, $env)
{

    echo "mode: " . $mode . '<br>';
    echo "env: " . $env;


    $baseUrlKTB_test = "https://ws-test.tera76.com/tera76KTB_REST/ktb/utente/login";
    $baseUrlUAA_test = "https://ws-test.tera76.com/api/uaa/oauth/token?grant_type=2fa&client_id=tpay-app&username=__USERNAME__&password=__PASSWORD__&device_id=f57d7f463109a029";
    $baseUrlKTB_prod = "https://ws.tera76.com/tera76KTB_REST/ktb/utente/login";
    $baseUrlUAA_prod = "https://ws.tera76.com/api/uaa/oauth/token?grant_type=2fa&client_id=tpay-app&username=__USERNAME__&password=__PASSWORD__&device_id=f57d7f463109a029";

    if ($env == 'on') {

        $baseUrlKTB = $baseUrlKTB_test;
        $baseUrlUAA = $baseUrlUAA_test;
    } else {
        $env='off';
        $baseUrlKTB = $baseUrlKTB_prod;
        $baseUrlUAA = $baseUrlUAA_prod;
    }


    error_reporting(E_ALL ^ E_WARNING);


    foreach ($username_array as &$userId) {
        $userId = trim($userId);


        foreach ($password_array as $password_orig) {
            $password_orig = trim($password_orig);

            if ($password_orig == "__USERNAME__") {
                $password = $userId;
            } else $password = $password_orig;

            $password =  preg_replace('/\\$/', '\\\$', $password);

            if ($mode == 'KTB') {

                /*
                 *  Login call to get token KTB
                 */

                $request = <<<EOD
{
	"request":{

		"name": "**************** TEST POST LOGIN KTB:",
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
                $request = preg_replace('/__BASEURL__/', $baseUrlKTB, $request);
                $request = preg_replace('/__USERID__/', $userId, $request);
                $request = preg_replace('/__PASSWORD__/', $password, $request);


                $dataToArray = json_decode($request);
                $title = $dataToArray->request->name;
                printTitle($title);


                $startCall = microtime(true);
                $testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
                $testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
                $testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];


                $endCall = microtime(true);
                $durationCall = $endCall - $startCall;


                printStepMessage("$userId, try password: ", $password);


                if (isset($testCallresponse['message'])) printErrorCode($testCallresponseCode, $testCallresponse['message']);
                else {
                    printErrorCode($testCallresponseCode, "");

                }


            } else if ($mode == 'UAA') {


                /*
                    *  Login call to get token UAA
                    */


                $request = <<<EOD
{
"request":{

  "name": "**************** TEST POST LOGIN UAA:",
  "parameters": {
    "url": "__BASEURL__",
    "method": "POST",
          "header": ["Authorization: Basic dHBheS1hcHA6dHBheS1zM2NyM3Q=",
                     "Content-Type: application/x-www-form-urlencoded",
                     "X-TPay-Device-Id: f57d7f463109a029",
                     "X-TPay-App-Version: 4.3.2",
                     "X-TPay-OS-Type: ios"
          ],
          "data": {

           }
  }
}
}
EOD;

                $request = preg_replace('/__BASEURL__/', $baseUrlUAA, $request);
                $request = preg_replace('/__USERNAME__/', $userId, $request);
                $request = preg_replace('/__PASSWORD__/', $password, $request);


                $dataToArray = json_decode($request);
                $title = $dataToArray->request->name;
                printTitle($title);


                $startCall = microtime(true);
                $testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
                $testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
                $testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];


                $endCall = microtime(true);
                $durationCall = $endCall - $startCall;


                printStepMessage("$userId : Try password: ", $password);
                if (isset($testCallresponse['message'])) printErrorCode($testCallresponseCode, $testCallresponse['message']);
                else {
                    printErrorCode($testCallresponseCode, "");

                }


            }

        }

    }
    /*
     *  Terminate suite
     */

    $end = microtime(true);



    /*
     *  Now we define some standard function for style and print formatting
     * This can be general or defined in each test report
     */

}

function printTitle($title)
{


    echo "<br><br><strong>" . $title . "</strong><br>";
}

function printErrorCode($code, $message)
{

    if (strpos($code, 'OK') == false && strpos($code, '1.1 200') == false) {
        echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: </strong><br>" . $code . "<p>";
        if (strpos($message, 'credentials valid')) {
            echo $message . " <br>";

            echo "<p style='color: green'><br><br><strong>********* YEAH!!!!!!!! BRUTUS DONE!!!!!!!! ;-) *********</strong><br><p>";
            exit;
        }
    } else {
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
            'content' => $data,
            'ignore_errors' => true
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
