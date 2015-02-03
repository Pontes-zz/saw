<script type="text/javascript">
  $(function(){
	  $("#executar").click(function(){
		  
		 beforeSend:$(".carregando").fadeIn("slow"); 
		  
	});
  })
</script>

<div class="carregando" style="display:none;">
<img src="<?php echo urlPrincipal; ?>imagens/load.gif" alt="Carregando Aguarde..." />
<br />Carregando Aguarde...</div><!--admin-->