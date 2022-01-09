<?php
/*
 *  set test parameters
 */
$start = microtime(true);

$baseUrl="https://ws-test.tera76.com";
$userId = "MetLife42";
$password = "MetLife42";
$contractCode = 30018044;
$customerCode = 26002610;
$apparatusCode = 611686023;


/*
 *  Login call to get token
 */
$request = <<<EOD
{
	"request": {

		"name": "TEST POST login:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/utente/login",
			"method": "POST",
			"header": ["content-type: application/json",
				"x-sistema-chiamante: aci"
			],
			"data": {
				"userId": "__USERID__",
				"password": "__PASSWORD__",
				"registraAccesso": true,
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
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];



printErrorCode($testCallresponseCode);

$token = $testCallresponse['jwtToken'];
printStepMessage("token from login", $token);



/*
 *  opzioni-contratto
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST opzioni-contratto:",
        "parameters": {
            "url": "__BASEURL__/tera76KTB_REST/ktb/opzione/opzioni-contratto",
			"method": "POST",
            "header": ["content-type: application/json",
                       "Authorization: Bearer __TOKEN__",
											 "X-Sistema-Chiamante: KTNio"
            ],
            "data": {"codiceContratto":__CONTRACTCODE__,"tipiOpzione":["PR","PB","PA"]}
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
 *  lista-servizi-attivi
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST lista-servizi-attivi:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/contratto/lista-servizi-attivi",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
			"data": {
				"codiceContratto": __CONTRACTCODE__
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
 *  lista-servizi-attivi
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST lista-servizi-attivi:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/contratto/lista-servizi-attivi",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
			"data": {
				"codiceContratto": __CONTRACTCODE__
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
			"url": "__BASEURL__/tera76KTB_REST/ktb/contratto/lista-contratti",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
			"data": {"codiceCliente":"__CUSTOMERCODE__","codiciAltriClienti":[]}
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
 *  leggi-titoli-contratto
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST leggi-titoli-contratto:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/titoli/leggi-titoli-contratto",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
			"data": {  "codiceContratto": __CONTRACTCODE__,  "codiciStato": ["01"],  "leggiTarghe": true,  "statoAutorizzazione": true  }
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
 *  leggi-pois
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST GET leggi-pois:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/leggi-pois/58",
			"method": "GET",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
				"data": {}
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
if(strpos(json_encode($testCallresponse, JSON_PRETTY_PRINT), 'Errore imprevisto - Ti preghiamo di riprovare')!=false) {
	echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: 200</strong><br><p>";
}


/*
 *  post elimina targa
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST elimina-targa:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/targa/elimina-targa",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
			"data": {
				"codiceContratto": __CONTRACTCODE__,
				"targa": {
					"codiceApparato": __APPARATUSCODE__,
					"codiceContratto": __CONTRACTCODE__,
					"codiceNazioneTarga": "FR",
					"codiceTarga": "DS895HY",
					"dataFineValidita": "9999-12-31 23:59:59.999999",
					"dataInizioValidita": "2019-03-19 12:50:19.872685",
					"flagTargaRubata": "N",
					"isAreaC": false,
					"isStatoAreaCModificabile": false,
					"lastUpdate": {
						"data": "2019-03-19 12:50:19.899502",
						"orgID1ToLog": 0,
						"orgID2ToLog": 80,
						"userToLog": "DHLT1"
					},
					"livelloAdesione": "A",
					"richiestaClienteAssociata": true
				}
			}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CONTRACTCODE__/', $contractCode, $request);
$request = preg_replace('/__APPARATUSCODE__/', $apparatusCode, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);

$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));
if(strpos(json_encode($testCallresponse, JSON_PRETTY_PRINT), 'Errore imprevisto - Ti preghiamo di riprovare')!=false) {
	echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: 200</strong><br><p>";
}


/*
 *  post modifica targa
 */

$request = <<<EOD
{
	"request": {
		"name": "TEST POST modifica-targa:",
		"parameters": {
			"url": "__BASEURL__/tera76KTB_REST/ktb/targa/modifica-targa",
			"method": "POST",
			"header": ["content-type: application/json",
				"Authorization: Bearer __TOKEN__",
				"X-Sistema-Chiamante: KTNio"
			],
			"data": {
				"codiceContratto": __CONTRACTCODE__,
				"codiceSocieta": 55,
				"nuovaTarga": {
					"codiceApparato": __APPARATUSCODE__,
					"codiceContratto": __CONTRACTCODE__,
					"codiceNazioneTarga": "FR",
					"codiceTarga": "DS895HY",
					"dataFineValidita": "9999-12-31 23:59:59.999999",
					"dataInizioValidita": "2019-03-19 12:50:19.872685",
					"flagTargaRubata": "N",
					"isStatoAreaCModificabile": false,
					"livelloAdesione": "A"
				}
			}
		}
	}
}
EOD;
$request = preg_replace('/__BASEURL__/', $baseUrl, $request);
$request = preg_replace('/__CONTRACTCODE__/', $contractCode, $request);
$request = preg_replace('/__APPARATUSCODE__/', $apparatusCode, $request);
$request = preg_replace('/__TOKEN__/', $token, $request);

$dataToArray = json_decode($request);
$title = $dataToArray->request->name;
printTitle($title);

$testCallresponseJsonAndCode = arrayFromCurl($dataToArray->request->parameters);
$testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
$testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];

printErrorCode($testCallresponseCode);
printStepMessage("response:", substr(json_encode($testCallresponse, JSON_PRETTY_PRINT), 0, 1250));
if(strpos(json_encode($testCallresponse, JSON_PRETTY_PRINT), 'Errore imprevisto - Ti preghiamo di riprovare')!=false) {
	echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: 200</strong><br><p>";
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
