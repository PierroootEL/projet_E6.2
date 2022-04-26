<?php

    session_start();

    require_once 'src/sessionCheckerAdmin.php';

?>

<html>
<head>
    <title>
        Changement mot de passe
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/gestion.comptes.css">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
</head>

<body>
    <div class="container">
        <div class="password-container">
            <h1>Mot de passe</h1>
            <form method="post" action="app/listener/password.listener.php">
                <input  type="text" name="nouveau" placeholder="Nouveau mot de passe">
                <input  type="password" name="saisir" placeholder="Saisir à nouveau">
                <button class="valide" type="submit">Confirmer</button>
            </form>
        </div>
    </div>
</body>

<footer>
    <img src="assets/irup.jpg"
</footer>
</body>
</html>

