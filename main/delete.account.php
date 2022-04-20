<?php

    if (isset($_GET['id'])) {
        require_once 'vendor/autoload.php';

        $del = new \App\Account();
        $del->deleteAccount($_GET['id']);
    }

    header('Location: /gestion.comptes.php');

?>