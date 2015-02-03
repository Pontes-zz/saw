<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesUsers.php");
	
	$listaBanner = new funcoesUsers();
	$listaBanner->setId($_GET['id']);
	$listaBanner->remover();
	$resp = $listaBanner->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../usuarios");
	}
?>