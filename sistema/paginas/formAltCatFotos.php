<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/alteraFotos.php");
	$listaFotos = new alteraFotos();
	$listaFotos->setId($liberar->idEncontrado());
	$listaFotos->geraEventos();
	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
?>
<script type="text/javascript">
$('input[type=file]').change(function() { 
   // select the form and submit
  $('form').submit(); 
});
</script>

<form action="<?php echo urlPrincipal;?>funcoes/alterabanco.php" method="post" enctype="multipart/form-data" name="altCatPlanejados" id="altCatPlanejados">
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
  <tr class="tittab">
    <td colspan="2" >Alterar Categoria</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><h3><?php echo base64_decode($_GET["msn"]) ;?></h3></td>
    </tr>
  <tr>
    <td width="15%"><strong>Usu&aacute;rio:</strong></td>
    <td ><strong><?php echo "Administrador";?></strong></td>
    </tr>
  <tr>
    <td height="30"><strong>Categoria:</strong></td>
    <td height="30"><input name="texto" type="text" id="texto" value="<?php echo $listaFotos->getEvento(); ?>" size="60" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input name="cadastar" type="submit" id="imageField" value="CADASTAR" class="btenviar2" />
      <input name="txtlocal" type="hidden" id="txtlocal" value="formAltCatFotos" />
      <input name="id" type="hidden" id="id" value="<?php echo $listaFotos->getIdEvento(); ?>" />
      
      </td>
</tr>
  
  </table>
</form>
