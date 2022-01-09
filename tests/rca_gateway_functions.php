<?php

$mga_code_rca = 351;
$mga_code_tutela_legale = 371;
$mga_code_infortuni_conducente = 370;
$mga_code_cristalli = 357;
$mga_code_furto_incendio = 354;
$mga_code_bonus_protetto = 383;

function Login_KTB($userId = "tera76man4", $password = "tera76man4")
{

    /*
     *  Login call to get token
    */
    $request = <<<EOD
  {
    "request":{

      "name": "TEST POST LOGIN:",
      "parameters": {
        "url": "https://ws-test.tera76.com/tera76KTB_REST/ktb/utente/login",
        "method": "POST",
        "header": ["content-type: application/json",
        "x-sistema-chiamante: aci"
      ],
      "data": {
        "registraAccesso": true,
        "userId": "$userId",
        "password": "$password",
        "fromApp": true
      }
    }
  }
}
EOD;


    $dataToArray = json_decode($request);

    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;
}

function get_content($baseUrl, $customerCode, $token)
{

    /*
     *  Content
    */

    $request = <<<EOD
  {
    "request": {
      "name": "TEST GET CONTENT:",
      "parameters": {
        "url": "$baseUrl/api/v1/content?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


  return $testCallresponseJsonAndCode;


}


function get_vehicle($baseUrl , $customerCode, $token)
{

  /*
  *  get vehicle
  */

  $request = <<<EOD
  {
    "request": {
      "name": "TEST GET VEHICLE:",
      "parameters": {
        "url": "$baseUrl/api/v1/vehicle?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;


  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


  return $testCallresponseJsonAndCode;


}


function get_policy($baseUrl, $customerCode, $token)
{

  /*
  *  get policy
  */

  $request = <<<EOD
  {
    "request": {
      "name": "TEST GET POLICY:",
      "parameters": {
        "url": "$baseUrl/api/v1/policy?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;


  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


  return $testCallresponseJsonAndCode;


}


function get_savedQuotations($baseUrl , $customerCode, $token)
{


  /*
  *  get saved-quotation
  */
  $request = <<<EOD
  {
    "request": {
      "name": "TEST GET SAVED QUOTATION:",
      "parameters": {
        "url": "$baseUrl/api/v1/saved-quotation?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}


function get_savedQuotationsSpecials($baseUrl, $customerCode, $token)
{


  /*
  *  get saved-quotation Specials
  */
  $request = <<<EOD
  {
    "request": {
      "name": "TEST GET SAVED QUOTATION SPECIAL:",
      "parameters": {
        "url": "$baseUrl/api/v1/saved-quotation/special?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token",
        "x-channel: mobile",
        "x-app-name: KTB"
      ],
      "data": {}
      }
    }
  }
  EOD;


  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


  return $testCallresponseJsonAndCode;


}


function get_partners($baseUrl, $customerCode, $token)
{


  /*
  *    get pertner
  */

  $request = <<<EOD
  {
    "request": {
      "name": "TEST GET PARTNER:",
      "parameters": {
        "url": "$baseUrl/api/v1/partner?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;


  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


  return $testCallresponseJsonAndCode;


}


function get_policyExpiration($baseUrl, $customerCode, $token)
{


  /*
  *  get policy expiration
  */


  $request = <<<EOD
  {
    "request": {
      "name": "TEST GET POLICY EXPIRATION:",
      "parameters": {
        "url": "$baseUrl/api/v1/policy/expiration?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;


  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


  return $testCallresponseJsonAndCode;


}


function post_quotation($baseUrl, $plate, $ownerBirthday,$customerCode,$token, $drivingType, $type)
{



  /*
  *  post quotation
  */

if(strpos($ownerBirthday, "-") !== false){
  $request = <<<EOD
  {
    "request": {
      "name": "TEST POST QUOTATION $type $drivingType:",
      "parameters": {
        "url": "$baseUrl/api/v2/quotation/$type?customerCode=$customerCode",
        "method": "POST",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {
        "ownerBirthday": "$ownerBirthday",
        "drivingType": "$drivingType",
        "licensePlate": "$plate"
      }
    }
  }
}
EOD;

}
else
{
    $request = <<<EOD
  {
    "request": {
      "name": "TEST POST QUOTATION PIVA $type $drivingType:",
      "parameters": {
        "url": "$baseUrl/api/v2/quotation/$type?customerCode=$customerCode",
        "method": "POST",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {
        "vatNumber": "$ownerBirthday",
        "drivingType": "$drivingType",
        "licensePlate": "$plate"
      }
    }
  }
  }
  EOD;
}

$dataToArray = json_decode($request);

$title = $dataToArray->request->name;
printTitle($title);





$testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);


return $testCallresponseJsonAndCode;


}





function post_save_quotations_mga($baseUrl,$customerCode, $token, $quotationId,$frequency)
{


  /*
  *  post save quotation mga
  */

  $mga_code_rca = $GLOBALS['mga_code_rca'] ;
  $mga_code_tutela_legale = $GLOBALS['mga_code_tutela_legale'] ;
  $mga_code_infortuni_conducente = $GLOBALS['mga_code_infortuni_conducente'] ;
  $mga_code_cristalli = $GLOBALS['mga_code_cristalli'] ;
  $mga_code_furto_incendio = $GLOBALS['mga_code_furto_incendio'] ;
  $mga_code_bonus_protetto = $GLOBALS['mga_code_bonus_protetto'] ;


  $request = <<<EOD
  {
    "request": {
      "name": "TEST POST SAVE QUOTATION MGA $frequency:",
      "parameters": {
        "url": "$baseUrl/api/v1/saved-quotation/mga?customerCode=$customerCode",
        "method": "POST",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {
        "guarantees": [{
          "deductibleCode": "nodeductibles",
          "guaranteeCode": "rca",
          "limitCode": "$mga_code_rca"
        }, {
          "deductibleCode": "nodeductibles",
          "guaranteeCode": "tutela_legale",
          "limitCode": "$mga_code_tutela_legale"
        }, {
          "deductibleCode": "nodeductibles",
          "guaranteeCode": "infortuni_conducente",
          "limitCode": "$mga_code_infortuni_conducente"
        }, {
          "deductibleCode": "nodeductibles",
          "guaranteeCode": "cristalli",
          "limitCode": "$mga_code_cristalli"
        }, {
          "deductibleCode": "$mga_code_furto_incendio",
          "guaranteeCode": "furto_incendio",
          "limitCode": "nolimits"
        }],
        "quotationId": "$quotationId",
        "tera76Services": [{
          "code": "wow"
        }],
        "paymentFrequency": "$frequency"
      }
    }
  }
}
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function post_save_quotations_mga_piva($baseUrl, $customerCode, $token, $quotationId, $frequency)
{

    /*
     *  post save quotation mga piva
    */

    $mga_code_rca = $GLOBALS['mga_code_rca'] ;
    $mga_code_tutela_legale = $GLOBALS['mga_code_tutela_legale'] ;
    $mga_code_infortuni_conducente = $GLOBALS['mga_code_infortuni_conducente'] ;
    $mga_code_cristalli = $GLOBALS['mga_code_cristalli'] ;
    $mga_code_furto_incendio = $GLOBALS['mga_code_furto_incendio'] ;
    $mga_code_bonus_protetto = $GLOBALS['mga_code_bonus_protetto'] ;

    $request = <<<EOD
  {
    "request": {
      "name": "TEST POST SAVE QUOTATION MGA PIVA $frequency:",
      "parameters": {
        "url": "$baseUrl/api/v1/saved-quotation/mga?customerCode=$customerCode",
        "method": "POST",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {
				"guarantees": [{
					"deductibleCode": "nodeductibles",
					"guaranteeCode": "rca",
					"limitCode": "$mga_code_rca"
				}, {
					"deductibleCode": "nodeductibles",
					"guaranteeCode": "tutela_legale",
					"limitCode": "$mga_code_tutela_legale"
				}, {
					"deductibleCode": "nodeductibles",
					"guaranteeCode": "infortuni_conducente",
					"limitCode": "$mga_code_infortuni_conducente"
				}, {
					"deductibleCode": "nodeductibles",
					"guaranteeCode": "bonus_protetto",
					"limitCode": "$mga_code_bonus_protetto"
				}],
				"quotationId": "$quotationId",
				"tera76Services": [{
					"code": "wow"
				}],
				"paymentFrequency": "$frequency"
			}
		}
	}
}
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}



function post_save_quotations_mga_only_rca($baseUrl,$customerCode, $token, $quotationId,$frequency)
{


  /*
  *  post save quotation mga only RCA
  */

  $mga_code_rca = $GLOBALS['mga_code_rca'] ;



  $request = <<<EOD
  {
    "request": {
      "name": "TEST POST SAVE QUOTATION MGA ONLY RCA $frequency:",
      "parameters": {
        "url": "$baseUrl/api/v1/saved-quotation/mga?customerCode=$customerCode",
        "method": "POST",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {
        "guarantees": [{
          "deductibleCode": "nodeductibles",
          "guaranteeCode": "rca",
          "limitCode": "$mga_code_rca"
        }],
        "quotationId": "$quotationId",
        "tera76Services": [{
          "code": "wow"
        }],
        "paymentFrequency": "$frequency"
      }
    }
  }
}
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}


function post_save_quotations_aviva($baseUrl, $customerCode, $token, $quotationId)
{

    /*
     *  post save quotation aviva
    */

    $request = <<<EOD
    {
    	"request": {
    		"name": "TEST POST SAVE QUOTATION AVIVA:",
    		"parameters": {
    			"url": "$baseUrl/api/v1/saved-quotation/broker?customerCode=$customerCode",
    			"method": "POST",
    			"header": ["content-type: application/json",
    				"Authorization: Bearer $token"
    			],
    			"data": {
    				"guarantees": [{
    					"deductibleCode": "nodeductibles",
    					"guaranteeCode": "rca",
    					"limitCode": "rca_limit_7_5"
    				}, {
    					"deductibleCode": "default",
    					"guaranteeCode": "infortuni_conducente",
    					"limitCode": "infortuni_conducente_50"
    				}, {
    					"deductibleCode": "default",
    					"guaranteeCode": "tutela_legale",
    					"limitCode": "tutela_legale_15"
    				}],
    				"paymentFrequency": "YEARLY",
    				"quotationId": "$quotationId",
    				"tera76Services": []
    			}
    		}
    	}
    }
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function post_save_quotations_genertel($baseUrl, $customerCode, $token, $quotationId)
{

    /*
     *  post save quotation genertel
    */

    $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SAVE QUOTATION GENERTEL:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/broker?customerCode=$customerCode",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token"
  			],
        "data": {
  				"guarantees": [{
  					"deductibleCode": "0.0",
  					"guaranteeCode": "rca",
  					"limitCode": "limit-7290000.0"
  				}],
  				"paymentFrequency": "YEARLY",
  				"quotationId": "$quotationId",
  				"tera76Services": []
  			}
  		}
  	}
  }
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function post_save_quotations_prima($baseUrl, $customerCode, $token, $quotationId)
{

    /*
     *  post save quotation PRIMA
    */

    $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SAVE QUOTATION PRIMA:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/broker?customerCode=$customerCode",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token"
  			],
        "data": {
  				"guarantees": [{
  					"deductibleCode": "nodeductibles",
  					"guaranteeCode": "rca",
  					"limitCode": "rca_limit_6_07"
  				}],
  				"paymentFrequency": "YEARLY",
  				"quotationId": "$quotationId",
  				"tera76Services": [{
  					"code": "wow",
  					"title": "Assistenza Stradale"
  				}]
  			}
  		}
  	}
  }
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function post_save_quotations_quixa($baseUrl, $customerCode, $token, $quotationId)
{

    /*
     *  post save quotation quixa
    */

    $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SAVE QUOTATION QUIXA:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/broker?customerCode=$customerCode",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"guarantees": [{
  					"deductibleCode": "nodeductibles",
  					"guaranteeCode": "rca",
  					"limitCode": "6000000"
  				}],
  				"paymentFrequency": "YEARLY",
  				"quotationId": "$quotationId",
  				"tera76Services": []
  			}
  		}
  	}
  }
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function post_save_quotations_verti($baseUrl, $customerCode, $token, $quotationId, $type)
{

    /*
     *  post save quotation verti
    */

    $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SAVE QUOTATION VERTI $type:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/broker?customerCode=$customerCode",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token"
        ],
  			"data": {
  				"guarantees": [{
  					"guaranteeCode": "rca",
  					"limitCode": "PMITPACovLimit6500000",
  					"deductibleCode": "$type"
  				}],
  				"paymentFrequency": "YEARLY",
  				"quotationId": "$quotationId",
  				"tera76Services": [{
  					"code": "already_wow",
  					"title": "Assistenza Stradale"
  				}]
  			}
  		}
  	}
  }
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function post_save_quotations_zurich($baseUrl, $customerCode, $token, $quotationId)
{

    /*
     *  post save quotation zurich
    */

    $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SAVE QUOTATION ZURICH $type:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/broker?customerCode=$customerCode",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token"
        ],
        "data": {
  				"guarantees": [{
  					"deductibleCode": "nodeductibles",
  					"guaranteeCode": "rca",
  					"limitCode": "RCPUNTI067"
  				}, {
  					"deductibleCode": "nodeductibles",
  					"guaranteeCode": "infortuni_conducente",
  					"limitCode": "COMB02"
  				}],
  				"paymentFrequency": "YEARLY",
  				"quotationId": "$quotationId",
  				"tera76Services": []
  			}
  		}
  	}
  }
EOD;


    $dataToArray = json_decode($request);
    $title = $dataToArray
        ->request->name;
    printTitle($title);

    $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray
        ->request
        ->parameters);

    return $testCallresponseJsonAndCode;

}

