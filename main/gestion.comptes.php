<?php

// include_once '/var/www/projet_E6.2/main/app/core/controller.session.php';

// sessionController::checkRights();

    require_once 'vendor/autoload.php';

    $acc = new App\Account();

?>

<html>
<head>
    <title>
        Gestion administrateur
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/gestion.comptes.css">
</head>
<body>
<div class="container">
    <div class="container_left">
        <button class="un" type="button" onclick="location.href='register.php'">Ajouter un compte</button>

        <label for="site-search"></label>
        <input type="search" id="site-search" name="q"
               aria-label="Search through site content">

        <button>Rechercher</button>
    </div>
    <div class ="container_right">
        <table class="minimalistBlack">
            <thead>
                <tr>
                <th>Nom</th>
                <th>Pr&eacute;nom</th>
                <th>ID</th>
                <th>Mot de passe</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
                <?php $acc->returnAllUsers(); ?>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg">
</footer>
</body>
</html>
