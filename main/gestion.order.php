<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $order = new \App\Order();
    // $order->returnAllOrderHTMLTable();

?>

