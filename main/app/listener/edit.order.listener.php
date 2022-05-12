<?php

    if (isset($_POST['valid']) && isset($_GET['id'])) {
        require_once '../../vendor/autoload.php';
        $order = new App\Order();
        $order->editOrder($_GET['id'], $_POST['quantity']);
    }

    header('Location: /gestion.order.php');

?>