function get_document_informative($baseUrl, $customerCode, $token, $savedQuotationId, $type)
{

    /*
     *  get document informative
    */

    $request = <<<EOD
  {
    "request": {
      "name": "TEST GET DOCUMENT INFORMATIVE $type:",
      "parameters": {
        "url": "$baseUrl/api/v1/saved-quotation/$type/$savedQuotationId/document/informative?customerCode=$customerCode",
        "method": "GET",
        "header": ["content-type: application/json",
        "Authorization: Bearer $token"
      ],
      "data": {}
      }
    }
  }
  EOD;


  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}





function get_document_quotation($baseUrl,$customerCode, $token, $savedQuotationId, $type)
{

  /*
  *  get document quotation
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET DOCUMENT QUOTATION $type:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/$type/$savedQuotationId/document/quotation?customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function get_documents($baseUrl,$customerCode, $token)
{

  /*
  *  get document quotation mga
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET DOCUMENT ATTACHMENT3 BROKER:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/document?source=mga&customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}


function get_documents_attachment($baseUrl,$customerCode, $token, $company,$document)
{

  /*
  *  get document attachment3
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET DOCUMENT $document $company:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/document/broker/$document?companyCode=$company&customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token"
  			],
  			"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function get_tnc_broker($baseUrl,$customerCode, $token, $savedQuotationId,$company,$document,$wow)
{

  /*
  *  get document tnc
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET TNC BROKER $company $document wow $wow:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/BROKER/$savedQuotationId/tnc?companyCode=$company&type=$document&wow=$wow&customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}






function get_tnc($baseUrl, $customerCode, $token, $savedQuotationId, $wow)
{

  /*
  *  get tnc wow
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET TNC MGA wow $wow:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/MGA/$savedQuotationId/tnc?customerCode=$customerCode&wow=$wow",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function get_tnc_accepted($baseUrl, $customerCode, $token, $savedQuotationId)
{

  /*
  *  get tnc accepted
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET TNC MGA ACCEPTED:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/saved-quotation/MGA/$savedQuotationId?tncAccepted=true&customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function get_payment_data($baseUrl, $customerCode, $token, $plate)
{

  /*
  *  get payment data
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET PAYMENT DATA:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/payment-data?customerCode=$customerCode&plate=$plate",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function get_insurance_policy_data( $customerCode, $token)
{

  /*
  *  get insurancee policy-data
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET INSURANCE POLICY:",
  		"parameters": {
  			"url": "https://insurance-gateway-api-dev.tera76tools.it/api/v1/policies?customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: mobile",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function post_insurance_policy_list_json($token)
{


  /*
  *  post insurancee policy lisy json
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST INSURANCE POLICY LIST:",
  		"parameters": {
  			"url": "https://insurance-dev.tera76tools.it/api/v1/policies/list.json",
  			"method": "POST",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: mobile",
  			"Authorization: Bearer $token"
  		],
  		"data": {"filter_status":"archived"}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}

  function post_travel_policy_list_json( $token)
{
  /*
  *  post travel policy list json
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST TRAVEL POLICY LIST:",
  		"parameters": {
  			"url": "https://broker-travel-api-dev.tera76tools.it/api/v1/policies/list.json",
  			"method": "POST",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: mobile",
  			"Authorization: Bearer $token"
  		],
  		"data": {"filter_status":"archived"}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}

function get_metlife_policy_list_json( $token)
{

  /*
  *  get metlife policy list json
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET METLIFE POLICY LIST JSON:",
  		"parameters": {
  			"url": "https://broker-metlife-api-dev.tera76tools.it/api/v1/policies/list.json",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: mobile",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}

function get_ski_policy_list_json( $baseUrl, $token)
{

  /*
  *  get ski policy list json
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET SKI POLICY LIST JSON:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/policies/list.json",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: mobile",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}

function head_generali_customer( $baseUrl, $customerCode)
{


  /*
  *  head generali cutomer
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST HEAD INSURANCE GENERALI CUSTOMER: $customerCode",
  		"parameters": {
  			"url": "$baseUrl/api/v1/generali-customer/$customerCode",
  			"method": "HEAD",
  			"header": ["content-type: application/json",
  			"x-service-token: eyJraWQiOiJraWQtdGVzdCIsInR5cCI6IkpXVCIsImFsZyI6IlJTMjU2In0.eyJhdWQiOiJ3aXNlLmphdmEtaW5zdXJhbmNlLWdhdGV3YXkiLCJzdWIiOiJpbnN1cmFuY2UiLCJpc3MiOiJ3aXNlLmphdmEtaW5zdXJhbmNlLWdhdGV3YXkiLCJncm91cHMiOlsidjEucm8iXSwiZXhwIjo0MDk5NzYyODAwLCJpYXQiOjE2MDMyNzgyMjh9.AoVMJMsl_BPl5t06vd9ONe6q01_VCPE7h4LJZxtY6J3AIZffrJBZFJekjhMCgmYugIOkXI1K2UxmUcwu4Z1vnmow0TaUMbT_l4ODEMrfSMZnjJdl-Pfpz2dOLADO3Kl6_unA1Gt3oYjRRDmBh0h7k5X4F82jrYc1IWfuM7k9KucbpEqtp1jo-TD0vRny72f9mIZfZL2JNlMpoTtrTL2pS1WhV6lQNGOigHv6mSYxDw7cAsfXos1O9vLXMoPBEHyTRS8W31Mu1iQA7SuXAWXt8p39B6kqq5mb5vwxJ2JbgwmWmdGdRLlUlqnrw9Hzw7Vx3HbTw3-oYJ_BL_ylc9R4og"
  		],
  		"data": {"filter_status":"archived"}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function get_policy_data($baseUrl, $customerCode, $source, $policyId, $token)
{

  /*
  *  get policy detail
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET POLICY DETAIL: $source $policyId",
  		"parameters": {
  			"url": "$baseUrl/api/v1/policy/$source/$policyId?customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: web",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function get_policy_document($baseUrl, $customerCode, $source, $policyId, $token)
{

  /*
  *  get policy document
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET POLICY DOCUMENT: $source $policyId",
  		"parameters": {
  			"url": "$baseUrl/api/v1/document?source=$source&policyId=$policyId&area=personal&customerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
  			"x-app-name: KTB",
  			"x-channel: web",
  			"Authorization: Bearer $token"
  		],
  		"data": {}
  		}
  	}
  }
  EOD;

  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function post_metlife_setup($baseUrl,$contractCode, $token)
{


  /*
  *  post metlife setup
  */



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST METLIFE SETUP FOR CONTRACT $contractCode:",
  		"parameters": {
  			"url": "$baseUrl/api/v2/configuration/setup",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"tera76": {
  					"contract_code": $contractCode
  				}
  			}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}


