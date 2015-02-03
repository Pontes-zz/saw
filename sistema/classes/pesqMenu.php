<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");

	$x = $_POST['categoria'];

	$pesquisa = new manipulaDados();
	$pesquisa->setTabela("menu");
	$pesquisa->setCamposId("texto");
	$xa = $pesquisa->codificaHtml($x);
	$pesquisa->setValorId($xa);
	
	$xy = $pesquisa->retornaId();
	
	$pesq = $pesquisa->listar1("menu", "id_menu='$xy' && id_menu>'0'", null, null, "texto ASC");
			
		if(!empty($pesq)){
			foreach($pesq as $a){
			echo '<option value="'.$a["texto"].'">'.$a['texto'].'</option>';
			}
		}else{
			echo '<option value="0" disabled="true">N&atilde;o h&aacute; sub-categoria</option>';
		}
?>
