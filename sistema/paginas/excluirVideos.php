<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesVideos.php");
	
	$lista = new funcoesVideos();
	$lista->setId($_GET['id']);
	$lista->remover();
	$resp = $lista->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../videos");
	}
?>