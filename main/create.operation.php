<?php

use App\Workbench;

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $workbench = new App\Workbench();
    $order = new App\Order();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Créer une oppération</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/ajoutcompte.css">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/menu.css">
</head>
<body>
<div class="container">
    <div class="compte">
        <h1>Création d'une oppération</h1>
        <form method="get" action="app/listener/operation.listener.php">
            <select name="workbench">
                <?php $workbench->returnSelectionForm(); ?>
            </select>
            <select name="order">
                <?php $order->returnSelectionForm(); ?>
            </select>
            <input  type="text" name="quantity" placeholder="Saisir la quantité de pièces">
            <input  type="text" name="assigned_time' placeholder="Saisir le temps pour l'oppération">
            <button class="valide" name="valid" type="submit">Valider</button>
        </form>
        <?php  ?>
    </div>
</div>

</body>
<footer>
    <img src="assets/irup.jpg"
</footer>
</html>