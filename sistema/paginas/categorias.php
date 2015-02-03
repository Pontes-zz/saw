<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/categoriasManutencao.php");
$listagem = new noticiasManutencao();
$listagem->setNumPagina($_GET["pg"]);
$listagem->setUrl(urlPrincipal."categorias/");
$listagem->setCampoPesquisa($_GET["txtbusca"]);
?>
<script type="text/javascript" language="javascript">
		function excluir(id){
			if(confirm("Deseja realmente excluir este item?")){
				document.location = "<?php echo urlPrincipal;?>paginas/excluirNoticias.php?id="+id;				
			}
		}
	</script>
<div id="total">
  <table width="960" border="0" cellspacing="0" cellpadding="0" class="tabela">
    <tr>
      <td width="15%"><a href="<?php echo urlPrincipal;?>formCadNoticias" class="button">CADASTRAR</a></td>
      <td width="39%">&nbsp;</td>
      <td width="46%"><?php include "formpesquisar.php"; ?></td>
    </tr>
  </table>
 <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td width="10%">Foto</td>
      <td width="23%" height="30">Not&iacute;cias</td>
      <td width="11%">Categorias / subcategoria</td>
      <td width="8%">Usu&aacute;rio</td>
      <td width="8%">Conte&uacute;do</td>
      <td width="9%">Status</td>
      <td width="6%">Data</td>
      <td width="25%">A&ccedil;&otilde;es</td>
    </tr>
   <?php $listagem->geraListaNoticias(); ?> 
   </table>
   <?php $listagem->geraNumeros(); ?>
   </div>