<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");
require($_SERVER['DOCUMENT_ROOT']."/lib/WideImage.php");

	$bread		= $liberar->breadCrumb();
	$idCat 		= $bread[1];
	$idEvento	= $bread[2];

$idCategoria = $_POST['idCat'];

if(isset($_POST['executar']) && $_POST['executar']=='Enviar Imagem'){
	
	$pasta = "../galeria/".$idCat."/".$idEvento."/";
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
				$imagem = $imagem->resize(480,650,outside);
				$imagem = $imagem->crop(0,0, 480,650);
				$imagem->saveToFile($foto, 80);
				$imagem->destroy();
				
				$imagep = wideImage::Load($foto);				
				$imagep = $imagep->resize(180,120, outside);
				$imagep = $imagep->crop(center,center,280,176);
				$imagep->saveToFile($nomeft, 60);
				$imagep->destroy();	
			}
			
		if($enviado){
			//instanciando o objeto de cadastro
			$cad = new manipulaDados();
			$cad->setTabela("galeria_foto");
			$cad->setCampos("foto, id_cat_foto, id_subcat_foto");
			$cad->setDados("'$nome', '$idCat', '$idEvento'");
			$cad->inserir();
			$erro = base64_encode($cad->getStatus());
		}else{
			echo "arquivo não enviado";
		}
}
if(isset($_POST['executar']) && $_POST['executar']=='Excluir'){
	
	$idFoto		 = $_POST['idFoto'];
	$idCatExc 	 = $_POST['idCatExc'];
	$idEventoExc = $_POST['idEventoExc'];
	$nomeFoto	 = $_POST['nomeFotoExc'];
	
	$local = "../galeria/".$idCatExc."/".$idEventoExc."/";
	
			$pasta = $local.$nomeFoto;
			@unlink($pasta);
			$imgpeq = $local."p_".$nomeFoto;
			@unlink($imgpeq);
	
	$delete = new manipulaDados();
	$delete->setTabela("galeria_foto");
	$delete->setCamposId("id");
	$delete->setValorId($idFoto);
	$delete->deletar();
}
?>

<?php include_once("paginas/carregando.php"); ?>
<form action="" method="post" enctype="multipart/form-data"  name="cad_eventos" id="cad_eventos">
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
        <td  colspan="2">Cadastar Fotos  
        <?php 
            $nomeEvento		= new manipulaDados();
            $x = $nomeEvento->listar1("subcat_foto", "id='$idEvento'", "1", null, null);
            foreach($x as $txtEvento){
                echo $txtEvento['texto'];
            }
    	?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><h3><?php echo base64_decode($bread[5]) ;?></h3></td>
    </tr>
  <tr >
    <td width="15%" ><strong>Foto:</strong></td>
    <td ><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span></td>
  </tr>
  <tr>
    <td  colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="Enviar Imagem" class="btenviar2"/>
	  <input name="idFoto" type="hidden" id="idFoto" value="<?php echo $idCat;?>" />
      <input name="idCat" type="hidden" id="idCat" value="<?php echo $idCat;?>" />
      <input name="idEvento" type="hidden" id="idEvento" value="<?php echo $idEvento;?>" />
    </td>
</tr>
  <tr>
    <td  colspan="2" align="center">&nbsp;</td>
  </tr>
  </table>
</form>
<table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
  <tr class="tittab">
    <td>Fotos Cadastradas na Galeria</td>
  </tr>
  </table>
<?php
	$listaImg 	= new manipulaDados();
	$list 		= $listaImg->listar1("galeria_foto", "id_cat_foto='$idCat' and id_subcat_foto='$idEvento'", null, null, "id ASC");
	foreach($list  as $listaImagem):
?>
<div id="gal_cad">
	<span class="imgGal"><img src="<?php echo urlSite; ?>galeria/<?php echo $listaImagem['id_cat_foto'];?>/<?php echo $listaImagem['id_subcat_foto'];?>/p_<?php echo $listaImagem['foto'];?>" width="160" alt="Exibição"/></span>
    <span class="txtGal"><?php echo $listaImagem['legenda'];?></span>
    <form name="ExcluirImagem" action="" enctype="multipart/form-data" method="post" >
    <input type="hidden" name="idFoto" id="idFoto" value="<?php echo $listaImagem['id'];?>" />
    <input type="hidden" name="idCatExc" id="idCatExc" value="<?php echo $listaImagem['id_cat_foto'];?>" />
    <input type="hidden" name="idEventoExc" id="idEventoExc" value="<?php echo $listaImagem['id_subcat_foto'];?>" />
     <input type="hidden" name="nomeFotoExc" id="nomeFotoExc" value="<?php echo $listaImagem['foto'];?>" />
    <input type="submit" name="executar" id="executar" value="Excluir" class="btenviar2" />
  </form>
</div>
<?php endforeach; ?>
