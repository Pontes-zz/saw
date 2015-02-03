<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesUsers.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
	$cad = new funcoesUsers();
	$cad->alterar();
	$msg = $cad->getStatus();
	include_once("../paginas/carregando.php");
	if(empty($erro)){
		$erro = $msg;		
	}
}

	$lista = new funcoesUsers();
	$lista->setId($liberar->idEncontrado());
	$lista->geraUsuario();
?>

<div id="total">
<form action="" method="post" enctype="multipart/form-data" name="cadNoticia" id="cadNoticia">

  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td height="30" colspan="4">Cadastrar</td>
  </tr>
  <tr  class="celulatab">
    <td height="30" colspan="4" align="center" class="celulatab"><h3><?php echo $erro;?></h3></td>
    </tr>
  <tr class="celulatab">
    <td><span class="txtinfo">* Preenchimento Obrigat&oacute;rio</span></td>
    <td><div class="buttonPanel"><a href="<?php echo urlPrincipal;?>formAltSenha/<?php echo $lista->getId()?>">Alterar Senha</a></div></td>
    </tr>
   <tr class="celulatab">
    <td ><strong>*Login:</strong></td>
    <td ><strong><?php echo $lista->getLogin(); ?></strong></td>
  </tr>
  <tr class="celulatab">
    <td width="17%"><strong>*Nome do usu&aacute;rio:</strong></td>
    <td width="83%"><span id="sprytextfield1">
    <input name="nome" type="text" id="nome" size="60" value="<?php echo $lista->getNome(); ?>" class="todoInput"/>
    <span class="textfieldRequiredMsg">Preenchimento Obrigatório.</span><span class="textfieldMinCharsMsg">Deve haver pelo menos um caracter.</span></span></td>
    </tr>
  
  <tr  class="celulatab">
    <td ><strong>*Email:</strong></td>
    <td ><span id="sprytextfield3">
    <input name="email" type="text" id="email" size="60" value="<?php echo $lista->getEmail(); ?>" class="todoInput"/>
    <span class="textfieldRequiredMsg">Preenchimento Obrigatório.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></td>
  </tr>
  <tr class="celulatab">
    <td ><strong>*Status:</strong></td>
    <td ><p>
      <label><span id="spryradio1">
        <?php
	 		 
		$ativo = $lista->getAtivo();
		$numAtivo = array("1","0");
		
		foreach($numAtivo as $valorAtivo){
			echo "<label class=\"radioButton\"><input type=\"radio\" name=\"ativo\" id=\"ativo\" value=\"".$valorAtivo."\" ";
			if($ativo == $valorAtivo){
				echo " checked='checked'";
			}
			echo " />";
			if($valorAtivo == 1){
				echo " Ativo";
			}else{
				echo " Inativo";
		}
			echo "</label>";
		}
		?>
        <span class="radioRequiredMsg">Escolha uma Opção.</span></span></label>
      <br />
      </p></td>
  </tr>
  <tr class="celulatab">
    <td  colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="ALTERAR" class="btenviar2"/>
      <input name="txtlocal" type="hidden" id="txtlocal" value="formAltUsuario" />
      <input name="id" type="hidden" id="id" value="<?php echo $lista->getId(); ?>" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:1});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {useCharacterMasking:true});
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
</script>
