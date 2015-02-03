<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesAgenda.php");

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	$cad = new funcoesAgenda();
	$cad->cadastrar();
	$msg = $cad->getStatus();

	include_once("paginas/carregando.php");
	
	if(empty($erro)){
		$erro = $msg;		
	}
}
?>
<form action="" method="post" enctype="multipart/form-data" name="cadAgenda" id="cadAgenda">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Agenda</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td><strong>Evento:</strong></td>
    <td><textarea name="evento" class="todoInput" id="evento"></textarea></td>
  </tr>
  <tr>
    <td><strong>Data:</strong></td>
    <td><span id="sprytextfield1">
    <input type="text" id="data" name="data" class="inputData" />
    <span class="textfieldRequiredMsg">Digite um Data.</span><span class="textfieldInvalidFormatMsg">Formato inv&aacute;lido.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {useCharacterMasking:true, format:"dd/mm/yyyy"});
</script>
