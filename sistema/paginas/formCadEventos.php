<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraCategorias.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/manipulaDados.class.php");

require($_SERVER['DOCUMENT_ROOT']."/sistema/lib/WideImage.php");

$id 	= $_POST['categoriaId'];
$evento	= htmlentities($_POST['evento']);
$data	= cadastraData($_POST['data']);
$texto = $_POST['texto'];

$cad = new manipulaDados();
$cad->setTabela("subcat_foto");
$cad->setCamposId("id");
			
$ultimoId = $cad->pegaUltimoId();
$ultimoId =	$ultimoId + 1;

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
		
	$pasta = "../galeria/".$id."/". $ultimoId;
	
if(@mkdir($pasta, 0777, true)){
	
	$pasta = $pasta."/";
	$imagem = $_FILES['img'];
	$nomeImg = $imagem['name'];
	
	$ext = explode('.', $nomeImg);
	$extensao = strtolower(end($ext));
	$nomeFoto 	= md5(uniqid(rand(),true)).".$extensao";
		@rename($nomeImg, $nomeFoto);
		
		$tmp = $imagem['tmp_name'];
		if($enviado = @move_uploaded_file($tmp, $pasta.$nomeFoto)){
										
				$foto = "$pasta$nomeFoto";
				$fotoloadp = "pb_$nomeFoto";
				$nomeft= "$pasta$fotoloadp";
							
				$imagem = wideImage::Load($foto);
				$imagem = $imagem->resize(180,120,outside);
				$imagem = $imagem->crop(center, center, 180,120);
				$imagempb = $imagem->asGrayscale();
				$imagem->saveToFile($foto, 80);
				
				$imagempb->saveToFile($nomeft, 80);
				$imagem->destroy();
				$imagempb->destroy();
				
			}
			
			if($enviado){
			//instanciando o objeto de cadastro
			$cad->setTabela("subcat_foto");
			$cad->setCampos("texto, id_cat_foto, foto, data, descricao");
			$cad->setDados("'$evento', '$id', '$nomeFoto', '$data', '$texto'");
			$cad->inserir();
			$erro = base64_encode($cad->getStatus());
		}else{
			$erro = base64_encode("arquivo não enviado");
		}

	}else{
	   $erro = base64_encode("Não foi possível criar o diretório!");
	}	

}

?>

<?php include_once("paginas/carregando.php"); ?>
<form action="" method="post" enctype="multipart/form-data"  name="cadEVenttos" id="cadEventos">
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2">Cadastar Categoria Planejados</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h3><?php echo base64_decode($erro) ;?></h3></td>
  </tr>
  <tr>
    <td><strong>Categoria:</strong></td>
    <td><select name="categoriaId" id="categoriaId">
        	<option >Selecione uma Categoria</option>
            <?php 
				$menuCat = new geraCategorias();
				$menuCat->criaMenu();
			?>
      	</select>
    </td>
  </tr>
  <tr>
    <td><strong>Evento:</strong></td>
    <td><input name="evento" type="text" id="evento" size="60" /></td>
  </tr>
  <tr>
    <td width="15%"><strong>Foto da Capa:</strong></td>
    <td><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span></td>
  </tr>
   <tr>
     <td><strong>Data do Evento:</strong></td>
     <td><input type="text" id="data" name="data" /></td>
   </tr>
   <tr>
     <td colspan="2"><strong>Descri&ccedil;&atilde;o:</strong></td>
    </tr>
   <tr>
    <td colspan="2"><textarea  name="texto" cols="95" ></textarea><script type="text/javascript">
	CKEDITOR.replace('texto');
</script></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
  </table>
</form>