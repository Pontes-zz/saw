<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sistema/classes/mysql.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sistema/classes/Canvas.class.php";

$db = new Mysql;

if (!empty( $_POST['new'])){
    
    $album_name = utf8_encode(trim( preg_replace( '/\s+/', ' ', $_POST['new'])));
    
    if ( $album_name != "" )
    {
        $db->query( "insert into albuns (album_name) values ('$album_name');" );
        $album_id = mysql_insert_id();
        echo "<script> window.location='album/edit/$album_id'</script>";
    }
}

if ( $breadCrumb[1] == "delete" )
{
    $album_id = $breadCrumb[2];
    $db->query( "select * from fotos where foto_album = $album_id;" )->fetchAll();
    if ( $db->rows >= 1 )
    {
        foreach ( $db->data as $foto )
        {
            $f = ( object ) $foto;
            $file = "../galeria/$f->foto_url";
            if ( file_exists( $file ) )
            {
                @unlink( $file );
            }
        }
    }
    $db->query( "delete from albuns where album_id = $album_id" );
    $db->query("delete from fotos where foto_album= $album_id");
    
    $ir = urlPrincipal ."album";
    echo "<script> window.location='". $ir ."';</script>";
}
?>
        <link href="<?php echo urlPrincipal;?>css/all.css" rel="stylesheet" type="text/css">
       
        <!-- Generic libs -->
        <script type="text/javascript" src="<?php echo urlPrincipal;?>js/html5.js"></script>
        <!-- Template core functions -->
        <script type="text/javascript" src="<?php echo urlPrincipal;?>js/common.js"></script>
        <script type="text/javascript" src="<?php echo urlPrincipal;?>js/jquery.tip.js"></script>
        <script type="text/javascript" src="<?php echo urlPrincipal;?>js/standard.js"></script>
        <!--[if lte IE 8]><script type="text/javascript" src="<?php echo urlPrincipal;?>js/standard.ie.js"></script><![endif]-->

        
        <link href="<?php echo urlPrincipal;?>uploadfy/css/uploadify.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo urlPrincipal;?>uploadfy/js/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo urlPrincipal;?>uploadfy/js/jquery.uploadify.v2.1.4.min.js"></script>
        <script src="<?php echo urlPrincipal;?>js/jquery.scrollto.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo urlPrincipal;?>js/album.js" charset="utf-8"></script>
       
   <div id="total">      
                            <?php
                            if ( $breadCrumb[1] == "edit" )
                            {
                                $album_id = $breadCrumb[2];
                                ?>
                                <script type="text/javascript">
                                    $(document).ready(function() {                
                                        $('#fupload').uploadify({
                                            'uploader'  : '<?php echo urlPrincipal ;?>uploadfy/js/uploadify.swf',
                                            'script'    : '../../paginas/upload.php?album_id=<?php echo $album_id; ?>',
                                            'cancelImg' : '<?php echo urlPrincipal ;?>uploadfy/js/cancel.png',
                                            'folder'    : '../../galeria',
                                            'auto'      : true,
                                            'multi'     : true,
                                            'buttonText'  : 'Upload',
                                            'sizeLimit'   : 1000002400,
                                            'width'       : 186,
                                            'height'       : 55,  
                                            //'queueSizeLimit' : 10,
                                            'uploadLimit' : 1,
                                            'fileExt'     : '*.jpg;*.gif;*.png;*.bmp;*.jpeg',
                                            'fileDesc'    : 'Imagens (JPG, GIF, PNG, BMP)',
                                            'buttonImg'   : '<?php echo urlPrincipal ;?>images/upload.png',
                                            'onAllComplete': function(event, queueID, fileObj,response){
                                                window.location = '<?php echo urlPrincipal ;?>album/edit/<?php echo $album_id; ?>';
                                            }           
                                        })
                                    })
                                </script>                            
                                <?php
                                $db->query( "select * from albuns  where album_id = $album_id" )->fetchAll();
                                if ( $db->rows >= 1 )
                                {
                                    $album_name = utf8_decode( $db->data[0]['album_name'] );
                                    $album_id = $db->data[0]['album_id'];
                                    
                                    ?>
                                    <div class="box-album"> 
                                        <ul class="box-album-head">

                                            <p class="one-line-input grey-bg with-padding">
                                                <span class="relative">
                                                    <label for="<?= $album_id ?>">Nome da Galeria</label>
                                                    <input type="text" name="album_name" id="<?= $album_id ?>" class="album_name with-tip" title="Nome da Galeria" value="<?= $album_name ?>" />
                                                    <button class="grey updateAlbumName">Atualizar</button>
                                                </span>                 
                                            </p>
                                           </ul>
                                           </div>

                                        <span class="align-right btn-upload">
                                            <input id="fupload" name="upload" type="file" class="hides" />
                                        </span>                                        
                                        <?php
                                        $db->query( "select * from fotos join albuns on (album_id = foto_album) where foto_album = $album_id order by foto_pos asc" )->fetchAll();
                                        if ( $db->rows >= 1 )
                                        {
                                            $fotos = $db->data;
                                            echo "<ul class=\"sortable\" style=\"list-style-type: none; margin: 0; padding: 0;\">";
                                            foreach ( $fotos as $foto )
                                            {
                                                $f = ( object ) $foto;
                                                echo "<li class=\"lisort\" id=\"item_$f->foto_id\" class=\"div_$f->foto_id\">";
                                                if ( $f->foto_caption == "" )
                                                {
                                                    $f->foto_caption = "";
                                                }
                                                $f->foto_caption = utf8_decode( $f->foto_caption );
                                                echo '<ul class="box-foto-edit extended-list div_' . $f->foto_id . '">' . "\n";
                                                echo "<li class=\"div_$f->foto_id\">" . "\n";
                                                ?>
                                                <ul class="mini-menu with-children-tip">
                                                    <li><a href="javascript:void(0)" title="Atualizar" id="<?= $f->foto_id ?>" album="<?= $album_id ?>" class="refresh"><img src="<?php echo urlPrincipal;?>images/icons/refresh.png" width="16" height="16"></a></li>
                                                    <li><a href="javascript:void(0)" title="Definir Capa" id="<?= $f->foto_id ?>" album="<?= $album_id ?>" class="cover"><img src="<?php echo urlPrincipal;?>images/icons/photo.png" width="16" height="16"></a></li>
                                                    <li><a href="javascript:void(0)" title="Remover" id="<?= $f->foto_id ?>" class="delete"><img src="<?php echo urlPrincipal;?>images/cross-circle.png" width="16" height="16"></a></li>
                                                </ul> 
           
                                                <img class="pic with-tip tip-bottom"  src="../../../paginas/thumb.php?imgGal=../galeria/<?php echo $f->foto_url; ?>"/>
                                
                                                <input type="text" class="with-tip foto_caption" id="f_<?= $f->foto_id ?>"  value="<?= $f->foto_caption ?>" maxlength="80" title="Info 1" />
                                                <input type="text" class="with-tip tip-bottom foto_info" id="if_<?= $f->foto_id ?>"  value="<?= $f->foto_info ?>" maxlength="80" title="Info 2" />
                                                <?php
                                                echo "</li>\n";
                                                echo "</ul>\n";
                                                echo '</li>' . "\n";
                                            }
                                            echo '</ul>';
                                        }
                                    }
                                }
                                else
                                {
                                    ?>

                                    <div class="box-album"> 
                                        <form name="f" action="" method="post">
                                            <ul class="box-album-head" style="width: 101%; margin:0; margin-bottom: 20px; padding: 0 !important">
                                                <p class="one-line-input grey-bg with-padding">
                                                    <span class="relative">
                                                        <label for="new">Nome da Galeria</label>
                                                        <input type="text" name="new" id="new" class="album_name with-tip" title="Nome da Galeria" />
                                                        <button class="grey" id="Criar">Criar</button>
                                                    </span>                 
                                                </p>
                                           </ul>
                                        </form>
                                    </div>
                                <div class="box-album">
                                    <table width="960" border="1" cellspacing="1" cellpadding="3" class="tabela">
                                       
                                            <tr class="tittab">
                                                <td width="39">ID</td>
                                                <td width="738">Galeria</td>
                                                <td width="62">Fotos</td>
                                                <td width="82">A&ccedil;&otilde;es</td>
                                            </tr>
                                        
                                                                 
                                            <?php
                                            $db->query( "select * from albuns order by album_name asc" )->fetchAll();
                                            if ( $db->rows >= 1 )
                                            {
                                                $albuns = $db->data;
                                                foreach ( $albuns as $album )
                                                {
                                                    $alb = ( object ) $album;
                                                    $alb->album_name = utf8_decode( $alb->album_name );
                                                    $db->query( "select * from fotos where foto_album = $alb->album_id" )->fetchAll();
                                                    echo "<tr>";
                                                    echo "<td> $alb->album_id </td>";
                                                    echo "<td> $alb->album_name </td>";
                                                    echo "<td> $db->rows </td>";
                                                    ?>
                                                <td> 
                                                    <a class="with-tip edit" title="editar galeria" href="<?php echo urlPrincipal;?>album/edit/<?= $alb->album_id ?>">
                                                        <img src="<?php echo urlPrincipal;?>images/pencil.png" width="16" height="16">
                                                    </a> 
                                                    &nbsp;
                                                    <a class="with-tip deleteAlbum" title="remover galeria"  id="<?= $alb->album_id ?>" href="javascript:void(0)">
                                                        <img src="<?php echo urlPrincipal;?>images/cross-circle.png" width="16" height="16">
                                                    </a> 
                                                </td>

                                                <?php
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                                                             
                                    </table>
                                </div>
                                    <?php
                                }
                                ?>
                               
                    </div><!--  fim total -->