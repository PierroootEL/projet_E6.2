<?php

    session_start();

    require_once 'vendor/autoload.php';

    sessionController::checkRights();

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
        <button class="un" type="button">Gestion des comptes</button>
        <button class="deux" type="button">Export des données</button>
        <button onclick="location.href='disconnect.php'">Logout</button>
        <h1><?php print $_SESSION['first_name'] . PHP_EOL .$_SESSION['last_name']; ?></h1>
    </div>
    <div class ="container_right">
        <table class="minimalistBlack">
            <thead>
            <tr>
                <th>ATL n°</th>
                <th>User</th>
                <th>TackTime</th>
                <th>TotalTime</th>
                <th>Pièces OK</th>
                <th>Type de pièces</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Pierre</td>
                <td>+0.20</td>
                <td>4.40</td>
                <td>2/10</td>
                <td>Clé USB</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg"
</footer>
</body>
</html>
