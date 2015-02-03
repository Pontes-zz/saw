<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesPublicidade.php");

if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
	include_once("paginas/carregando.php");
  $cad = new funcoesPublicidade();
	$cad->cadastrar();
	$msg = $cad->getStatus();
	
	if(empty($erro)){
		$erro = $msg;		
	}else{
    $erro = "não executado a função!";
  }
}
?>

<form action="" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Publicidade</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td><strong>Tamanho:</strong></td>
    <td>
      <select name="tamanho" id="tamanho" class="todoInput">
       <option>Selecione um tamanho</option>
        <option value="630x120">630x120</option>
        <option value="300x100">300x100</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><strong>Link:</strong></td>
    <td><input type="text" name="link" id="link" class="todoInput"/></td>
  </tr>
  <tr>
    <td><strong>Foto:</strong></td>
    <td><span class="file-wrapper"><input name="img" type="file" id="img" />
<span class="button1">Escolha a Foto</span>
</span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>