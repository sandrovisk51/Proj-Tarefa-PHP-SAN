<?php

/**
* Retorna a temperatura mais proxima de zero.
* Se duas niveis com o mesmo valor absouto (uma positiva e outra negativa) serem igualmente proxima a zero, deve ser dada a preferencia para o valor positivo.
* @param array $niveis Lista de niveis
* @return int A temperatura mais proxima de zero
**/

##########################################################################################################################################################################################################################################################################################################################################################################
// Estava meio confuso, entre uma função que definia o menor nivel de temperatura e a mensagem no topo o numero mais próximo de zero, escolhi o mais dificil, espero que sejá isso.
##########################################################################################################################################################################################################################################################################################################################################################################
function validaTemperatura($niveis){
    //variaves array
    $nivelPositivo = [];
    $nivelNegativo = [];
    
    //percorre o array
	foreach ($niveis as $nivel) {
	//verifica o tipo de nivel e monta o array
      if (gmp_sign($nivel) === 1){
        (!empty($nivelPositivo))? array_push($nivelPositivo, $nivel) : $nivelPositivo = array($nivel);
      }elseif(gmp_sign($nivel) === -1){
        (!empty($nivelNegativo))? array_push($nivelNegativo, $nivel) : $nivelNegativo = array($nivel);
      }else{
      	return $nivel;
      	break;
      }  
	}
    
    //pega o número mais proximo de zero de cada nivel
	$retornoNivelPositivo = (!empty($nivelPositivo))? min($nivelPositivo): 0 ;
	$retornoNivelNegativo = (!empty($nivelNegativo))? max($nivelNegativo): 0 ;
   
   //realiza a verficação de qual nivel é mais proximo de zero
   if(!empty($retornoNivelPositivo) && !empty($retornoNivelNegativo)){
		if(intval($retornoNivelPositivo)     == intval(abs($retornoNivelNegativo))){
			return $retornoNivelPositivo;
		}elseif(intval($retornoNivelPositivo) > intval(abs($retornoNivelNegativo))){
			return $retornoNivelNegativo;
	    }elseif(intval($retornoNivelPositivo) < intval(abs($retornoNivelNegativo))){
			return $retornoNivelPositivo;
		}
	}else{
		if(!empty($retornoNivelPositivo)){
           return $retornoNivelPositivo;
		}else{
           return $retornoNivelNegativo;
		}
	}
}

function verificaResultadoTemperaturas($nTeste, $resultadoEsperado, $resultado) {
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
		           'conclusao'=>$conclusao
		          );

	//retornado um array com os dados
    return $dados;
}
function temperaturas(){
   //array dados
   $dados = [];

	/***** Teste 01 *****/
	$niveis = array( 17, 32, 14, 21 );
	$resultadoEsperado = 14;
	$resultado = validaTemperatura($niveis);
	$dados[0]  = verificaResultadoTemperaturas("01", $resultadoEsperado, $resultado);

	/***** Teste 02 *****/
	$niveis = array( 27, -8, -12, 9 );
	$resultadoEsperado = -8;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("02", $resultadoEsperado, $resultado));

	/***** Teste 03 *****/
	$niveis = array( -6, 14, 42, 6, 25, -18 );
	$resultadoEsperado = 6;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("03", $resultadoEsperado, $resultado));

	/***** Teste 04 *****/
	$niveis = array( 34, 11, 13, -23, -11, 18 );
	$resultadoEsperado = 11;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("04", $resultadoEsperado, $resultado));


	/***** Teste 05 *****/
	$niveis = array( 17, 0, 28, -4 );
	$resultadoEsperado = 0;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("05", $resultadoEsperado, $resultado));

	/***** Teste 06 *****/
	$niveis = array( -10, 27, 9, -12 );
	$resultadoEsperado = 9;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("06", $resultadoEsperado, $resultado));

	/***** Teste 07 *****/
	$niveis = array( -47, -14, -5, -12, -8 );
	$resultadoEsperado = -5;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("07", $resultadoEsperado, $resultado));

	/***** Teste 08 *****/
	$niveis = array( -47, -14, -5, -12, -5 );
	$resultadoEsperado = -5;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("08", $resultadoEsperado, $resultado));

	/***** Teste 09 *****/
	$niveis = array( -7, 12, -13, 8 );
	$resultadoEsperado = -7;
	$resultado = validaTemperatura($niveis);
	array_push($dados, verificaResultadoTemperaturas("09", $resultadoEsperado, $resultado));

    //retornado os array dos dados
	return $dados;
}

?>