<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesUsers.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
	$cad = new funcoesUsers();
	$cad->alterarSenha();
	$msg = $cad->getStatus();

	include_once("paginas/carregando.php");
	if(empty($erro)){
		$erro = $msg;	
		echo '<meta http-equiv="refresh" content="5;URL='. urlPrincipal .'formAltUsuario/'. $breadCrumb['1'] .'" />';
	
	}
}
?>

<script src="<?php echo urlSite;?>SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="<?php echo urlSite;?>SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="<?php echo urlSite;?>SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<script src="<?php echo urlSite;?>SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>

<div id="total">
<form action="" method="post" enctype="multipart/form-data" name="alterasenha" id="alterarsenha">
 <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
        <td colspan="2">Alterar Senha</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h3><?php echo $erro ;?></h3></td>
  </tr>
  <tr>
    <td width="13%"><strong>*Senha:<br />
      </strong></td>
    <td width="87%"><span id="sprypassword1">
      <input name="senha" type="password" id="senha" size="30" class="todoInput" />
      <span class="passwordRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="passwordMinCharsMsg">Deve ter pelo menos 8 caracteres.</span><span class="passwordMaxCharsMsg">O limite é de 16 caracteres.</span></span><br />
      <em>A Senha deve possuir de 8 a 16 caracteres.</em></td>
  </tr>
  <tr>
    <td><strong>*Confirmar Senha:</strong></td>
    <td><span id="spryconfirm1">
      <input name="senha1" type="password" id="senha1" size="30" class="todoInput"/>
      <span class="confirmRequiredMsg">Preenchimento Obrigat&oacute;rio.</span><span class="confirmInvalidMsg">As Senhas n&atilde;o s&atilde;o iguais!.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="ALTERAR" class="btenviar2"/>
      <input name="txtlocal" type="hidden" id="txtlocal" value="formAltSenha" />
      <input name="id" type="hidden" id="id" value="<?php  echo $breadCrumb['1']; ?>"></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:8, maxChars:16});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "senha");
</script>
