
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesBanner.php");

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	$cad = new funcoesBanner();
	$cad->cadastrarBanner();
	$msg = $cad->getStatus();

	include_once("paginas/carregando.php");
	
	if(empty($erro)){
		$erro = $msg;		
	}else{
    $erro = "não executado a função banner!";
  }
}
?>

<form action="" method="post" enctype="multipart/form-data" name="cad_banner" id="cad_banner">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Banner</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td width="15%" ><strong>Usu&aacute;rio:</strong></td>
    <td ><strong><?php echo "Administrador";?></strong></td>
    </tr>
  <tr>
    <td><strong>Texto:</strong></td>
    <td><input type="text" name="texto" id="texto" class="todoInput"/></td>
  </tr>
  <tr>
    <td><strong>Link:</strong></td>
    <td><input type="text" name="link" id="link" class="todoInput"/></td>
  </tr>
  <tr>
    <td><strong>V&iacute;deo:</strong></td>
    <td><input type="text" name="video" id="video" class="todoInput"/></td>
  </tr>
  <tr>
    <td><strong>Foto:</strong></td>
    <td><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span>
      <br /><br />
      <em>Dimens&otilde;es: <?php echo wBanner ."x". hBanner; ?> pixels;</em></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>