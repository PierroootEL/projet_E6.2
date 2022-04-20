<?php

    if (isset($_POST['valid'])){
        require_once '../../vendor/autoload.php';

        new \App\Login($_POST['username'], $_POST['password']);
    }

?>