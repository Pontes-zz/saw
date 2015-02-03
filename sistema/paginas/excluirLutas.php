<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesHorarios.php");
	
	$lista = new funcoesHorarios();
	$lista->setId($_GET['id']);
	$lista->removerLutas();
	$resp = $lista->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../horarios");
	}
?>