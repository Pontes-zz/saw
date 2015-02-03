<?php
function exibeData($ed){
	$dataexibe = explode("-", $ed);
	$dia = $dataexibe[2]; 
	$mes = $dataexibe[1];
	$ano = $dataexibe[0];
	$datatratada = $dia."/".$mes."/".$ano;
	return $datatratada;
}

function cadastraData($cd){
	$dataconv = explode("/", $cd);
	$dia = $dataconv[0];
	$mes = $dataconv[1];
	$ano = $dataconv[2];
	$datavalida = $ano."-".$mes."-".$dia;
	return $datavalida;
}
function mostraDataHora($md){
	$data = strtotime($md);
	$dataExibe = date('d/m/Y H:i', $data);
	return $dataExibe;
	
}

?>