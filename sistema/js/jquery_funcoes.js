$(function() { 

	if($("input[id=arqtipo]:checked").val() == "arquivo") {
		$("#bloco1").show();
		$("#bloco2").hide();
		
	}else{
		$("#bloco2").show();
		$("#bloco1").hide();
	};

        $("input[id=arqtipo]").bind("click", function(){               
                if($("input[id=arqtipo]:checked").val() == "arquivo") {
					
					$("#bloco1")
                    .hide()
                    .show("slow");
					$("#bloco2")
					.hide("Slow");
					
                        $("#filme").attr({readonly: false});
                } else {
					
					$("#bloco2")
                    .hide()
                    .show("slow");
					$("#bloco1")
					.hide("Slow");
					
                }
        }); 
		
		//-------------------
		//$("#enviar").click( function(){
//		if(($("input[type=radio][id=arqtipo]:checked").val() == "youtube") && ($("input[type=text][id=youtube]").val() == "") ){
//		jAlert( 'Voc� N�o colocou o link do Youtube!', 'ATEN��O');
//		return false;
//		}else if(($("input[type=radio][id=arqtipo]:checked").val() == "youtube") && ($("input[type=text][id=youtube]").val() != "")){
//			$("#youtube").attr({readonly: true});
//			return true;
//		}else if(($("input[type=radio][id=arqtipo]:checked").val() == "arquivo") && ($("input[type=file][id=filme]").val() == "") ){
//			jAlert( 'Voc� N�o Selecionou o Arquivo!', 'ATEN��O');
//		return false;
//		}else{
//			$("#filme").attr({readonly: true});
//		}
//	});
	
	//------------------------------------------------------
	//$("#enviar").click( function(){
//		if(($("input[type=radio][id=arqtipo]:checked").val() == "youtube") && ($("input[type=text][id=youtube]").val() == "") ){
//		jAlert( 'Voc� N�o colocou o link do Youtube!', 'ATEN��O');
//		return false;
//		}else if(($("input[type=radio][id=arqtipo]:checked").val() == "youtube") && ($("input[type=text][id=youtube]").val() != "")){
//			$("#youtube").attr({readonly: true});
//			return true;
//		}else if(($("input[type=radio][id=arqtipo]:checked").val() == "arquivo") && ($("input[type=file][id=filme]").val() == "") ){
//			jAlert( 'Voc� N�o Selecionou o Arquivo!', 'ATEN��O');
//		return false;
//		}else{
//			$("#filme").attr({readonly: true});
//		}
//	});
	
	//--------------------------------------------------------
	$("#confirm_exc").click( function() {
      jConfirm('Deseja excluir esse registro?', 'Exclus�o de Registro', function(r) {
      });
   }); 
     
});
