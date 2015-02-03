<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraMenus.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesVideos.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
	
  include_once("paginas/carregando.php");
  
  $cad = new funcoesVideos();
	$cad->alterar();
	$msg = $cad->getStatus();
	
	if(empty($erro)){
		$erro = $msg;		
	}
}

	$listaVideo = new funcoesVideos();
	$listaVideo->setId($liberar->idEncontrado());
	$listaVideo->geraVideo();
?>
<div id="total">
<form action="" method="post" enctype="multipart/form-data" name="altVideos" id="altVideos" >
 <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td height="30" colspan="4">Cadastrar</td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" class="celulatab"><h3><?php echo $erro;?></h3></td>
    </tr>
  <tr class="celulatab">
    <td width="160" height="30"><strong>Titulo do V&iacute;deo:*</strong><input name="id" type="hidden" id="id" value="<?php echo $listaVideo->getId(); ?>" /></td>
    <td height="30"><span id="sprytextfield1">
      <input name="titulo" type="text" id="titulo" value="<?php echo $listaVideo->getTitulo(); ?>" size="60" class="todoInput">
      <span class="textfieldRequiredMsg">Favor preencher o campo</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Lead:*</strong></td>
    <td height="30" valign="middle"><input name="lead" type="text" id="lead" value="<?php echo $listaVideo->getLead(); ?>" size="60" class="todoInput" /></td>
  </tr>
<tr class="celulatab">
    <td height="30"><strong>Metas-tag:</strong></td>
    <td height="30" colspan="3" valign="middle"><textarea name="metas" cols="100" rows="2" class="todaArea" id="metas"><?php echo $listaVideo->getMetas();?></textarea></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Data:*</strong></td>
    <td height="30" valign="middle"><span id="sprytextfield2">
      
      <input name="data" type="text" id="data"  value="<?php echo $listaVideo->getDataCad(); ?>"size="25"  class="inputData"/>
      <span class="textfieldRequiredMsg">Preenchimento Obrigatório.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
  </tr>
    <tr class="celulatab">
    <td height="30"><strong>Categoria:</strong></td>
    <td height="30"><span id="spryselect1">
      <select name="categoria" id="categoria" class="todoInput">
        <?php
    	  	$catMenu  = $listaVideo->getCategoria();
    		  $listaVideo->geraMenuVideoSel($catMenu);
  	   ?>
        </select>
      <span class="selectRequiredMsg">Favor Selecionar um item.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Foto:*</strong></td>
    <td height="30"  valign="middle"><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span> 
<?php
    $imgcadastrada = $listaVideo->getFoto();
      if(!empty($imgcadastrada)){
        echo '<img src="'.urlSite.'uploads/t_'.$imgcadastrada.'" >';
      }else{
        echo " N&atilde;o h&aacute; foto Cadastrada!!";
      }
?>
    <input name="fotoantiga" type="hidden" id="fotoantiga" value="<?php echo $imgcadastrada ;?>" /></td>
  </tr>

  <tr class="celulatab">
    <td height="30"><strong>Status:</strong></td>
    <td height="30"><span id="spryselect2">
      <select name="status" id="status" class="todoInput">
      <?php
	  	$statusV = $listaVideo->getStatus();
		  $statusvd = array("publicar","arquivar","Aguardando Libera&ccedil;&atilde;o");
		
		foreach($statusvd as $exibeStatusVd){
			echo "<option value=\"".$exibeStatusVd."\" ";
			if($statusV == $exibeStatusVd){
				echo "selected=\"selected\"";
				}
				echo ">".$exibeStatusVd."</option>";
		}
	  
	  ?>
        </select>
      <span class="selectRequiredMsg">Favor Selecionar um item.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Incluir c&oacute;digo:</strong></td>
    <td height="30"><textarea name="video" cols="90" rows="4" id="video" class="todoInput"><?php echo $listaVideo->getVideo(); ?></textarea></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Tipo:*</strong></td>
    <td height="30" colspan="3"><span id="spryradio1"><?php
		$tipoN = $listaVideo->getTipo();
		$tipoNot = array("P&uacute;blico","Restrito");
		
		foreach($tipoNot as $tipomidia){
			echo "<label><input type=\"radio\" name=\"tipo\" id=\"tipo\" value=\"".$tipomidia."\" ";
			if($tipoN == $tipomidia){
				echo " checked='checked'";
			}
			echo " /> $tipomidia</label>";
		}
		?>
      <span class="radioRequiredMsg">Escolha uma Op&ccedil;&atilde;o.</span></span>
      </td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Sinospse:</strong></td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr class="celulatab">
    <td height="30" colspan="2"><textarea  name="texto" cols="95" ><?php echo $listaVideo->getTexto(); ?></textarea><script type="text/javascript">
	CKEDITOR.replace('texto');
</script></td>
  </tr>
  <tr class="celulatab">
    <td height="30" colspan="4" align="center"><input type="submit" name="executar" id="executar" value="ALTERAR" class="btenviar2" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");

</script>
