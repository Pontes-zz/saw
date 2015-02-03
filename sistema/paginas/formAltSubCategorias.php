<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/funcoes/tratardata.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/removeacentos.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesCategorias.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraMenus.php");
	$menus = new geraMenus();
	$menus->setTabela("menu");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
  include_once("paginas/carregando.php");

  $alt = new funcoesCategorias();
 
	$alt->setTabela("menu");
	$alt->alterarSub();
	$msg = $alt->getStatus();
	
	if(empty($erro)){
		$erro = $msg;		
	}
	
}
$lista = new funcoesCategorias();
$lista->setTabela("menu");
$lista->setId($liberar->idEncontrado());
$lista->geraSubCategoria();
	
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
    <td><input name="catAntiga" type="hidden" id="catAntiga" value="<?php echo $lista->getSubId(); ?>" />
      <select name="categoria" id="categoria" class="todoInput">
        <?php 
			$sId = $lista->getSubId();
			$menus->geraSubMenu($sId); 
		?>
      </select></td>
  </tr>
  <tr>
    <td width="20%"><strong>Texto:</strong></td>
    <td width="80%"><input name="id" type="hidden" id="id" value="<?php echo $lista->getId(); ?>" />
    <input name="subCatAntiga" type="hidden" id="subCatAntiga" value="<?php echo $lista->getUrlSeo(); ?>" />
    <input name="subId" type="hidden" id="subId" value="<?php echo $lista->getSubId(); ?>" />
    <input name="textoSubCat" type="hidden" id="textoSubCat" value="<?php echo $lista->getUrlSeo(); ?>" />
    <input type="text" name="texto" id="texto" class="todoInput" value="<?php echo $lista->getTexto();?>"/></td>
  </tr>
 <tr>
    <td><strong>Agrupar Categoria:</strong></td>
    <td><span id="spryradio2">
      <?php 
		$subM = $lista->getSubMenu();
		$subMTxt = array("N&atilde;o", "Sim");
			foreach($subMTxt as $bt=>$v){
				echo '<label><input type="radio" name="submenu" id="submenu" value="';
					echo $bt.'"';
						if($bt == $subM){
							echo " checked ";
						}
					echo '/> '. $v.'</label>';
			}
	?>
      
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td><strong>Colunas:</strong></td>
    <td><span id="spryradio2">
      <?php
    $colunas = $lista->getColunas();
    $colunasTxt = array("1", "2", "3", "4");
      foreach($colunasTxt as $bt1=>$v1){
        echo '<label><input type="radio" name="colunas" id="colunas" value="';
          echo $v1.'"';
            if($v1 == $colunas){
              echo " checked ";
            }
          echo '/> '. $v1.'</label>';
      }
  ?>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td><strong>Tipo de P&aacute;gina:</strong></td>
    <td><span id="spryradio4">
    <?php
		$tipo = $lista->getTipo();
		$tipoTxt = array("Not&iacute;cias", "Galeria de Fotos", "V&iacute;deos");
			foreach($tipoTxt as $bt=>$v){
				echo '<label><input type="radio" name="tipo" id="tipo" value="';
					echo $bt.'"';
						if($bt == $tipo){
							echo " checked ";
						}
					echo '/> '. $v.'</label>';
			}
	?>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td><strong>Formato de P&aacute;gina:</strong></td>
    <td><span id="spryradio5">
    <?php
		$formato = $lista->getFormato();
		$formatoTxt = array("P&aacute;gina simples", "Lista e Exibi&ccedil;&atilde;o");
			foreach($formatoTxt as $bt=>$v){
				echo '<label><input type="radio" name="formato" id="formato" value="';
					echo $bt.'"';
						if($bt == $formato){
							echo " checked ";
						}
					echo '/> '. $v.'</label>';
			}
	?>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td><strong>Incluir Conte&uacute;do Lateral:</strong></td>
    <td><span id="spryradio6">
    <?php
		$lateral = $lista->getLateral();
		$lateralTxt = array("N&atilde;o", "Sim");
			foreach($lateralTxt as $bt=>$v){
				echo '<label><input type="radio" name="lateral" id="lateral" value="';
					echo $bt.'"';
						if($bt == $lateral){
							echo " checked ";
						}
					echo '/> '. $v.'</label>';
			}
	?>
      <span class="radioRequiredMsg">Selecione uma op&ccedil;&atilde;o.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="executar" id="executar"  value="ALTERAR" class="btenviar2"/>
      </td>
</tr>
</table>
</form>
<script type="text/javascript">
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
var spryradio3 = new Spry.Widget.ValidationRadio("spryradio3");
var spryradio4 = new Spry.Widget.ValidationRadio("spryradio4");
var spryradio4 = new Spry.Widget.ValidationRadio("spryradio5");
var spryradio6 = new Spry.Widget.ValidationRadio("spryradio6");
</script>