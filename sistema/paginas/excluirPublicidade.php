<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesPublicidade.php");
	
	$lista = new funcoesPublicidade();
	$lista->setId($_GET['id']);
	$lista->remover();
	$resp = $lista->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../publicidade");
	}
?>