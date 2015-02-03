<?php 
	$urlCol 	= $_GET['url'];
	$bread 		= explode ('/', $urlCol);
	
	$breadId	= $bread[3];
	
	if(is_numeric($breadId)){
		$breadCrumb = urlPrincipal . $bread[2] ."/" . $bread[3];
	}else{
		$breadCrumb = urlPrincipal . $bread[2];
	}

?>