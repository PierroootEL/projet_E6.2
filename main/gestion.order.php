<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $o = new \App\Order();

    $o->returnAllOperationsFromOrder();

?>

