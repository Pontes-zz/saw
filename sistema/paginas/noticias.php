<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/noticiasManutencao.php");
$listagem = new noticiasManutencao();
$listagem->setNumPagina($liberar->idEncontrado());
$listagem->setUrl(urlPrincipal."noticias/");
$listagem->setCampoPesquisa($_POST["txtbusca"]);
?>
<script type="text/javascript" language="javascript">
		
		$('.excluir').live('click',function(){
        var id = $(this).attr('id');
        var msg  = '<ul class="dialog_delete">';
        msg += '<br><h3>Voc&ecirc; esta prestes a remover a galeria e suas fotos!</h3>';
        msg += '<br><p>Deseja realmente prosseguir?</p>';
        msg += '</ul>'
        $('body').append('<div id="dialog"  class="dialogr" title="Remover Galeria">'+msg+'</div>');
        $( "#dialog" ).dialog({
            modal: true,
            open: function(event, ui) { 
                $(this).parent().children().children('.ui-dialog-titlebar-close').hide();
            },	 	    
            width: 460,
            height: 200,
            buttons: {
                "Cancelar": function() {
                    $(this).dialog("close");
                    $("#dialog").remove();
                },
                "Prosseguir": function() {
                    window.location = "<?php echo urlPrincipal;?>paginas/excluirNoticias.php?id="+id;
                }		
            }
        })
        return false;
    })
	</script>
<div id="total">
  <div id="blocoOpcoes">
    <div id="blocoBotoes"><a href="<?php echo urlPrincipal;?>formCadNoticias" class="button">CADASTRAR</a></div>
      
      <div id="blocoPesquisa"><?php include "formpesquisar.php"; ?></div>
  </div>

  <div id="blocoTable">
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
   </div>