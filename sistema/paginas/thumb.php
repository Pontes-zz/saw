<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sistema/classes/Canvas.class.php";
if ( isset( $_GET['imgGal'] ) )
{
    $pic = $_GET['imgGal'];
    $w = 175; //largura
    $h = 175; //altura
    $t = new Canvas;
    $t->carrega( $pic );
    $t->redimensiona( $w, $h, 'crop' );
    $t->grava();
}
?>