<?php
require($_SERVER['DOCUMENT_ROOT']."/lib/WideImage.php");

$extensao 	= strtolower(end(explode('.', $foto)));
$fotoren 	= md5(uniqid(rand(),true)).".$extensao";
			@rename($fotoren, $foto);
$tmp   		= $_FILES['foto']['tmp_name'];
$pasta 		= $local;

if(move_uploaded_file($tmp, $pasta.$fotoren)){
		$fotoload = "$pasta$fotoren";
		$fotoloadp = "p_$fotoren";
		$nomeft= "$pasta$fotoloadp";
		
		$fotoHome = "h_$fotoren";
		$dirFotoHome = "$pasta$fotoHome";
							
		$imagem = wideImage::Load($fotoload);
		$imagem = $imagem->resize($largura,$altura,outside);
		
		if(($_POST['txtlocal']=="formCadBanner") || ($_POST['txtlocal']=="formAltBanner") || ($_POST['txtlocal']=="formCadPub") || ($_POST['txtlocal']=="formAltPub")){ 
		
			$imagem = $imagem->crop(0, 0, $largura, $altura);
			
		}
				
		$imagem->saveToFile($fotoload, 80);
		$imagem->destroy();
				
		$imagep = wideImage::Load($fotoload);				
		$imagep = $imagep->resize(280,210, outside);
		$imagep = $imagep->crop(center,center,280,176);
		$imagep->saveToFile($nomeft, 70);
		$imagep->destroy();	
		
		$imagep = wideImage::Load($fotoload);				
		$imagep = $imagep->resize($lNotDestVar,$aNotDestVar, outside);
		$imagep = $imagep->crop(center,center,$lNotDestVarC,$aNotDestVarC);
		
		if($_POST['txtlocal']=="formAltEventos"){
			
			$fotopb = "pb_$fotoren";
			$dirFotoPB = "$pasta$fotopb";
			$imagempb = $imagep->asGrayscale();
			$imagempb->saveToFile($dirFotoPB, 80);
			$imagempb->destroy();
		}
		
		$imagep->saveToFile($dirFotoHome, 70);
		$imagep->destroy();
		
		$ok++;
}else{
	echo "<h2>ERRO AO ENVIAR A IMAGEM!!</h2>";
	$erro++;
}
if(!empty($ftantiga)){
	$pasta = $local.$ftantiga;
	@unlink($pasta);
	$imgpeq = $local."p_".$ftantiga;
	@unlink($imgpeq);
	$imgpeq = $local."h_".$ftantiga;
	@unlink($imgpeq);
	$imgpeq = $local."pb_".$ftantiga;
	@unlink($imgpeq);
}
				
?>