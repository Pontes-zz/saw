
<?php
include_once("classes/manipulaDados.class.php");
include_once("classes/config_var.php");
include_once("classes/removeacentos.php");
include_once("funcoes/tratartexto.php");
	
	$idEnc = array_reverse($liberar->breadCrumb());
	$tipoDado = utf8_decode("Público");

	$dados = new manipulaDados();

	$lista = $dados->listar1("noticias", "dtagenda<='dataHoje' && url_categoria='$idEnc[0]' || url_seo='$idEnc[0]' && tipo='$tipoDado' && status='publicar' && dtagenda!='0000-00-00'", "1", null, null);
	foreach($lista as $lt){
		$categoria = $lt['url_categoria'];
	}

	$breadSt = $dados->breadString($liberar->breadCrumb(), $lista);
	
	$pagina = $liberar->allowConteudo();
		
	if(file_exists($pagina) && ($categoria == $idEnc[0])){
		$blocoP1 = "exibirNotFoto.php";
	}else{
		$blocoP1 = "404.php";
	}
?>