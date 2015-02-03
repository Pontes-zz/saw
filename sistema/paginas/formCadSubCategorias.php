<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesCategorias.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraMenus.php");
  $menus = new geraMenus();
  $menus->setTabela("menu");


if(isset($_POST['executar']) && $_POST['executar']=='CADASTRAR'){
  $cad = new funcoesCategorias();
  $cad->cadastrarSub();
  $msg = $cad->getStatus();
  $erro = $cad->getErrorMsg();
  
  if(empty($erro)){
    $erro = $msg;   
  }
  include_once("paginas/carregando.php");
}
?>

<form action="" method="post" enctype="multipart/form-data" name="cadMenu" id="cadMenu">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td colspan="2" >Cadastrar Categorias</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" ><h3><?php echo $erro ;?></h3></td>
    </tr>
  <tr>
    <td><strong>Categoria Principal:</strong></td>
    <td><select name="categoria" id="categoria" class="todoInput">
        <option>Selecione uma op&ccedil;&atilde;o</option>
        <?php $menus->geraSubMenu(); ?>
      </select></td>
  </tr>
  <tr>
    <td width="20%"><strong>Texto:</strong></td>
    <td width="80%"><input type="text" name="texto" id="texto" class="todoInput" /></td>
  </tr>
   <tr>
    <td><strong>Agrupar Categoria:</strong></td>
    <td><span id="spryradio2">
      <label>
        <input type="radio" name="submenu" value="1" id="submenu" />
        Sim</label>
      <label>
        <input type="radio" name="submenu" value="0" id="submenu" />
        N&atilde;o</label>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>

  <tr>
    <td><strong>Colunas:</strong></td>
    <td><span id="spryradio2">
      <label>
        <input type="radio" name="colunas" value="1" id="colunas" />
        1</label>
      <label>
        <input type="radio" name="colunas" value="2" id="colunas" />
        2</label>
        <label>
        <input type="radio" name="colunas" value="3" id="colunas" />
        3</label>
        <label>
        <input type="radio" name="colunas" value="4" id="colunas" />
        4</label>
        
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  
  <tr>
    <td><strong>Tipo de P&aacute;gina:</strong></td>
    <td><span id="spryradio4">
      <label>
        <input type="radio" name="tipo" value="0" id="tipo" />
        Not&iacute;cias</label>
      <label>
        <input type="radio" name="tipo" value="1" id="tipo" />
        Galeria de Fotos</label>
      <label>
        <input type="radio" name="tipo" value="2" id="tipo" />
        V&iacute;deos</label>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td><strong>Formato de P&aacute;gina:</strong></td>
    <td><span id="spryradio5">
      <label>
        <input type="radio" name="formato" value="0" id="formato" />
        P&aacute;gina simples</label>
        
      <label>
        <input type="radio" name="formato" value="2" id="formato" />
        Lista e Exibi&ccedil;&atilde;o</label>
      
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td><strong>Incluir Conte&uacute;do Lateral:</strong></td>
    <td><span id="spryradio6">
      <label>
        <input type="radio" name="lateral" value="1" id="arq" />
        Sim</label>
      <label>
        <input type="radio" name="lateral" value="0" id="arq" />
        N&atilde;o</label>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="CADASTRAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>
<script type="text/javascript">
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
var spryradio3 = new Spry.Widget.ValidationRadio("spryradio3");
var spryradio4 = new Spry.Widget.ValidationRadio("spryradio4");
var spryradio5 = new Spry.Widget.ValidationRadio("spryradio5");
var spryradio6 = new Spry.Widget.ValidationRadio("spryradio6");
</script>