<?php 
	$sid = new Session;
        $sid->start();
        $sid->init( 3600 );
        $sid->addNode( 'start', date( 'd/m/Y - h:i' ) );
?>