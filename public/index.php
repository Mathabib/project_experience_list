<?php
//session disini untuk kebutuhan notifikasi error dan sukses flasher 
if( !session_id() ) session_start();

require '../app/init.php';

$app = new App;

?>