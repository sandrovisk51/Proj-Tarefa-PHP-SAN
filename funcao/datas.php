<?php

/**
* Calcula o numero de dias entre 2 datas.
* As datas passadas sempre serao validas e a primeira data sempre sera menor que a segunda data.
* @param string $dataInicial No formato YYYY-MM-DD
* @param string $dataFinal No formato YYYY-MM-DD
* @return int O numero de dias entre as datas
**/


function converteAnoDias($data, $tipo){
    //dias dos meses em array
  	$qtdDiasMes = array('01'=>31,'02'=>28,'03'=>31,'04'=>30,'05'=>31,'06'=>30,'07'=>31,'08'=>31,'09'=>30,'10'=>31,'11'=>30,'12'=>31);
      //fatiando a data
	  $dataFatiada = explode('-', $data); 
	  $ano      = $dataFatiada[0];
	  $mes      = $dataFatiada[1];
	  $dia      = $dataFatiada[2];
	  $contaDia = 0;
	  $addDia   = FALSE;
      
      //verifica se o ano é bissexto
	  if(substr($ano, -2) === '00'){
	     (gmp_div_r($ano, '400') == 0)? $anoBissexto = 1 : $anoBissexto = 0;
	  }else{
	  	 $ano = intval(substr($ano, -2));
	     (gmp_div_r($ano, '4') == 0)? $anoBissexto = 1 : $anoBissexto = 0;
	  }
     
     //checa se data é inicial ou final
	 if($tipo == 'inicial'){
	 	      //loop contado dos dias
			  for ($i=intval($mes); $i < 13; $i++) { 
			  	if($i==2) $addDia = TRUE;
			    $contaDia += intval($qtdDiasMes[str_pad($i, 2, '0',STR_PAD_LEFT)]);   
			  }
			    $contaDia -=  intval($dia); 	
	 }else{
	 	      //loop contado dos dias
			  for ($i=intval($mes); $i > 0; $i--) { 
			  	if($i==2) $addDia = TRUE;
			    $contaDia += intval($qtdDiasMes[str_pad($i, 2, '0',STR_PAD_LEFT)]);   
			  }
			    $diaMes    =  intval($qtdDiasMes[$mes]) - intval($dia);
			    $contaDia -=  intval($diaMes); 	
	 }
    
    //adiciona um dia a mas caso bissexto
    if($addDia) $contaDia +=  intval($anoBissexto);

	return $contaDia;
}

function calculaDias($dataInicial, $dataFinal) {
   
   	$dataInicialFatiada = explode('-', $dataInicial); 
	$anoInicial         = intval($dataInicialFatiada[0]);
	$dataFinalFatiada   = explode('-', $dataFinal); 
	$anoFinal           = intval($dataFinalFatiada[0]);
	$totalDiaAno        = 0;
	$diaMais            = 0;
    $calculoAno         =  intval($anoFinal - $anoInicial);
      
    if($calculoAno == 0){
	      	//verifica se o ano é bissexto
	      	if(substr($anoInicial, -2) === '00'){
	      		(gmp_div_r($anoInicial, '400') == 0)? $anoBissexto = TRUE   : $anoBissexto = FALSE;
	      	}else{
	      		$anoInicial = intval(substr($anoInicial, -2));
	      		(gmp_div_r($anoInicial, '4') == 0)? $anoBissexto = TRUE : $anoBissexto = FALSE;
	      	}
	        
	        if($anoBissexto){
		        //verifica se o mês é depos de fevereiro
		        $mesAnoInicial = (intval($dataInicialFatiada[1]) > 1 )? TRUE : FALSE;
		        $mesAnoFinal   = (intval($dataFinalFatiada[1]) > 1 )? TRUE : FALSE;
		        if($mesAnoInicial && $mesAnoFinal) $diaMais = 1;
	        }
	             
	      	//executando função converte anos em dias
	      	$qtdDiasIncial  = converteAnoDias($dataInicial,"final");
	      	$qtdDiasfinal   = converteAnoDias($dataFinal,"final");
	      	//calculando todos os retornos
	      	$totalDiaAno    = intval($qtdDiasfinal - $qtdDiasIncial) + intval($diaMais); 

    }elseif ($calculoAno == 1) {
      	//executando função converte anos em dias
      	$qtdDiasIncial  = converteAnoDias($dataInicial,"inicial");
      	$qtdDiasfinal   = converteAnoDias($dataFinal,"final");
      	//somando todos os retornos
      	$totalDiaAno    = intval($qtdDiasIncial + $qtdDiasfinal); 
    }else{
	      $qtdDiasIncial  = converteAnoDias($dataInicial,"inicial");
	      $qtdDiasfinal   = converteAnoDias($dataFinal,"final");
		  $anoFinal       = intval($dataFinalFatiada[0]) - 1;
		  $anoInicial     = intval($dataInicialFatiada[0]) + 1;
          
          //loop para somar dias dos anos
	      for ($i=$anoInicial ; $i <= $anoFinal; $i++) { 
	      	//verifica se o ano é bissexto
	      	if(substr($i, -2) === '00'){
	      		(gmp_div_r(strval($i), '400') == 0)? $totalDiaAno += 366 : $totalDiaAno += 365;
	      	}else{
	      		$ano = intval(substr($i, -2));
	      		(gmp_div_r($ano, '4') == 0)? $totalDiaAno += 366 : $totalDiaAno += 365;
	      	}
	      }
	        //somando todos os retornos
	        $totalDiaAno = intval($totalDiaAno) + intval($qtdDiasIncial + $qtdDiasfinal); 
    }

    return $totalDiaAno;
}

