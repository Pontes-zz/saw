<?php
include($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesCategorias.php");
	
	$lista = new funcoesCategorias();
	$lista->setId($_GET['id']);
	$lista->remover();
	$resp = $lista->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../menus");
	}
?>