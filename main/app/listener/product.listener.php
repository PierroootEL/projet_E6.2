<?php

    if(isset($_POST['valid'])){
        require_once '../../vendor/autoload.php';

        $product = new App\Product();
        $product->addNewProduct($_POST['name']);
    }

    header('Location: /gestion.products.php');

?>