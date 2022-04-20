<?php

    if (isset($_POST['valid'])){
        require_once '../../vendor/autoload.php';

        new \App\Register($_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['password_conf']);
    }

?>