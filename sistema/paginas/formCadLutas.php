<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesHorarios.php");

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	$cad = new funcoesHorarios();
	$cad->cadastrarLutas();
	$msg = $cad->getStatus();

	include_once("paginas/carregando.php");
	
	if(empty($erro)){
		$erro = $msg;		
	}else{
    $erro = "Erro na função!";
  }
}
?>

<form action="" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Modalidades</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td width="15%" ><strong>Usu&aacute;rio:</strong></td>
    <td ><strong><?php echo $sid->getNode('NOME') ;?></strong></td>
    </tr>
  <tr>
    <td><strong>Texto:</strong></td>
    <td><input type="text" name="lutas" id="lutas" class="todoInput"/></td>
  </tr>
  <tr>
    <td><strong>Foto:</strong></td>
    <td><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span>
     </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>