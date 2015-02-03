<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/listaManutencao.php");
$listagem = new listaManutencao();
$listagem->setNumPagina($liberar->idEncontrado());
$listagem->setUrl(urlPrincipal."categoriaFotos");
?>
   <script type="text/javascript" language="javascript">
		function excluir(id){
			if(confirm("Deseja realmente excluir este item?")){
				document.location = "funcoes/excluir.php?local=categoriaFotos&id="+id;				
			}
		}
   </script>
<div id="total"><a href="<?php echo urlPrincipal;?>formCadCategoria" class="button">INCLUIR CATEGORIA</a>
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td height="30">C&oacute;digo</td>
      <td>Categoria</td>
      <td>A&ccedil;&atilde;o</td>
    </tr>
   <?php $listagem->geraCatFotos(); ?> 
</table>
<?php $listagem->geraNumeros(); ?> 
  </div>