<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesPublicidade.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
	
  include_once("paginas/carregando.php");
  $cad = new funcoesPublicidade();
	$cad->alterar();
	$msg = $cad->getStatus();
	
	if(empty($erro)){
		$erro = $msg;		
	}
}

	$lista = new funcoesPublicidade();
	$lista->setId($liberar->idEncontrado());
	$lista->gerarDados();

?>
<form action="" method="post" enctype="multipart/form-data" name="alterar" id="alterar">
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
  <tr class="tittab">
    <td colspan="2" >Altera&ccedil;&atilde;o de  Publicidade</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h3><?php echo $erro ;?></h3></td>
    </tr>
   <tr>
    <td><strong>Tamanho:</strong><input name="id" type="hidden" id="id" value="<?php echo $lista->getId; ?>" /></td>
    <td><select name="tamanho" id="tamanho" class="todoInput">
          <option>Selecione um tamanho</option>
  <?php
      $statusV = $lista->getTamanho();
      $statusvd = array("630x120", "300x120");
    
    foreach($statusvd as $exibeStatusVd){
      echo "<option value=\"".$exibeStatusVd."\" ";
      if($statusV == $exibeStatusVd){
        echo "selected=\"selected\"";
        }
        echo ">".$exibeStatusVd."</option>";
    }
    
    ?>
      </select></td>
  </tr>
  <tr>
    <td><strong>Link:</strong></td>
    <td><input type="text" name="link" id="link" class="todoInput" value="<?php echo $lista->getLink() ;?>"/></td>
  </tr>
  <tr>
    <td height="30"><strong>Foto Cadastrada:</strong></td>
    <td height="30"> <?php
	$imgcadastrada = $lista->getFoto();
	if(!empty($imgcadastrada)){
		echo "<img src=\"".urlSite."uploads/t_$imgcadastrada\" width=\"120\">";
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
</span></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="ALTERAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>