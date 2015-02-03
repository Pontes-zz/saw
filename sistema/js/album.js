$(document).ready(function(){
    var confirmDelete = 0;
    $('#toUp').live('click',function(){
        $.scrollTo( $('#status-bar') , 1000);
    });
    $('#toDown').live('click',function(){
        $.scrollTo( $('#footer') , 1000);
    });
    $('#toBack').live('click',function(){
        window.location = $(this).attr('url');
    });   
    $('#toUpdate').live('click',function(){
        $('#f-update').submit()
    });  
    
    $('.updateAlbumName').live('click',function(){
        var album_id = $('.album_name').attr('id');
        var album_name = $.trim( $('.album_name').val() );
        $.post('../../paginas/actions.php?action=updateAlbumName',
        {
            album_name:album_name,
            album_id:album_id
        },
        function(data){
            notify('<h3>'+data+'</h3>');
        })
        
        $('.refresh').click();
    })
    
    $('.foto_captions').live('change',function(){
        var foto_id = $(this).attr('id');
        var foto_caption = $(this).val();
        
        $.post('../../paginas/actions.php?action=updateFotoName',
        {
            foto_caption:foto_caption,
            foto_id:foto_id
        },
        function(data){
            notify('<h3>'+data+'</h3>');
            $('#'+foto_id).attr('title',$('#'+foto_id).val());
            $('#'+foto_id).hideTip();
            $('#'+foto_id).showTip();
            $('#'+foto_id).refreshTip();
        })
    })
    
    $('.refresh').live('click',function(){
        
        var foto_id  = "f_" + $(this).attr('id') ;
        var foto_caption = $("#"+foto_id).val();
        var foto_info = $("#i"+foto_id).val();

        $.post('../../paginas/actions.php?action=updateFotoName',
        {
            foto_caption:foto_caption,
            foto_info:foto_info,
            foto_id:foto_id
        },
        function(data){
            notify('<h3>'+data+'</h3>');
            //$('#'+foto_id).attr('title',$('#'+foto_id).val());
            //$('#'+foto_id).hideTip();
            //$('#'+foto_id).showTip();
            //$('#'+foto_id).refreshTip();
        })
        
    })
    
    $('.cover').live('click',function(){
        var foto_id = $(this).attr('id');
        var foto_album = $(this).attr('album');
        
        $.post('../../paginas/actions.php?action=updateFotoCover',
        {
            foto_album:foto_album,
            foto_id:foto_id
        },
        function(data){
            notify('<h3>'+data+'</h3>');
        })
    })
    
    $('.deleteAlbum').live('click',function(){
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
                    window.location = 'album/delete/'+id;
                }		
            }
        })
        return false;
    })
    
    
    /*Sorter Foto*/
    $( ".sortable" ).sortable({
        cursor: 'crosshair',
        helper: "clone",
        opacity: 0.6,
        update:function(event, ui){
            var order = $(this).sortable('serialize')
            var url = "../../paginas/actions.php?action=updateVideoPos"
            $.post(url,{
                item: order
            },function(data){
                var arr = Array;
                arr = ["Muito bom!", "Demais!", "Ficou legal!", "Super!", "Agora está bonito!","Continue assim!"];
                msg  = arr[Math.floor(Math.random()*arr.length)];
                notify('<h3>Posi&ccedil;&atilde;o Atualizada<br> '+msg+'</h3>');
            })
        }
    })
    

$('.delete').live('click',function(){
        var foto_id = $(this).attr('id');
        
        if(confirmDelete  != 1)
        {
            var msg  = '<ul class="dialog_delete">';
            msg += '<br><h3>A foto ser&aacute; removida da galeria!</h3>';
            msg += '<br><p>Deseja realmente prosseguir?</p>';
            msg += '</ul>'
            $('body').append('<div id="dialog"  class="dialogr" title="Remover Foto">'+msg+'</div>');
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
                        $.post('../../paginas/actions.php?action=deleteFoto',
                        {
                            foto_id:foto_id
                        },
                        function(data){
                            $('#item_'+foto_id).remove();
                            notify('<h3>'+data+'</h3>');
                                                  
                            if(confirmDelete == 0)
                            {
                                var msg  = '<ul class="dialog_delete">';
                                msg += '<br><p>Deseja exibir a confirma&ccedil;&atilde;o de exclus&atilde;o na pr&oacute;xima <br> foto que remover desta galeria?</p>';
                                msg += '</ul>'
                                $('body').append('<div id="dialog"  class="dialogr" title="Confirma&ccedil;&atilde;o de Exclus&atilde;o">'+msg+'</div>');
                                $( "#dialog" ).dialog({
                                    modal: true,
                                    open: function(event, ui) { 
                                        $(this).parent().children().children('.ui-dialog-titlebar-close').hide();
                                    },	 	    
                                    width: 460,
                                    height: 200,
                                    buttons: {
                                        "N\u00E3o": function() {
                                            confirmDelete = 1;
                                            $(this).dialog("close");
                                            $("#dialog").remove();
                                        },
                                        "Sim": function() {
                                            confirmDelete = 2;
                                            $(this).dialog("close");
                                            $("#dialog").remove();
                                        }		
                                    }
                                }) 
                            }
    
                        })
						$(this).dialog("close");
                            $("#dialog").remove();  
                    }		
                }
            })
        }
        else
        {
            $.post('../../paginas/actions.php?action=deleteFoto',
            {
                foto_id:foto_id
            },
            function(data){
                $('#item_'+foto_id).remove();
                notify('<h3>'+data+'</h3>');                     
            })
			$(this).dialog("close");
            $("#dialog").remove();                  
        }
    })    
})