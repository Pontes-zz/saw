<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesUsers.php");

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	$cad = new funcoesUsers();
	$cad->cadastrar();
	$msg = $cad->getStatus();

	include_once("paginas/carregando.php");
	if(empty($erro)){
		$erro = $msg;		
	}
}
?>

<div id="total">
<form action="" method="post" enctype="multipart/form-data" name="cad_users" id="cad_users">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Banner</td>
  </tr>
  <tr class="celulatab">
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td height="30" colspan="2" class="celulatab"><span class="txtinfo">* Preenchimento Obrigat&oacute;rio</span></td>
    </tr>
  <tr>
    <td width="13%" height="30" class="celulatab"><strong>*Nome do usu&aacute;rio:</strong></td>
    <td width="87%" height="30" class="celulatab"><span id="sprytextfield1">
    <input name="nome" type="text" id="nome" size="60" class="todoInput"/>
    <span class="textfieldRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="textfieldMinCharsMsg">Deve haver pelo menos um caracter.</span></span></td>
    </tr>
  <tr class="celulatab">
    <td height="30"><strong>*Login:</strong></td>
    <td height="30"><span id="sprytextfield2">
    <input name="login" type="text" id="login" size="60" class="todoInput"/>
    <span class="textfieldRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="textfieldMinCharsMsg">Deve haver pelo menos um caracter.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>*Email:</strong></td>
    <td height="30"><span id="sprytextfield3">
    <input name="email" type="text" id="email" size="60" class="todoInput"/>
    <span class="textfieldRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>*Senha:<br />
    </strong></td>
    <td height="30"><span id="sprypassword1">
    <input name="senha" type="password" id="senha" size="30" class="todoInput"/>
    <span class="passwordRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="passwordMinCharsMsg">Deve ter pelo menos 8 caracteres.</span><span class="passwordMaxCharsMsg">O limite é de 16 caracteres.</span></span><br />
    <strong><span class="txtinfo">deve possuir de 8 a 16 caracteres </span></strong></td>
  </tr>
  <tr class="celulatab">
    <td height="30"><strong>*Status:</strong></td>
    <td height="30"><p>
      <label><span id="spryradio1">
        <input name="ativo" type="radio" id="ativo" value="1" checked="checked" />
Ativo<br />
<input type="radio" name="ativo" value="0" id="ativo" />
Inativo<br />
<span class="radioRequiredMsg">Escolha uma Op&ccedil;&atilde;o.</span></span></label>
      <br />
    </p></td>
  </tr>
  <tr  class="celulatab">
    <td height="30" colspan="2" align="center"><input type="submit" name="executar" id="executar" value="CADASTRAR" class="btenviar2" />
      <input name="txtlocal" type="hidden" id="txtlocal" value="formCadUsuario" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:1});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {minChars:1});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {useCharacterMasking:true});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:8, maxChars:16});
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
</script>
