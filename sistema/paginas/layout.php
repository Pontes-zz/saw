<?php 
require_once 'classes/Session.class.php';
$sid = new Session;
$sid->start();

if ( !$sid->check() )
{
     @header( 'Location: '. urlPrincipal .'login.php' );
}
else
{
    include_once("classes/inicializaSession.php");
    //echo "====>> Hello, " . $sid->getNode('NOME');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
<title>Painel de Controle</title>
<link href="<?php echo urlPrincipal ;?>css/normalize.css" rel="stylesheet" type="text/css" />
<link href="<?php echo urlPrincipal ;?>css/estilosadm.css" rel="stylesheet" type="text/css"  media="all"/>
<script type="text/javascript" src="<?php echo urlPrincipal ;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo urlPrincipal ;?>js/tooltip.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo urlPrincipal ;?>js/functions.js"></script>
<script type="text/javascript" src="<?php echo urlSite ;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('<?php echo urlSite ;?>ckeditor/kcfinder/browse.php?type=images&dir=files/fotos', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>

<script src="<?php echo urlPrincipal ;?>js/limitar.js"></script>

<script type="text/javascript">
$(function(){
	$("ul.dropdown li").hover(function(){
		$(this).addClass("hover");
		$('ul:first',this).css('visibility', 'visible');
}, function(){
 
	$(this).removeClass("hover");
		$('ul:first',this).css('visibility', 'hidden');
	});
});
</script>

<link rel="stylesheet" href="<?php echo urlPrincipal ;?>js/themes/base/jquery.ui.all.css">
	<script src="<?php echo urlPrincipal ;?>js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo urlPrincipal ;?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo urlPrincipal ;?>js/ui/jquery.ui.datepicker.js"></script>
    <script src="<?php echo urlPrincipal ;?>js/jquery.ui.datepicker-pt-BR.js"></script>
    <script src="<?php echo urlPrincipal;?>js/ui/jquery-ui.js" charset="utf-8"></script>
        <link rel="stylesheet" href="<?php echo urlPrincipal;?>js/themes/base/jquery-ui.css" type="text/css" media="all" />
 
<link rel="stylesheet" href="<?php echo urlPrincipal ;?>js/demos.css">
	<script language="javascript" type="text/javascript">
	$(function() {
		$( "#data" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo urlPrincipal ;?>imagens/iconecalendar.png",
			buttonImageOnly: true
		});
		
	});
	</script>
<script src="<?php echo urlSite ;?>SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="<?php echo urlSite ;?>SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="<?php echo urlSite ;?>SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="<?php echo urlSite ;?>SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="<?php echo urlSite ;?>SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<script src="<?php echo urlSite ;?>SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="<?php echo urlSite ;?>SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="<?php echo urlSite ;?>SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script src="<?php echo urlSite ;?>SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="<?php echo urlSite ;?>SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="container">
  <?php include "paginas/cabecalho.php"; ?>
  <?php include "paginas/menuprincipal.php"; ?>
    <!-- conteudo -->
   		<div id="conteudo"> 
   		 <?php
			$allow = $liberar->allowConteudo();
			include_once($allow);
    	?>
    <div class="clear"></div>
  </div>
  
  <?php include "paginas/rodape.php";?>
</div>
</body>
</html>