<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $operation = new \App\Operation();

?>
<html>
<head>
    <title>
        Dashboard Administrateur
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/gestion.comptes.css">
    <link rel="stylesheet" type="text/css" href="assets/dashboard.admin.css">
</head>
<body>
<div class="container">
    <div class="container_left">
        <h1><?php print $_SESSION['first_name'] . PHP_EOL .$_SESSION['last_name']; ?></h1>
        <button class="un" type="button" onclick="location.href='gestion.comptes.php'">Gestion des comptes</button>
        <button class="deux" type="button" onclick="location.href='dataexport.php'">Export des données</button>
        <button class="trois" type="button" onclick="location.href='gestion.workbench.php'">Gestion des établis</button>
        <button onclick="location.href='disconnect.php'">Logout</button>
    </div>
    <div class ="container_right">
        <table class="minimalistBlack">
            <thead>
            <tr>
                <th>ATL n°</th>
                <th>User</th>
                <th>TackTime</th>
                <th>Temps restant</th>
                <th>Pièces OK</th>
                <th>Type d'opération</th>
            </tr>
            </thead>
            <tbody>
                <?php $operation->returnAllOperations(); ?>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg"
</footer>
</body>
</html>
