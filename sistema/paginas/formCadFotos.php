<?php
include_once($_SERVER['DOCUMENT_ROOT']."/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/classes/listaManutencao.php");
$listagem = new listaManutencao();
$listagem->setNumPagina($_GET["pg"]);
$listagem->setUrl("?paginas=foto");

?>
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
<form action="funcoes/cadeventos.php" method="post" enctype="multipart/form-data" name="cad_eventos" id="cad_eventos">
  <table width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td height="30" colspan="2" class="tittab">Cadastrar Eventos</td>
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
    <td height="30"><input name="texto" type="text" id="texto" size="60" /></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Data:</strong></td>
    <td height="30"><span id="sprytextfield2">
      <input type="text" id="data" name="data" />
      <span class="textfieldRequiredMsg">Preenchimento Obrigatório.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="image" name="imageField" id="imageField" src="imagens/cadastrar.jpg" />
      <input name="txtlocal" type="hidden" id="txtlocal" value="formCadEventos" /></td>
</tr>
  <tr>
    <td height="30" colspan="2" align="center">&nbsp;</td>
  </tr>
  </table>
</form>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true, isRequired:false});
</script>
