<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesAgenda.php");
	
	$lista = new funcoesAgenda();
	$lista->setId($_GET['id']);
	$lista->remover();
	$resp = $lista->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../agenda");
	}
?>