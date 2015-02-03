<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesBanner.php");
	
	$listaBanner = new funcoesBanner();
	$listaBanner->setId($_GET['id']);
	$listaBanner->removerBanner();
	$resp = $listaBanner->getStatus();
	
	if($resp = "Removido com Sucesso!!"){
		@header("Location: ../banner");
	}
?>