function post_metlife_quotation_update($baseUrl,$contractCode, $productId, $token)
{


  /*
  *  post quotation update
  */



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST METLIFE QUOTATION UPDATE FOR CONTRACT $contractCode , PRODUCT $productId",
  		"parameters": {
  			"url": "$baseUrl/api/v1/quotations/update",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"quotation": {
  					"product_id": $productId
  				},
  				"tera76": {
  					"contract_code": $contractCode
  				}
  			}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}


function get_policy_list($baseUrl, $token)
{


  /*
  *  get metlife/Sci policy list
  */



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET METLIFE/SCI POLICY LIST",
  		"parameters": {
  			"url": "$baseUrl/api/v1/policies/list",
  			"method": "GET",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {			}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}






function get_sci_setup($baseUrl,$token)
{


  /*
  *  get sci setup
  */



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET SCI:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/configuration/setup",
  			"method": "GET",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function post_customer_friends($baseUrl, $customerCode)
{


  /*
  *  post customer fiends
  */

$time =  time();

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST CUSTOMER FRIENDS HIDDEN $hidden:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/friend",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"x-service-token: eyJraWQiOiJraWQtdGVzdCIsImFsZyI6IlJTMjU2IiwidHlwIjoiSldUIn0.eyJhdWQiOiJ3aXNlLmN1c3RvbWVyLWZyaWVuZHMiLCJzdWIiOiJqYXZhIiwiaXNzIjoid2lzZS5jdXN0b21lci1mcmllbmRzIiwiZ3JvdXBzIjpbInYxLnJ3IiwidjEucm8iXSwiZXhwIjo0MDk5NzYyODAwLCJpYXQiOjE2MDQ0MTUyNzh9.Da9qXL5NPpy5Z5MlCM3MZVR1bJ0PNHWypaUk42Rn9LV8a227YWeJXCMm9HOe98sAHFl9tgzauENFLlNFHa650GVoOgZnAid1049hl-Md3Kzrxk4FeA5hSqXU5t0uczK_des6bg9sHnJ_aZDAELlH6WBLIfumzx-G1BVKwYRjxj7dIsGjyXBdPmzjclPbD3fPdVQ_ld0tnIl0o1ufJg-mwILC3MeLoH73svaWkmI029rQqGzrHiu2WDqLdG-u9Pb0VQf6sbTd9uWPPDLnnJKslREdSbS3sAWJ6PNNpegHX19Xk1HSZ86idwbzcCGWPIPRJAZPXDTJJIFU2Am3jupwCA"
  			],
  			"data": {
  				"personalDetails": {
  					"name": "Barbra",
  					"surname": "Stre'island $time",
  					"gender": "F",
  					"birthDate": "1985-12-03",
  					"address": {}
  				},
  				"ownerCustomerCode": $customerCode,
  				"hidden": false
  			}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function get_customer_friends($baseUrl, $customerCode)
{


  /*
  *  get customer fiends
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST GET CUSTOMER FRIENDS:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/friend?ownerCustomerCode=$customerCode",
  			"method": "GET",
  			"header": ["content-type: application/json",
          "x-service-token: eyJraWQiOiJraWQtdGVzdCIsImFsZyI6IlJTMjU2IiwidHlwIjoiSldUIn0.eyJhdWQiOiJ3aXNlLmN1c3RvbWVyLWZyaWVuZHMiLCJzdWIiOiJqYXZhIiwiaXNzIjoid2lzZS5jdXN0b21lci1mcmllbmRzIiwiZ3JvdXBzIjpbInYxLnJ3IiwidjEucm8iXSwiZXhwIjo0MDk5NzYyODAwLCJpYXQiOjE2MDQ0MTUyNzh9.Da9qXL5NPpy5Z5MlCM3MZVR1bJ0PNHWypaUk42Rn9LV8a227YWeJXCMm9HOe98sAHFl9tgzauENFLlNFHa650GVoOgZnAid1049hl-Md3Kzrxk4FeA5hSqXU5t0uczK_des6bg9sHnJ_aZDAELlH6WBLIfumzx-G1BVKwYRjxj7dIsGjyXBdPmzjclPbD3fPdVQ_ld0tnIl0o1ufJg-mwILC3MeLoH73svaWkmI029rQqGzrHiu2WDqLdG-u9Pb0VQf6sbTd9uWPPDLnnJKslREdSbS3sAWJ6PNNpegHX19Xk1HSZ86idwbzcCGWPIPRJAZPXDTJJIFU2Am3jupwCA"
  			],
  			"data": {}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function post_sci_quotation($baseUrl,$contractCode, $token)
{


  /*
  *  post sci quote
  */
$randDay = rand( 30, 90)  ;
$day = date("Y-m-d", strtotime("+$randDay day"));



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SCI QUOTE:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/quotations/update",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"quotation": {
  					"slug": "daily",
  					"start_at": "$day",
  					"end_at": "$day",
  					"user_people": [{
  						"firstname": "primo",
  						"to_save": false,
  						"is_new_entry": true,
  						"birth_date": "2000-11-07",
  						"id": 69,
  						"lastname": "bianchi"
  					}]
  				},
  				"tera76": {
  					"contract_code": $contractCode
  				}
  			}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}

