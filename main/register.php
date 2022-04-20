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
            <h1>Ajouter un compte</h1>
            <form method="post" action="app/listener/register.listener.php">
                <input  type="text" name="prenom" placeholder="Saisir le prénom">
                <input  type="text" name="nom" placeholder="Saisir le nom">
                <input  type="password" name="password" placeholder="Saisir le mot de passe">
                <input  type="password" name="password_conf" placeholder="Saisir à nouveau">
                <button class="valide" name="valid" type="submit">Valider</button>
            </form>
            <?php new \App\RegisterError(); ?>
        </div>
    </div>

</body>
<footer>
    <img src="assets/irup.jpg"
</footer>
</html>
