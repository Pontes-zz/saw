<?php
require_once '../classes/mysql.php';
require_once '../classes/Upload.class.php';
$db = new Mysql;
if ( isset( $_GET['action'] ) )
{
    $action = $_GET['action'];
    $action();	
}

function fulltrim( $str )
{
    return  $str;
}

function updateAlbumName()
{
	echo "atualizando album agora";
	if(isset($_POST['album_name']))
	{
		$album_name = htmlentities(utf8_decode(fulltrim( $_POST['album_name'] )));
		$album_id = $_POST['album_id'];
		$db = new Mysql;
		$db->query( "update albuns set album_name = '$album_name' where album_id = $album_id" );
		echo 'Galeria Atualizado: <br />' . $album_name;
	}
}

function updateFotoCover()
{
	if(isset($_POST['foto_album']))
	{
		$foto_album = $_POST['foto_album'];
		$foto_id = $_POST['foto_id'];
		$db = new Mysql;
		$db->query( "update fotos set foto_pos = 1 where foto_album = $foto_album" );
		$db->query( "update fotos set foto_pos = 0 where foto_id = $foto_id" );
		echo 'Capa Atualizada <br />';
	}
}

function updateFotoName()
{
	$foto_caption = "";
	$foto_info = "";
	if(isset($_POST['foto_caption']))
	{
		$foto_caption = fulltrim( $_POST['foto_caption'] );
	}
	if(isset($_POST['foto_info']))
	{
		$foto_info = fulltrim( $_POST['foto_info'] );
	}
	$foto_id = preg_replace( '/f\_/', '', fulltrim( $_POST['foto_id'] ) );
	$db = new Mysql;
	$db->query( "update fotos set foto_caption = '$foto_caption', foto_info = '$foto_info' where foto_id = $foto_id" );
	echo 'Foto Atualizada<br />' . $foto_caption;
}

function deleteFoto()
{
    $foto_id = $_POST['foto_id'];
    $db = new Mysql;
    $db->query( "select * from fotos where foto_id = $foto_id" )->fetchAll();
    if ( $db->rows >= 1 )
    {
        $file = "../../galeria/" . $db->data[0]['foto_url'];
        if ( file_exists( $file ) )
        {
            @unlink( $file );
        }
        $db->query( "delete from fotos where foto_id = $foto_id" );
    }
    echo 'Foto Removida <br />';
}

function updateVideoPos()
{
    extract( $_POST );
    parse_str( $item, $arr );
    $db = new Mysql;
    foreach ( $arr['item'] as $pos => $foto_id )
    {
        $db->query( "update fotos set foto_pos = $pos where foto_id = $foto_id" );
    }
}

?>