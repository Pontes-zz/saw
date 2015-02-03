<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraMenus.php");
  $menus = new geraMenus();
  $menus->setTabela("menu");
  
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesNoticias.php");

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR' ){
  $cad = new funcoesNoticias();
  $cad->cadastrar();
  $msg = $cad->getStatus();

  include_once("paginas/carregando.php");
    if(empty($erro)){
      $erro = $msg;   
    }
}
  
?>
<script type="text/javascript">
  $(document).ready(function() {  
      $("select[name=categoria]").change(function(){
        
        $("select[name=subcategoria]").html('<option value="0">Carregando...</option>');
        
        $.post("classes/pesqMenu.php",
          {categoria:$(this).val()},
          function(valor){
            $("select[name=subcategoria]").html(valor);
          }
          )
      })
  })
</script>
<div id="total">
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
    <td width="21%" height="30" class="celulatab"><?php echo date ('j/m/Y'); ?>
      <input name="data" type="hidden" value="<?php echo date ('j/m/Y'); ?>" ></td>
    <td width="33%" class="celulatab">&nbsp;</td>
    <td width="31%" align="center" class="celulatab">&nbsp;</td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Categoria:*</strong></td>
    <td height="30" colspan="3"><span id="spryselect1">
      <select name="categoria" id="categoria" class="todoInput">
        <option>Selecione uma op&ccedil;&atilde;o</option>
        <?php $menus->criaMenu(); ?>
      </select>
      <span class="selectRequiredMsg">Selecione um item</span></span>
      <div id="blocoSub">
      <select name="subcategoria" id="subcategoria" class="todoInput">
       <option value="0" disabled="disabled">Escolha uma Categoria</option>
      </select>
      </div>
</td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Titulo da Not&iacute;cia:*</strong></td>
    <td height="30" colspan="3"><span id="sprytextfield1">
      <input name="titulo" type="text" id="titulo" size="60" class="todoInput"/>
      <span class="textfieldRequiredMsg">Digite o T&iacute;tulo.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Metas-tag:</strong></td>
    <td height="30" colspan="3" valign="middle"><textarea name="metas" cols="100" rows="2" class="todaArea" id="metas"></textarea></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Lead:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span id="sprytextarea1">
    <textarea name="lead" cols="100" rows="3" class="todaArea" id="lead"></textarea>
<span class="textareaRequiredMsg">Digite um texto para chamada na home do site.</span><span class="textareaMaxCharsMsg">Número máximo de caracteres excedido.</span></span><br />
      caracteres:<b id="cont_lead"></b>
      
      <p>No m&aacute;ximo 400 caracteres    </p></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Foto:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Exibir Foto na not&iacute;cia:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span id="spryradio1">
      <label>
        <input type="radio" name="fotoNot" value="1" id="tipo" />
        sim</label>
      <label>
        <input type="radio" name="fotoNot" value="0" id="tipo" />
        n&atilde;o</label>

      <span class="radioRequiredMsg">Escolha uma Op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Legenda para foto:</strong></td>
    <td height="30" colspan="3" valign="middle"><textarea name="legenda" cols="100" rows="3" class="todaArea" id="legenda"></textarea>
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
    <input type="text" id="data" name="data" class="inputData" />
    <span class="textfieldRequiredMsg">Escolha uma data.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Status:*</strong></td>
    <td height="30" colspan="3"><span id="spryselect4"><span id="spryselect2">
      <select name="status" id="status" class="todoInput">
        <option selected="selected">Selecione uma op&ccedil;&atilde;o</option>
        <option value="publicar">publicar</option>
        <option value="arquivar">arquivar</option>
        <option value="aguardando libera&ccedil;&atilde;o">aguardando libera&ccedil;&atilde;o</option>
      </select>
      <span class="selectRequiredMsg">Selecione um item.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Tipo:*</strong></td>
    <td height="30" colspan="3"><span id="spryradio2">
      <label>
        <input type="radio" name="tipo" value="P&uacute;blico" id="tipo" />
        P&uacute;blico</label>
      <label>
        <input type="radio" name="tipo" value="Restrito" id="tipo" />
        Restrito</label>

      <span class="radioRequiredMsg">Escolha uma Op&ccedil;&atilde;o.</span></span>
      </td>
  </tr>
  
  <tr class="celulatab">
    <td height="30" colspan="4"><div id="bloco2">
      <h3>Not&iacute;cia:</h3>
        <p class="legenda">Digite a mat&eacute;ria no campo.</p>
      <textarea  name="texto" cols="95" ></textarea><script type="text/javascript">
  CKEDITOR.replace('texto');
</script></div></td>
  </tr>
   <tr>
    <td height="30" colspan="4" align="center"><input type="submit" name="executar" id="executar" value="CADASTRAR" class="btenviar2" />
<input name="txtlocal" type="hidden" id="txtlocal" value="formCadNoticias" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:400});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
</script>
