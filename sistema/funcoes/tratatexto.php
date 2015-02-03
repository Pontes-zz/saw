<?php
/********************************************************
*** FUNÇÃO PARA CORTAR FRASE
********************************************************/
function cortaFrase($frase, $caract)
{
   /*
    *
    * $frase = string com o conteúdo a ser formatada
    * $qtde_letras = quantidade de caracteres máximo
    *
    *
    * OBS:
    * CONSIDERAR A RETICÊNCIAS ADICIONADA CASO A STRING
    * SEJA MAIOR QUE A QUANTIDADE MÁXIMA DE CARACTERES
    *
    */
   $qtde_letras = $caract;
   $p = explode(' ', $frase);
   $c = 0;
   $cortada = '';
 
   foreach($p as $p1){
      if ($c<$qtde_letras && ($c+strlen($p1) <= $qtde_letras)){
         $cortada .= ' '.$p1;
         $c += strlen($p1)+1;
      }else{
         break;
      }
   }
 
   return strlen($cortada) < $qtde_letras ? $cortada.'...' : $cortada;
}
 //$frase = "O rato roeu a roupa do rei de roma";
 
// LEMBRAR DE RETIRAR CÓDIGOS HTML CASO NECESSÁRIO cortaFrase(strip_tags($frase))
//echo cortaFrase($frase);

/********************************************************
*** FUNÇÃO PARA CORTAR O TEXTO
********************************************************/
function cortaTextoBusca($txtString, $src, $qtdCarac){

$txtHtmlDecode = html_entity_decode($txtString);
$txtStrTag = strip_tags($txtHtmlDecode);
$minha_string = $txtStrTag;

$busca = $src;

$txtRecorrente = stristr($minha_string, $busca);//achar a primeira texto recorrente

$contaBusca = strlen($busca);

$busca = substr($txtRecorrente,0, $contaBusca);

$contaString = strlen($minha_string);

$posicao = strpos($minha_string, $busca);

$qtdPos = $contaBusca + $posicao;
 
	if($posicao >= $qtdCarac){
		$qtdAntes = $posicao - $qtdCarac;
		$retAntes = " ...";
	}else{
		$qtdAntes = 0;
		$retAntes = "";
	}

$textoAntesBusca = substr($minha_string, $qtdAntes, $qtdCarac);

$textoAposBusca = substr($minha_string, $qtdPos);
$txtPos = strlen($textoAposBusca);

	if($txtPos>=$qtdCarac){
		$textoApos = substr($minha_string, $qtdPos, $qtdCarac);
		$retApos = " ...";
	}else{
		$textoApos = substr($minha_string, $qtdPos);
		$retApos = "";
	}

	if(!empty($busca)){
		return $retAntes.$textoAntesBusca." <span class=\"textoBusca\"> ".$busca." </span> ".$textoApos.$retApos;
	}else{
		return $retAntes.$textoAntesBusca." <span class=\"textoBusca\"> ".$busca." </span> ".$retApos;
	}
}
?> 