<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/alteraFotos.php");

require($_SERVER['DOCUMENT_ROOT']."/lib/WideImage.php");

	$listaFotos = new alteraFotos();
	$listaFotos->setId($liberar->idEncontrado());
	$listaFotos->geraEventos();
	
	include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");

?>

<form action="<?php echo urlPrincipal;?>funcoes/alterabanco.php" method="post" enctype="multipart/form-data" name="altEventos" id="altEventos">
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Alterar Evento</td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><h3><?php echo base64_decode($breadCrumb[1]) ;?></h3></td>
    </tr>
  <tr>
    <td width="15%"  ><strong>Usu&aacute;rio:</strong></td>
    <td  ><strong><?php echo "Administrador";?></strong></td>
    </tr>
  <tr >
    <td ><strong>Evento:</strong></td>
    <td ><input name="evento" type="text" id="evento" value="<?php echo $listaFotos->getEvento(); ?>" size="60" /></td>
  </tr>
  <tr >
    <td ><strong>Categoria:</strong></td>
    <td ><select name="categoriaId" id="categoriaId">
            <?php 
				$listaFotos->menuCategoria();
			?>
      	</select></td>
  </tr>
  <tr >
    <td ><strong>Foto da Categoria:</strong></td>
    <td ><img src="<?php echo urlSite ;?>galeria/<?php echo $listaFotos->getIdCategoria(); ?>/<?php echo $listaFotos->getIdEvento(); ?>/<?php echo $listaFotos->getFotoEvento(); ?>" width="120" />
	<?php
    $imgcadastrada = $listaFotos->getFotoEvento();
	?>
    <input name="fotoantiga" type="hidden" id="fotoantiga" value="<?php echo $imgcadastrada ;?>" /></td>
  </tr>
  <tr >
    <td ><strong>Trocar Foto:</strong></td>
    <td  colspan="2" valign="middle"><span class="file-wrapper"><input name="foto" type="file" id="foto" />
<span class="button1">Escolha a Foto</span>
</span></td>
  </tr>
  <tr>
     <td><strong>Data do Evento:</strong></td>
     <td><input type="text" id="data" name="data" value="<?php echo exibeData($listaFotos->getDataEvento()); ?>" /></td>
   </tr>
   <tr>
     <td colspan="2"><strong>Descri&ccedil;&atilde;o:</strong></td>
    </tr>
   <tr>
    <td colspan="2"><textarea  name="texto" cols="95" ><?php echo $listaFotos->getDescricao(); ?></textarea><script type="text/javascript">
	CKEDITOR.replace('texto');
</script></td>
    </tr>
  <tr>
    <td  align="center" colspan="2"><input name="cadastar" type="submit" id="imageField" value="CADASTAR" class="btenviar2" />
      <input name="txtlocal" type="hidden" id="txtlocal" value="formAltEventos" />
      <input name="id" type="hidden" id="id" value="<?php echo $listaFotos->getIdEvento(); ?>" />
      </td>
</tr>
  
  </table>
</form>
