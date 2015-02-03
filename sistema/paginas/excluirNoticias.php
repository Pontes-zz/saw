<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesNoticias.php");
	
	$listaBanner = new funcoesNoticias();
	$listaBanner->setId($_GET['id']);
	$listaBanner->remover();
	$resp = $listaBanner->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		header("Location: ../noticias");
	}
?>