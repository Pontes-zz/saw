<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/config_var.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/geraMenus.php");
	$menus = new geraMenus();
	$menus->setTabela("menu");

include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/funcoesNoticias.php");

if(isset($_POST['executar']) && $_POST['executar']=='ALTERAR'){
	include_once("paginas/carregando.php");
	$cad = new funcoesNoticias();
	$cad->alterarCategoria();
	$msg = $cad->getStatus();
	
	if(empty($erro)){
		$erro = $msg;
				
	}
}

	$lista = new funcoesNoticias();
	$lista->setId($liberar->idEncontrado());
	$lista->geraNoticia();
?>
	<script language="javascript" type="text/javascript">
	$(function() {
		$( "#data" ).datepicker({
			showOn: "button",
			buttonImage: "imagens/iconecalendar.png",
			buttonImageOnly: true
		});
		
	});
	</script>
<script type="text/javascript">
	$(document).ready(function() {  
			$("select[name=categoria]").change(function(){
				
				$("select[name=subcategoria]").html('<option value="0">Carregando...</option>');
				
				$.post("../classes/pesqMenu.php",
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

  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
    <td height="30" colspan="4">Cadastrar</td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" class="celulatab"><h3><?php echo $erro;?></h3></td>
    </tr>

  <tr class="celulatab">
    <td height="30" colspan="4"><a href="<?php echo urlPrincipal;?>formAltNoticias/<?php echo $liberar->idEncontrado();?>"class="button">VOLTAR</a></td>
  </tr>
  <tr class="celulatab">
    <td height="30" colspan="4"><strong>Altera&ccedil;&atilde;o da Categoria da not&iacute;cia: <?php echo $lista->getTitulo();?></strong></td>
    </tr>
  <tr class="celulatab">
    <td height="30"><strong>Categoria Atual:</strong><input name="id" type="hidden" id="id" value="<?php echo $lista->getId(); ?>" /> </td>
    <td height="30" colspan="3"><strong>
	<?php echo $lista->getCategoria();
			$subCat = $lista->getSubCategoria();
			if(!empty($subCat)){
				echo " / $subCat";
			}
	?></strong></td>
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
     <td height="30" colspan="4" align="center"><input type="submit" name="executar" id="executar" value="ALTERAR" class="btenviar2" />
 </td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
