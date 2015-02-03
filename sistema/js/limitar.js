$(function(){
	$("#legenda").keyup(function(){
		var limite = 400;
		var tamanho = $(this).val().length;
		if(tamanho>limite){
			tamanho -=1;
		}
		var contador = limite - tamanho
		$("#contador").text(contador)
		
		if(tamanho>=limite){
			var txt = $(this).val.substring(0, limite)
			$(this).val(txt)
		}
	})
	
	$("#lead").keyup(function(){
		var limite = 300;
		var tamanho = $(this).val().length;
		if(tamanho>limite){
			tamanho -=1;
		}
		var contador = limite - tamanho
		$("#cont_lead").text(contador)
		
		if(tamanho>=limite){
			var txt = $(this).val.substring(0, limite)
			$(this).val(txt)
		}
	})
	
	$("#titulobanner").keyup(function(){
		var limite = 100;
		var tamanho = $(this).val().length;
		if(tamanho>limite){
			tamanho -=1;
		}
		var contador = limite - tamanho
		$("#contadora").text(contador)
		
		if(tamanho>=limite){
			var txt = $(this).val.substring(0, limite)
			$(this).val(txt)
		}
	})
	
	$("#textobanner").keyup(function(){
		var limite = 100;
		var tamanho = $(this).val().length;
		if(tamanho>limite){
			tamanho -=1;
		}
		var contador = limite - tamanho
		$("#contadorb").text(contador)
		
		if(tamanho>=limite){
			var txt = $(this).val.substring(0, limite)
			$(this).val(txt)
		}
	})

})