<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesVideos.php");

$cad = new funcoesVideos();

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	
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
		$("#bloco1").hide();
		$("#bloco2").hide();

        $("input[id=arqtipo]").bind("click", function(){               
                if($("input[id=arqtipo]:checked").val() == "arquivo") {
					
					$("#bloco1")
                    .hide()
                    .show("slow");
					$("#bloco2")
					.hide("Slow");
					
                        $("#filme").attr({readonly: false});
                } else {
					
					$("#bloco2")
                    .hide()
                    .show("slow");
					$("#bloco1")
					.hide("Slow");
					
                        $("#youtube").attr({readonly: false});
                }
        });     
});
</script>
<script type="text/javascript">
$(document).ready(function() {  
		$("#bloco3").hide();
 $("input[id=vdhome]").bind("click", function(){               
                if($("input[id=vdhome]:checked").val() == "1") {
					$("#bloco3")
					.show("Slow");
                        $("#leadvd").attr({readonly: false});
                }else{
					$("#bloco3")
					.hide("Slow");
                        $("#leadvd").attr({readonly: false});
				};
 });
});
</script>

<div id="total">
<form action="" method="post" enctype="multipart/form-data" name="cadVideos" id="cadVideos">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td height="30" colspan="4">Cadastrar</td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" class="celulatab"><h3><?php echo $erro;?></h3></td>
    </tr>

  <tr class="celulatab">
    <td height="30"><strong>Titulo do V&iacute;deo:*</strong></td>
    <td height="30" colspan="3"><span id="sprytextfield1">
      <input name="titulo" type="text" id="titulo" size="60" class="todoInput">
      <span class="textfieldRequiredMsg">Favor preencher o campo</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Lead:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span id="sprytextfield3">
      <input name="lead" type="text" id="lead" size="60" class="todoInput"/>
      <span class="textfieldRequiredMsg">Preenchimento Obrigat&oacute;rio.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Metas-tag:</strong></td>
    <td height="30" colspan="3" valign="middle"><textarea name="metas" cols="100" rows="2" class="todaArea" id="metas"></textarea></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Data:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span id="sprytextfield2">
      <input type="text" id="data" name="data" class="inputData"/>
      <span class="textfieldRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Categoria:</strong></td>
    <td height="30" colspan="3"><span id="spryselect1">
      <select name="categoria" id="categoria" class="todoInput">
        <option>Selecione uma op&ccedil;&atilde;o</option>
        <?php $cad->geraMenuVideo(); ?>
      </select>
      <span class="selectRequiredMsg">Favor Selecionar um item.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Foto:*</strong></td>
    <td height="30" colspan="3" valign="middle"><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span></td>
  <tr class="celulatab">
    <td height="30"><strong>Status:</strong></td>
    <td height="30" colspan="3"><span id="spryselect2">
      <select name="status" id="status" class="todoInput">
        <option selected="selected">Selecione uma op&ccedil;&atilde;o</option>
        <option value="publicar">publicar</option>
        <option value="arquivar">arquivar</option>
        <option value="Aguardando Libera&ccedil;&atilde;o">Aguardando Libera&ccedil;&atilde;o</option>
        </select>
      <span class="selectRequiredMsg">Favor Selecionar um item.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Insira o c&oacute;digo:</strong></td>
    <td height="30" colspan="3"><p>
      <textarea name="video" cols="80" rows="3" class="todoInput" id="video"></textarea>
      <br />
      <span class="legenda">ao inserir o c&oacute;digo personalize colocando a largura <?php echo largVideo ;?>px de largura</span></p></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>Tipo:*</strong></td>
    <td height="30" colspan="3"><span id="spryradio1">
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
    <td height="30"><strong>Sinospse:</strong></td>
    <td height="30" colspan="3">&nbsp;</td>
  </tr>
  
  <tr class="celulatab">
    <td height="30" colspan="4"><textarea  name="texto" cols="95" ></textarea><script type="text/javascript">
	CKEDITOR.replace('texto');
</script></td>
  </tr>
  <tr class="celulatab">
    <td height="30" colspan="4" align="center"><input type="submit" name="executar" id="executar" value="CADASTRAR" class="btenviar2" />
<input name="txtlocal" type="hidden" id="txtlocal" value="formCadNoticias" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", useCharacterMasking:true, isRequired:true});
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
