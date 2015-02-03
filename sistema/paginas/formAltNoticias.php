<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraMenus.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesNoticias.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
   include_once("paginas/carregando.php");

  $cad = new funcoesNoticias();
  $cad->alterar();
  $msg = $cad->getStatus();
    
  if(empty($erro)){
    $erro = $msg;   
  }
}

  $lista = new funcoesNoticias();
  $lista->setId($liberar->idEncontrado());
  $lista->geraNoticia();
?>
<form action="" method="post" enctype="multipart/form-data" name="cadNoticia" id="cadNoticia">

<input type="hidden" name="nome" id="nome" value="<?php echo $sid->getNode('NOME') ;?>" />

  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td height="30" colspan="4">Cadastrar</td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" class="celulatab"><h3><?php echo $erro;?></h3></td>
    </tr>
  <tr>
    <td width="15%" height="30" class="celulatab"><strong>Data de cadastro:</strong></td>
    <td width="21%" height="30" class="celulatab"><?php echo $lista->getDataCad(); ?> <input name="id" type="hidden" id="id" value="<?php echo $lista->getId(); ?>" /> </td>
    <td width="33%" class="celulatab">Cadastrado por: <strong><?php echo $lista->getUsuario();?></strong></td>
    <td width="31%" align="center" class="celulatab">&nbsp;</td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Categoria:*</strong></td>
    <td height="30"><strong>
  <?php 
      echo $lista->getCategoria();
      $subCat = $lista->getSubCategoria();
      if(!empty($subCat)){
        echo " / $subCat";
      }
  ?></strong>
</td>
    <td height="30"><div class="buttonPanel"><a href="<?php echo urlPrincipal;?>formAltCat/<?php echo $liberar->idEncontrado()?>">Alterar Categoria</a></div></td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Titulo da Not&iacute;cia:*</strong></td>
    <td height="30" colspan="3"><span id="sprytextfield1">
      <input name="titulo" type="text" id="titulo" size="60" class="todoInput" value="<?php echo $lista->getTitulo();?>"/>
      <span class="textfieldRequiredMsg">Digite o T&iacute;tulo.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Metas-tag:</strong></td>
    <td height="30" colspan="3" valign="middle"><textarea name="metas" cols="100" rows="2" class="todaArea" id="metas"><?php echo $lista->getMetas();?></textarea></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Lead:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span id="sprytextarea1">
    <textarea name="lead" cols="100" rows="3" class="todaArea" id="lead"><?php echo $lista->getLead();?></textarea>
<span class="textareaRequiredMsg">Digite um texto para chamada na home do site.</span><span class="textareaMaxCharsMsg">Número máximo de caracteres excedido.</span></span><br />
      caracteres:<b id="cont_lead"></b>
      
      <p>No m&aacute;ximo 400 caracteres    </p></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Foto:*</strong></td>
    <td height="30"  valign="middle"><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span></td>
  <td colspan="2"><?php
  $imgcadastrada = $lista->getFoto();
  if(!empty($imgcadastrada)){
    echo '<img src="'.urlSite.'uploads/t_'.$imgcadastrada.'" >';
  }else{
    echo "N&atilde;o h&aacute; foto Cadastrada!!";
  }
  ?>
    <input name="fotoantiga" type="hidden" id="fotoantiga" value="<?php echo $imgcadastrada ;?>" /></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Exibir foto na not&iacute;cia:*</strong></td>
    <td height="30" colspan="3"><span id="spryradio1">
    <?php
    $ftNot = $lista->getFotoNot();
    $ftNotTxt = array("N&atilde;o", "Sim");
      foreach($ftNotTxt as $bt=>$v){
        echo '<label><input type="radio" name="fotoNot" id="fotoNot" value="';
          echo $bt.'"';
            if($bt == $ftNot){
              echo " checked ";
            }
          echo '/> '. $v.' </label>';
      }
  ?>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span>
      </td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Legenda para foto:</strong></td>
    <td height="30" colspan="3" valign="middle"><textarea name="legenda" cols="100" rows="3" class="todaArea" id="legenda"><?php echo $lista->getLegenda();?></textarea>
      <br />
caracteres:<b id="contador"></b>
      <br />
      <p>No m&aacute;ximo 400 caracteres    </p>
     </td>
    </tr>
  <tr class="celulatab">
    <td height="30"><strong>Data para Not&iacute;cia:*<br />
      <span class="legenda">Utilize para agendamento futuro</span>    </strong></td>
    <td height="30" colspan="3" valign="middle"><span id="dataNot"><span id="sprytextfield2">
    <input type="text" id="data" name="data" class="inputData" value="<?php echo exibeData($lista->getDataAgenda());?>"/>
    <span class="textfieldRequiredMsg">Escolha uma data.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Status:*</strong></td>
    <td height="30" colspan="3"><span id="spryselect4"><span id="spryselect2">
      <select name="status" id="status" class="todoInput">
        <option value="publicar" <?php  if($lista->getStatus() == "publicar"){echo 'selected="selected"';}?>>publicar</option>
        <option value="arquivar" <?php  if($lista->getStatus() == "arquivar"){echo 'selected="selected"';}?>>arquivar</option>
        <option value="aguardando libera&ccedil;&atilde;o" <?php  if($lista->getStatus() == "aguardando libera&ccedil;&atilde;o"){echo 'selected="selected"';}?>>Aguardando Libera&ccedil;&atilde;o</option>

      </select>
      <span class="selectRequiredMsg">Selecione um item.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Tipo:*</strong></td>
    <td height="30" colspan="3"><span id="spryradio2"><?php
    $tipoN = $lista->getTipo();
    $tipoNot = array("P&uacute;blico","Restrito");
    
    foreach($tipoNot as $tipomidia){
      echo "<label><input type=\"radio\" name=\"tipo\" id=\"tipo\" value=\"".utf8_encode($tipomidia)."\" ";
      if($tipoN == $tipomidia){
        echo " checked='checked'";
      }
      echo " /> ". utf8_encode($tipomidia) ."</label>";
    }
    ?>
      <span class="radioRequiredMsg">Escolha uma Op&ccedil;&atilde;o.</span></span>
      </td>
  </tr>
  
  <tr class="celulatab">
    <td height="30" colspan="4">
      <h3>Not&iacute;cia:</h3>
        <p class="legenda">Digite a mat&eacute;ria no campo.</p>
    <textarea  name="texto" cols="95" ><?php echo $lista->getNoticia(); ?></textarea><script type="text/javascript">
  CKEDITOR.replace('texto');
</script></td>
  </tr>
   <tr>
    <td height="30" colspan="4" align="center"><input type="submit" name="executar" id="executar" value="ALTERAR" class="btenviar2" />
</td>
</tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:400});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
</script>