function verificaResultadoDatas($nTeste, $resultadoEsperado, $resultado, $dataInicial, $dataFinal) {
    //verifica se o resultado esta nos conformes dos dados esperados
	if(intval($resultadoEsperado) === intval($resultado)) {
		$conclusao = "Passou no Teste";
	}else{
		$conclusao = "Teste foi reprovado";
	}
    //adicionado os dados a um array
	$dados = array('numeroTeste'=>$nTeste, 
		           'resultadoEsperado'=>$resultadoEsperado, 
		           'resultado'=>$resultado, 
		           'conclusao'=>$conclusao,
		           'dataInicial'=>$dataInicial,
		           'dataFinal'=>$dataFinal
		          );

	//retornado um array com os dados
    return $dados;
}


function datas(){
    //array dados
    $dados = [];

	/***** Teste 01 *****/
	$dataInicial = "2018-01-01";
	$dataFinal = "2018-01-02";
	$resultadoEsperado = 1;
	$resultado = calculaDias($dataInicial, $dataFinal);
	$dados[0]  = verificaResultadoDatas("01", $resultadoEsperado, $resultado, $dataInicial, $dataFinal);

	/***** Teste 02 *****/
	$dataInicial = "2018-01-01";
	$dataFinal = "2018-02-01";
	$resultadoEsperado = 31;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("02", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 03 *****/
	$dataInicial = "2018-01-01";
	$dataFinal = "2018-02-02";
	$resultadoEsperado = 32;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("03", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 04 *****/
	$dataInicial = "2018-01-01";
	$dataFinal = "2018-02-28";
	$resultadoEsperado = 58;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("04", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 05 *****/
	$dataInicial = "2018-01-15";
	$dataFinal = "2018-03-15";
	$resultadoEsperado = 59;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("05", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 06 *****/
	$dataInicial = "2018-01-01";
	$dataFinal = "2019-01-01";
	$resultadoEsperado = 365;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("06", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 07 *****/
	$dataInicial = "2018-01-01";
	$dataFinal = "2020-01-01";
	$resultadoEsperado = 730;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("07", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 08 *****/
	$dataInicial = "2018-12-31";
	$dataFinal = "2019-01-01";
	$resultadoEsperado = 1;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("08", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 09 *****/
	$dataInicial = "2018-05-31";
	$dataFinal = "2018-06-01";
	$resultadoEsperado = 1;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("09", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 10 *****/
	$dataInicial = "2018-05-31";
	$dataFinal = "2019-06-01";
	$resultadoEsperado = 366;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("10", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 11 *****/
	$dataInicial = "2016-02-01";
	$dataFinal = "2016-03-01";
	$resultadoEsperado = 29;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("11", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 12 *****/
	$dataInicial = "2016-01-01";
	$dataFinal = "2016-03-01";
	$resultadoEsperado = 60;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("12", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 13 *****/
	$dataInicial = "1981-09-21";
	$dataFinal = "2009-02-12";
	$resultadoEsperado = 10006;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("13", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 14 *****/
	$dataInicial = "1981-07-31";
	$dataFinal = "2009-02-12";
	$resultadoEsperado = 10058;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("14", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 15 *****/
	$dataInicial = "2004-03-01";
	$dataFinal = "2009-02-12";
	$resultadoEsperado = 1809;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("15", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 16 *****/
	$dataInicial = "2004-03-01";
	$dataFinal = "2009-02-12";
	$resultadoEsperado = 1809;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("16", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 17 *****/
	$dataInicial = "1900-02-01";
	$dataFinal = "1900-03-01";
	$resultadoEsperado = 28;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("17", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 18 *****/
	$dataInicial = "1899-01-01";
	$dataFinal = "1901-01-01";
	$resultadoEsperado = 730;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("18", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 19 *****/
	$dataInicial = "2000-02-01";
	$dataFinal = "2000-03-01";
	$resultadoEsperado = 29;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("19", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	/***** Teste 20 *****/
	$dataInicial = "1999-01-01";
	$dataFinal = "2001-01-01";
	$resultadoEsperado = 731;
	$resultado = calculaDias($dataInicial, $dataFinal);
	array_push($dados, verificaResultadoDatas("20", $resultadoEsperado, $resultado, $dataInicial, $dataFinal));

	//retornado os array dos dados
	return $dados;
}

?>