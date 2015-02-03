<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/videosManutencao.php");
$listagem = new videosManutencao();
$listagem->setNumPagina($liberar->idEncontrado());
$listagem->setUrl(urlPrincipal."videos/");
$listagem->setCampoPesquisa($_GET["txtbusca"]);
?>
	<script src="js/jquery.alerts.js"></script>
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
                    window.location = "<?php echo urlPrincipal ;?>paginas/excluirVideos.php?id="+id;
                }		
            }
        })
        return false;
    })
		
		
	</script>
 
<div id="total">
  <div id="blocoOpcoes">
    <div id="blocoBotoes"><a href="<?php echo urlPrincipal;?>formCadVideos" class="button">CADASTRAR</a></div>

  </div>

  <div id="blocoTable">
  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td width="10%">V&iacute;deo</td>
      <td width="17%">T&iacute;tulo do v&iacute;deo</td>
      <td width="27%">categoria</td>
      <td width="5%">Data</td>
      <td width="9%">Status</td>
      <td width="17%">A&ccedil;&atilde;o</td>
    </tr>
   <?php $listagem->geraLista(); ?>   
  </table>
  <?php $listagem->geraNumeros(); ?> 
</div>
  </div>