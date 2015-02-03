<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
require($_SERVER['DOCUMENT_ROOT']."/sistema/lib/WideImage.php");

$idCategoria = $_POST['idCat'];
$idSubCategoria = $_POST['idSubCat'];
$leg = utf8_decode($_POST['legenda']);

if(isset($_POST['executar']) && $_POST['executar']=='Enviar Imagem'){
	
	$pasta = "../galeria/".$idCategoria."/";
	$imagem = $_FILES['img'];
	$nomeImg = $imagem['name'];
	
	$ext = explode('.', $nomeImg);
	$extensao = strtolower(end($ext));
	$nome 	= md5(uniqid(rand(),true)).".$extensao";
		@rename($nomeImg, $nome);
		
		$tmp = $imagem['tmp_name'];
		if($enviado = @move_uploaded_file($tmp, $pasta.$nome)){
										
				$foto = "$pasta$nome";
				$fotoloadp = "p_$nome";
				$nomeft= "$pasta$fotoloadp";
							
				$imagem = wideImage::Load($foto);
				$imagem = $imagem->resize(670,503,outside);
				$imagem->saveToFile($foto, 80);
				$imagem->destroy();
				
				$imagep = wideImage::Load($foto);				
				$imagep = $imagep->resize(280,210, outside);
				$imagep = $imagep->crop(center,center,280,176);
				$imagep->saveToFile($nomeft, 60);
				$imagep->destroy();	
			}
			
			if($enviado){
			//instanciando o objeto de cadastro
			$cad = new manipulaDados();
			$cad->setTabela("galeriafoto");
			$cad->setCampos("foto, legenda, id_categoriagal, id_subcategoria");
			$cad->setDados("'$nome', '$leg', '$idCategoria', '$idSubCategoria'");
			$cad->inserir();
			$erro = base64_encode($cad->getStatus());
		}else{
			echo "arquivo não enviado";
		}
}
?>

<div id="total">
  <p class="titp"><a href="?paginas=planejados">Planejados</a> &gt; Inserir Fotos em: <?php echo $_GET['categoria']; ?></p>
</div>
<?php include_once("paginas/carregando.php"); ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="277">&nbsp;</td>
    <td width="194">&nbsp;</td>
    <td width="558">&nbsp;</td>
  </tr>
</table>
<form action="" method="post" enctype="multipart/form-data"  name="cad_eventos" id="cad_eventos">
  <table width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td height="30" colspan="2" class="tittab">Cadastar Fotos em <?php echo $_GET['categoria']; ?> </td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" class="celulatab"><h3><?php echo base64_decode($_GET["msn"]) ;?></h3></td>
    </tr>
  <tr class="celulatab">
    <td width="15%" height="30"><strong>Foto:</strong></td>
    <td height="30"><input name="img" type="file" id="img" size="40" /></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Legenda:</strong></td>
    <td height="30"><input name="legenda" type="text" id="legenda" size="60" /></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="Enviar Imagem" class="btenviar2"/>
      <input name="idCat" type="hidden" id="idCat" value="<?php echo $_GET['id'];?>" />
      <input name="idSubCat" type="hidden" id="idSubCat" value="<?php echo $_GET['idp'];?>" /></td>
</tr>
  <tr>
    <td height="30" colspan="2" align="center">&nbsp;</td>
  </tr>
  </table>
</form>
<h3>Fotos Cadastradas na Galeria</h3>
<?php
	$idCat = $_GET['id'];
	$idSub = $_GET['idp'];
	$listaImg = new manipulaDados();
	$list = $listaImg->listar1("galeriafoto","id_categoriagal='$idCat' && id_subcategoria='$idSub'", null, null, "id ASC");
	foreach($list  as $listaImagem):
?>
<div id="gal_cad">
	<span class="imgGal"><img src="../galeria/<?php echo $listaImagem['id_categoriagal'];?>/<?php echo $listaImagem['foto'];?>" width="160" alt="Exibição"/></span>
    <span class="txtGal"><?php echo $listaImagem['legenda'];?></span>
    <form name="ExcluirImagem" action="" enctype="multipart/form-data" method="post" >
    <input type="hidden" name="idCategExc" id="idCategExc" value="<?php echo $listaImagem['id_categoriagal'];?>" />
    <input type="hidden" name="idExcFoto" id="idExcFoto" value="<?php echo $listaImagem['id'];?>" />
    <input type="hidden" name="nomeExcFoto" id="nomeExcFoto" value="<?php echo $listaImagem['foto'];?>" />
    <input type="submit" name="executar" id="executar" value="Excluir" class="btenviar2" />
  </form>
</div>
<?php endforeach; ?>
