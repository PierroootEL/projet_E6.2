<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

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
    <link rel="stylesheet" type="text/css" href="assets/gestion.css">
</head>
<body>
<div class="container">
    <div class="container_left">

         <button class="un" type="button" onclick="location.href='dashboardAdmin'">Dashboard Administrateur</button>
        <button class="un" type="button" onclick="location.href='register'">Ajouter un compte</button>

        <form method="get" action="">
            <input type="search" name="search" placeholder="Nom de famille">
            <button>Rechercher</button>
        </form>
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
                <?php (isset($_GET['search'])) ? $acc->returnAllUsers($_GET['search']) : $acc->returnAllUsers(false) ?>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg">
</footer>
</body>
</html>