function post_sci_quotaion_update($baseUrl,$contractCode, $token)
{


  /*
  *  quotation update
  */
  $randDay = rand( 30, 90)  ;
  $day = date("Y-m-d", strtotime("+$randDay day"));



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST QUOTATION SCI UPDATE:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/quotations/update.json",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"quotation": {
  					"end_at": "$day",
  					"slug": "daily",
  					"start_at": "$day",
  					"user_people": [{
  						"birth_date": "1980-01-16",
  						"firstname": "Titti",
  						"id": 865,
  						"is_new_entry": true,
  						"lastname": "Rex"
  					}]
  				},
  				"tera76": {
  					"contract_code": $contractCode
  				}
  			}

  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function post_sci_policy($baseUrl,$contractCode, $quotationId, $token)
{


  /*
  *  post sci policy
  */



  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST SCI POLICY:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/quotations/emission",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"tera76": {
  					"contract_code": $contractCode
  				},
  				"quotation": {
  					"id": $quotationId
  				},
  				"legal": [{
  					"code": "terms_1",
  					"value": 1
  				}, {
  					"code": "terms_2",
  					"value": 1
  				}, {
  					"value": 1,
  					"code": "terms_3"
  				}, {
  					"value": 1,
  					"code": "compl_1"
  				}, {
  					"value": 1,
  					"code": "compl_2"
  				}]
  			}

  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function post_travel_quotation($baseUrl, $userid, $user_identification_code, $token)
{


  /*
  *  post travel quote
  */

  $randDay = rand( 30, 90)  ;
  $day = date("Y-m-d", strtotime("+$randDay day"));


  $request = <<<EOD
  {
	"request": {
		"name": "TEST POST TRAVEL QUOTE:",
		"parameters": {
			"url": "$baseUrl/api/v1/insurances/quotation.json",
			"method": "POST",
			"header": ["content-type: application/json",
				"X-App-Code: ktb",
				"Authorization: Bearer $token"
			],
			"data": {
				"tera76": {
					"user_id": "$userid",
					"user_identification_code": "$user_identification_code",
					"codice_tipo_titolo": "AT"
				},
				"quotation": {
					"quotation_people": [{
						"firstname": "TULLEY",
						"lastname": "DINNINGTON",
						"birth_date": "1980-11-02"
					}],
					"typology": "travel",
					"sub_typology": "eu",
					"people_count": 1,
					"end_at": "$day",
					"start_at": "$day"
				}
			}
		}
	}
}
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function post_travel_policy($baseUrl, $userid, $user_identification_code,  $quotationId, $token)
{


  /*
  *  post travel policy
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST TRAVEL POLICY:",
  		"parameters": {
  			"url": "$baseUrl/api/v1/insurances/emission.json",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"X-App-Code: ktb",
  				"Authorization: Bearer $token"
  			],
  			"data": {
  				"tera76": {
  					"user_id": "$userid",
  					"user_identification_code": "$user_identification_code",
  					"codice_tipo_titolo": "AT"
  				},
  				"legal": [{
  					"value": 1,
  					"code": "terms1"
  				}, {
  					"value": 1,
  					"code": "terms2"
  				}, {
  					"value": 1,
  					"code": "terms3"
  				}, {
  					"value": 0,
  					"code": "terms4"
  				}, {
  					"value": 1,
  					"code": "adequacy1"
  				}, {
  					"value": 1,
  					"code": "adequacy2"
  				}],
  				"quotation_id": $quotationId,
  				"quotation_people": [{
  					"firstname": "TULLEY",
  					"lastname": "DINNINGTON",
  					"birth_date": "1980-11-02"
  				}]
  			}
  		}
  	}

  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}




function post_crea_user_id_code( $contractCode, $codiceTitolo)
{




$requestUaa = <<<EOD
    {
    	"request": {
    		"name": " ",
    		"parameters": {
    			"url": "https://ws-test.tera76.com/api/uaa/oauth/token",
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


  $dataToArray = json_decode($requestUaa);
  $title = $dataToArray->request->name;
  printTitle($title);


  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);
  $testCallresponse = $testCallresponseJsonAndCode['responseJson'];;
  $testCallresponseCode = $testCallresponseJsonAndCode['responseCode'];
  $tokenUAA = $testCallresponse['access_token'];


  /*
  *  post tera76 crea user id code
  */


  $request = <<<EOD
  {
  	"request": {
  		"name": "TEST POST CREA_USER_ID_CODE:",
  		"parameters": {
  			"url": "https://ws-test.tera76.com/api-third-party/v1/services-support/acquisto-generico/crea-user-id-code",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $tokenUAA"
  			],
  			"data": {
  				"builder": {},
  				"codiceContratto": $contractCode,
  				"codiceTitolo": $codiceTitolo,
  				"username": "DUMMY_USERNAME"
  			}
  		}
  	}
  }
EOD;



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



function post_modifica_targa($contractCode, $apparatus, $newPlate, $token)
{


  /*
  *  post modifica targa TestGL18
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "POST ADD PLATE: $newPlate",
  		"parameters": {
  			"url": "https://ws-test.tera76.com/tera76KTB_REST/ktb/targa/modifica-targa",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token",
  				"X-Sistema-Chiamante: KTNio"
  			],
  			"data": {
  				"codiceContratto": $contractCode,
  				"codiceSocieta": 55,
  				"nuovaTarga": {
  					"codiceApparato": $apparatus,
  					"codiceContratto": $contractCode,
  					"codiceNazioneTarga": "PR",
  					"codiceTarga": "$newPlate",
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




  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}


function post_elimina_targa($contractCode, $apparatus, $newPlate, $token)
{


  /*
  *  post elimina targa TestGL18
  */

  $request = <<<EOD
  {
  	"request": {
  		"name": "POST REMOVE PLATE: $newPlate",
  		"parameters": {
  			"url": "https://ws-test.tera76.com/tera76KTB_REST/ktb/targa/elimina-targa",
  			"method": "POST",
  			"header": ["content-type: application/json",
  				"Authorization: Bearer $token",
  				"X-Sistema-Chiamante: KTNio"
  			],
  			"data": {
  				"codiceContratto": $contractCode,
  				"targa": {
  					"codiceApparato": $apparatus,
  					"codiceContratto": $contractCode,
  					"codiceNazioneTarga": "PR",
  					"codiceTarga": "$newPlate",
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



  $dataToArray = json_decode($request);
  $title = $dataToArray->request->name;
  printTitle($title);

  $testCallresponseJsonAndCode = arrayFromCurl_v2($dataToArray->request->parameters);

  return $testCallresponseJsonAndCode;


}



/*
*  end of  suite ...functions
*/





function printTitle($title)
{


  echo "<br><br><strong>" . $title . "</strong><br>";
}


function arrayFromCurl_v2($input)
{
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

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







/*
*  Now we define some standard function for style and print formatting
* This can be general or defined in each test report
*/


function printErrorCode($code)
{

	if (strpos($code, 'OK') == false && strpos($code, '1.1 200') == false && strpos($code, '1.1 201') == false && strpos($code, '1.1 204') == false ) {
		echo "<p style='color: red'><br><br><strong>!!!!!!!!!!!!! Error in Response code: </strong><br>" . $code . "<p>";
	}

}

function printStepMessage($step, $value)
{
  $value=substr(json_encode($value, JSON_PRETTY_PRINT), 0, 1250);

	echo "<br><strong>" . $step . ":  </strong><br>" . $value;


}
