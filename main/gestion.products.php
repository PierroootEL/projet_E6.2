<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $product = new App\Product();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Gestion produits</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/gestion.css">


</head>
<body>
<div class="container">
    <div class="container_left">

        <button class="un" type="button" onclick="location.href='dashboardAdmin'">Dashboard Administrateur</button>
        <button class="un" type="button" onclick="location.href='createProduct'">Ajouter un produit</button>
  

    </div>
    <div class ="container_right">
        <table class="minimalistBlack">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
                <?php $product->returnAllProduct(); ?>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg">
</footer>
</body>

