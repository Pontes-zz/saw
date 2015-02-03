$(function(){
	$("*[rel=tooltip]").hover(function(e){
			$("mprincipal").append('<div class="tooltip">'+$($this).attr('title')+'</div>');
			$('.tooltip').css({
					top : e.pageY - 100,
					left : e.pageX + 20
				}).fadeIn();
			
			
		}, function(){
				$('.tooltip').remove();
			})
	
});