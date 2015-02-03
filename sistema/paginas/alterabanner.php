<?php
 
include "../actions/checa.php"; 
include "../includes/config.php";
require($_SERVER['DOCUMENT_ROOT']."/lib/WideImage.php");

$link = mysql_real_escape_string($_GET['link']);
$tabela = mysql_real_escape_string($_GET['tab']);
if(!$_POST['Submit']){

    echo"Por favor preencha todos os campos";

}else{
//foreach ($_POST as $campo => $valor) { $$campo = trim(($valor));
$id = mysql_real_escape_string($_POST['id']);
$urllnk = $_POST['urllnk'];
$txt = $_POST['texto'];
$ftd = $_FILES['foto']['name'];

if(!empty($ftd)){

	$ftdestaque = md5(uniqid(rand(),true)).".jpg";
	rename($ftd, $ftdestaque );
	$tmp = $_FILES['foto']['tmp_name'];
	$pasta="../../banner/";
	
	$x = mysql_query("UPDATE $tabela SET  link='$urllnk' ,texto='$txt' , foto='$ftdestaque' WHERE id='$id';");
	
	if($x){
		
		if(move_uploaded_file($tmp, $pasta.$ftdestaque)){
				
				echo "<p>Foto Enviada com sucesso!</p>";
								
				$foto = "$pasta$ftdestaque";
				$imagep = wideImage::Load($foto);				
				$imagep = $imagep->resize(593,397, inside);
				$imagep = $imagep->crop(0,0,593,394);
				$imagep->saveToFile($foto,70);
				$imagep->destroy();	
				
			}else{
				echo "<p align='center'> Erro ao enviar a foto!!";
			}
			
			echo"<br /><br /><div align=\"center\"><strong><font face=\"verdana\" size=\"2\">Evento cadastrado com sucesso!<meta http-equiv=\"refresh\" content=\"2; URL=sistema.php?link=$link&page=listabanner&tab=$tabela\"></font></strong></div>";
	
			}else{
				
				echo "<p align='center'>Erro de inclusão no dado no Banco de Dados</p>";
			}
		
		}else{
			
			$x = mysql_query("UPDATE $tabela SET link='$urllnk', texto='$txt' WHERE id='$id';");
				
				if($x){
					
					echo"<br /><br /><div align=\"center\"><strong><font face=\"verdana\" size=\"2\">Evento cadastrado com sucesso! sem Alteração de Foto<meta http-equiv=\"refresh\" content=\"2; URL=sistema.php?link=$link&page=listabanner&tab=$tabela\"></font></strong></div>";
				}else{
					
				echo "<p align='center'>Erro de inclusão no dado no Banco de Dados</p>";
				
				}
		}
}

?>   
		
