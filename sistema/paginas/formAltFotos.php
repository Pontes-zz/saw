<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/alteraFotos.php");
	$listaFotos = new alteraFotos();
	$listaFotos->setId($_GET['id']);
	$listaFotos->geraEventos();
	
	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");

?>
<script src="js/jquery-1.8.1.js"></script>
<script src="js/limitar.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="js/themes/base/jquery.ui.all.css">
	<script src="js/jquery-1.5.1.js"></script>
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.datepicker.js"></script>
    <script src="js/jquery.ui.datepicker-pt-BR.js"></script>
    <script src="js/limitar.js"></script>
<link rel="stylesheet" href="js/demos.css">
<script language="javascript" type="text/javascript">
	$(function() {
		$( "#data" ).datepicker({
			showOn: "button",
			buttonImage: "imagens/iconecalendar.gif",
			buttonImageOnly: true
		});
		
	});
	</script>
	

<div id="total">
  <p class="titp"><a href="?paginas=fotos&idp=fotos&tipo=fotos">Galeria de Fotos</a> </a> &gt; Inserir Evento</p>
</div>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="277">&nbsp;</td>
    <td width="194">&nbsp;</td>
    <td width="558">&nbsp;</td>
  </tr>
</table>
<form action="funcoes/alterabanco.php" method="post" enctype="multipart/form-data" name="alt_eventos" id="alt_eventos">
  <table width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td height="30" colspan="2" class="tittab">Alterar Eventos</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" class="celulatab"><h3><?php echo base64_decode($_GET["msn"]) ;?></h3></td>
    </tr>
  <tr>
    <td width="15%" height="30" class="celulatab"><strong>Usu&aacute;rio:</strong></td>
    <td height="30" class="celulatab"><strong><?php echo "Administrador";?></strong></td>
    </tr>
  <tr class="celulatab">
    <td height="30"><strong>Evento:</strong></td>
    <td height="30"><input name="texto" type="text" id="texto" value="<?php echo $listaFotos->getEvento(); ?>" size="60" /></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Data:</strong></td>
    <td height="30"><span id="sprytextfield2">
      <input name="data" type="text" id="data" value="<?php 
		$data = exibeData($listaFotos->getDataEvento());
	  echo $data; ?>" />
      <span class="textfieldRequiredMsg">Preenchimento Obrigatório.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="image" name="imageField" id="imageField" src="imagens/cadastrar.jpg" />
      <input name="txtlocal" type="hidden" id="txtlocal" value="formAltFotos" />
      <input name="id" type="hidden" id="id" value="<?php echo $listaFotos->getIdEvento(); ?>" /></td>
</tr>
  <tr>
    <td height="30" colspan="2" align="center">&nbsp;</td>
  </tr>
  </table>
</form>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true, isRequired:false});
</script>
