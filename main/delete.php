<?php

    session_start();

    require_once 'src/sessionCheckerAdmin.php';

    if (isset($_GET['type']) && isset($_GET['id'])){

        require_once 'vendor/autoload.php';

        switch ($_GET['type']){

            case 'acc':
                $acc  = new \App\Account();
                $acc->deleteUser($_GET['id']);
            case 'bench':
                $bench = new \App\Workbench();
                $bench->deleteWorkbench($_GET['id']);
            default:
                header('Location: /dashboard.admin.php');

        }
    }

?>