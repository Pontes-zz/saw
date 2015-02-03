<?php
	
include_once($_SERVER['DOCUMENT_ROOT']."/sistema/classes/publicidadeManutencao.php");
$listagem = new listaManutencao();
$listagem->setNumPagina($liberar->idEncontrado());
$listagem->setUrl(urlPrincipal."publicidade/");
?>

<script type="text/javascript" language="javascript">
		
		$('.excluir').live('click',function(){
        var id = $(this).attr('id');
        var msg  = '<ul class="dialog_delete">';
        msg += '<br><h3>Voc&ecirc; esta prestes a remover a publicidade!</h3>';
        msg += '<br><p>Deseja realmente prosseguir?</p>';
        msg += '</ul>'
        $('body').append('<div id="dialog"  class="dialogr" title="Remover Publicidade">'+msg+'</div>');
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
                    window.location = "<?php echo urlPrincipal ;?>paginas/excluirPublicidade.php?id="+id;
                }		
            }
        })
        return false;
    })
	</script>
<div id="total">
	<div id="blocoOpcoes">
    <div id="blocoBotoes"><a href="<?php echo urlPrincipal;?>formCadPublicidade" class="button">CADASTRAR</a></div>
  </div>
<div id="blocoTable">
    <table width="100%" border="1" cellspacing="1" cellpadding="3" class="tabela">
    <tr class="tittab">
      <td width="62" height="30">Foto</td>
      <td width="106">Tamanho</td>
      <td width="106">Link</td>
      <td width="128">A&ccedil;&atilde;o</td>
    </tr>
   <?php $listagem->geraLista(); ?> 
    
  </table>
  <?php $listagem->geraNumeros(); ?> 
</div>
  </div>