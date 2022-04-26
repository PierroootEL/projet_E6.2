<?php

    if (!isset($_GET['id'])){
        header('Location: /gestion.comptes.php');
    }

    if ($_POST['password'] == $_POST['password_conf']) {

        require_once '/var/www/pierre/projet_E6.2/main/vendor/autoload.php';

        $password = new \App\Password();

        $password->updatePassword($_GET['id'], $_POST['password']);

    }

    header('Location: /gestion.comptes.php');

?>