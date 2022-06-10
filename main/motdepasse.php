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
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/ajoutcompte.css">
</head>

<body>
    <div class="container">
        <div class="compte">
            <h1>Mot de passe</h1>
            <form method="post" action="app/listener/password.listener.php?id=<?php print $_GET['id']; ?>">
                <input  type="password" name="password" placeholder="Nouveau mot de passe">
                <input  type="password" name="password_conf" placeholder="Saisir à nouveau">
                <button class="valide" type="submit">Confirmer</button>
            </form>
        </div>
    </div>
</body>

<footer>
    <img src="assets/irup.jpg">
</footer>
</body>
</html>

