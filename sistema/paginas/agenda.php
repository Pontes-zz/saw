<?php
	
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/agendaManutencao.php");
$listagem = new agendaManutencao();
$listagem->setNumPagina($liberar->idEncontrado());
$listagem->setUrl(urlPrincipal."banner/");
?>

<script type="text/javascript" language="javascript">
		
		$('.excluir').live('click',function(){
        var id = $(this).attr('id');
        var msg  = '<ul class="dialog_delete">';
        msg += '<br><h3>Voc&ecirc; esta prestes a remover este item da Agenda!</h3>';
        msg += '<br><p>Deseja realmente prosseguir?</p>';
        msg += '</ul>'
        $('body').append('<div id="dialog"  class="dialogr" title="Remover Agenda">'+msg+'</div>');
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
                    window.location = "paginas/excluirAgenda.php?id="+id;
                }		
            }
        })
        return false;
    })
	</script>
<div id="total">
	
	<table width="960" border="0" cellspacing="0" cellpadding="0" class="tabela">
	  <tr>
	    <td><a href="<?php echo urlPrincipal;?>formCadAgenda" class="button">CADASTRAR</a></td>
	    <td>&nbsp;</td>
      </tr>
  </table>
  <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td width="62" height="30">ID</td>
      <td width="106">Evento</td>
      <td width="106">Data</td>
      <td width="128">A&ccedil;&atilde;o</td>
    </tr>
   <?php $listagem->geraLista(); ?> 
    
  </table>
  <?php $listagem->geraNumeros(); ?> 
  </div>