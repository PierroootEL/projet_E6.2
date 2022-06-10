<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $bench = new \App\Workbench();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Gestion atelier</title>

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
        <button class="un" type="button" onclick="location.href='createWorkbench'">Ajouter un atelier</button>
        <button class="un" type="button" onclick="location.href='createOperation'">Ajouter une tache</button>

    </div>
    <div class ="container_right">
        <table class="minimalistBlack">
            <thead>
            <tr>
                <th>Atelier </th>
                <th>Fonction</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php $bench->returnAllWorkbench(); ?>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg"
</footer>
</body>



