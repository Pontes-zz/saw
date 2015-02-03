<?php
	
	/*define(urlSite, 'http://dominiodosite/');
	define(urlPrincipal, 'http://dominiodosite/sistema/');*/
	define(urlPrincipal, "http://www.dominiodosite.com.br/sistema/" );
	define(urlSite, 'http://www.dominiodosite.com.br/');

	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/permissao.php");

	$liberar = new permissao;
	$estilos = $liberar->estilos();
	$breadCrumb	 = $liberar->breadCrumb();
		
	include_once("paginas/layout.php");
	
?>
 
