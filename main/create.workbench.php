<?php

    session_start();

    require 'vendor/autoload.php';
    require 'src/sessionCheckerAdmin.php';

?>
<html>
<head>
    <title>
        Ajouter atelier
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/ajoutcompte.css">
    <link rel="stylesheet" type="text/css" href="assets/gestion.css">
</head>
<body>
    
<div class="container">
    <div class="compte">
        <h1>Ajouter un atelier</h1>
        <form method="post" action="app/listener/workbench.listener.php">
            <input  type="text" name="fonction" placeholder="Saisir la fonction">
            <button class="valide" name="valid" type="submit">Valider</button>
        </form>
    </div>
</div>

</body>
<footer>
    <img src="assets/irup.jpg"
</footer>
</html>
