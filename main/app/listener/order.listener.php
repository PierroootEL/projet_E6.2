<?php

    if(isset($_POST['valid'])){
        require_once '../../vendor/autoload.php';
        $order = new App\Order();
        $order->addNewOrder($_POST['name'], $_POST['quantity'], $_POST['time']);
    }

    header('Location: /gestionOrder');

?>