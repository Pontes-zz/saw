<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesBanner.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
	$cad = new funcoesBanner();
	$cad->alterarBanner();
	$msg = $cad->getStatus();
	
	if(empty($erro)){
		$erro = $msg;	
    include_once("paginas/carregando.php");	
	}
}

	$listaBanner = new funcoesBanner();
	$listaBanner->setId($liberar->idEncontrado());
	$listaBanner->geraBanner();

?>
<form action="" method="post" enctype="multipart/form-data" name="alt_banner" id="alt_banner">
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
  <tr class="tittab">
    <td colspan="2" >Altera&ccedil;&atilde;o de  Banner</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td width="15%" ><strong>Usu&aacute;rio:</strong></td>
    <td ><strong><input name="idbanner" type="hidden" id="idbanner" value="<?php echo $listaBanner->getIdBanner; ?>" /></strong></td>
    </tr>
   <tr>
    <td><strong>Texto:</strong></td>
    <td><input type="text" name="texto" id="texto" class="todoInput" value="<?php echo $listaBanner->getTextoBanner() ;?>"/></td>
  </tr>
  <tr>
    <td><strong>Link:</strong></td>
    <td><input type="text" name="link" id="link" class="todoInput" value="<?php echo $listaBanner->getLinkBanner() ;?>"/></td>
  </tr>
  <tr>
    <td><strong>V&iacute;deo:</strong></td>
    <td><textarea name="video" cols="90" rows="4" id="video" class="todoInput"><?php echo $listaBanner->getVideoBanner(); ?></textarea>
  </tr>
  <tr>
    <td><strong>V&iacute;deo Cadastrado:</strong></td>
    <td><?php echo $listaBanner->getVideoBanner() ;?></td>
  </tr>
  <tr>
    <td height="30"><strong>Foto Cadastrada:</strong></td>
    <td height="30"><?php
	$imgcadastrada = $listaBanner->getFotoBanner();
	if(!empty($imgcadastrada)){
		echo "<img src=\"".urlSite."banner/h_$imgcadastrada\" width=\"120\">";
	}else{
		echo "Não há foto Cadastrada!!";
	}
	?>
    <input name="fotoantiga" type="hidden" id="fotoantiga" value="<?php echo $imgcadastrada ;?>" /></td>
  </tr>
  <tr>
    <td height="30"><strong>Foto:</strong></td>
    <td height="30"><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span>
      <br /><br />
      <em>Dimens&otilde;es: <?php echo wBanner ."x". hBanner; ?> pixels</em></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="ALTERAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>