<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesHorarios.php");

$cad = new funcoesHorarios();
$cad->geraMenu();

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	include_once("paginas/carregando.php");

	$cad->cadastrarHorarios();
	$msg = $cad->getStatus();
	
	if(empty($erro)){
		$erro = $msg;		
	}else{
    $erro = "Erro na função!";
  }
}
?>
<form action="" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Hor&aacute;rios</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td width="15%" height="30"><strong>Usu&aacute;rio:</strong></td>
    <td ><strong><?php echo $sid->getNode('NOME') ;?></strong></td>
    </tr>
  <tr>
    <td height="30"><strong>Modalidade:</strong></td>
    <td height="30" colspan="3"><span id="spryselect1">
      <select name="lutas" id="lutas" class="todoInput">
        <option>Selecione uma op&ccedil;&atilde;o</option>
        <?php $cad->geraMenu(); ?>
      </select>
      <span class="selectRequiredMsg">Favor Selecionar um item.</span></span></td>
  </tr>
  <tr>
    <td height="30"><strong>Dia da Semana:</strong></td>
    <td><span id="spryselect2">
        <select name="dia_sem" id="dia_sem" class="todoInput">
          <option>Selecione um dia da semana</option>
        <option value="Segunda">Segunda</option>
        <option value="Terça">Terça</option>
        <option value="Quarta">Quarta</option>
        <option value="Quinta">Quinta</option>
        <option value="Sexta">Sexta</option>
        <option value="Sábado">Sábado</option>
        <option value="Domingo">Domingo</option>
      </select>
      <span class="selectRequiredMsg">Selecione um dia da semana.</span></span></td>
  </tr>
  <tr>
    <td><strong>Hor&aacute;rio In&iacute;cio:</strong></td>
    <td><span id="sprytextfield1">
    <input type="text" name="horaIni" id="horaIni" class="inputHora"/>
    <span class="textfieldRequiredMsg">Digite a hora.</span><span class="textfieldInvalidFormatMsg">Formato inv&aacute;lido.</span></span></td>
  </tr>
  <tr>
    <td><strong>Hor&aacute;rio T&eacute;rmino:</strong></td>
    <td><span id="sprytextfield2">
    <input type="text" name="horaFim" id="horaFim" class="inputHora"/>
    <span class="textfieldRequiredMsg">Digite a hora.</span><span class="textfieldInvalidFormatMsg">Formato inv&aacute;lido.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "time", {useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "time", {useCharacterMasking:true});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>
