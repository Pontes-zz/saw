<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/userManutencao.php");
$listagem = new userManutencao();
$listagem->setNumPagina($liberar->idEncontrado());
$listagem->setUrl(urlPrincipal."usuarios/");

?>
<script type="text/javascript" language="javascript">
		$('.excluir').live('click',function(){
        var id = $(this).attr('id');
        var msg  = '<ul class="dialog_delete">';
        msg += '<br><h3>Voc&ecirc; esta prestes a remover este usu&aacute;rio!</h3>';
        msg += '<br><p>Deseja realmente prosseguir?</p>';
        msg += '</ul>'
        $('body').append('<div id="dialog"  class="dialogr" title="Remover Usu&aacute;rio">'+msg+'</div>');
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
                    window.location = "paginas/excluirUsuario.php?id="+id;
                }		
            }
        })
        return false;
    })
	</script>
<div id="total">
<table width="960" border="0" cellspacing="0" cellpadding="0" class="tabela">
	  <tr>
	    <td><a href="<?php echo urlPrincipal;?>formCadUsuario" class="button">CADASTRAR</a></td>
	    <td>&nbsp;</td>
      </tr>
  </table>

  <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td width="22%">Usu&aacute;rio</td>
      <td width="21%">Login</td>
      <td width="22%">Email</td>
      <td width="11%">Status</td>
    
      <td width="24%">Verificar</td>
    </tr>
   <?php $listagem->geraListaUsuarios(); ?> 
   
  </table>
  <?php $listagem->geraNumeros(); ?>
  </div>