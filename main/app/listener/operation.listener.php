<?php

    if (isset($_GET['workbench']) && isset($_GET['order']) && isset($_GET['assigned_time']) && isset($_GET['quantity'])) {
        require_once '../../vendor/autoload.php';

        $operation = new \App\Operation();

        $operation->addNewOperation(htmlspecialchars($_GET['order']), htmlspecialchars($_GET['quantity']), htmlspecialchars($_GET['assigned_time']));
    }

    header('Location: /dashboardAdmin');

?>