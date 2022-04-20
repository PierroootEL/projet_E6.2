<?php

    require_once 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Créer compte</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/ajoutcompte.css">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
</head>
<body>
<div class="container">
    <div class="compte">
        <h1>Modification de l'atelier</h1>
        <form method="post" action="listener/register.listener.php">
            <input  type="text" name="Nom atelier" placeholder="Saisir le nom de l'atelier">
            <input  type="text" name="Fonction atelier" placeholder="Saisir la fonction de l'atelier">
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