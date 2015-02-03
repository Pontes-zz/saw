<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/menuManutencao.php");
$listagem = new menuManutencao();
$listagem->setNumPagina($_GET["pg"]);
$listagem->setUrl(urlPrincipal."menus/");
?>
<script type="text/javascript" language="javascript" charset="utf-8">
		var texto = "<?php echo utf8_encode("A Exclusão dessa categoria irá remover todos os arquivos relacionados a ele! Deseja realmente excluir este item?"); ?>";
		function excluir(id,t){
			if(confirm(texto)){
				document.location = "paginas/excluirCategorias.php?id="+id;				
			}
		}
</script>
<div id="total">
 <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td width="48%">Menu</td>
      <td width="22%" height="30">categoria</td>
      <td width="30%">A&ccedil;&otilde;es</td>
    </tr>
   <?php $listagem->geraListaMenu(); ?> 
   </table>
   <?php $listagem->geraNumeros(); ?>
</div>