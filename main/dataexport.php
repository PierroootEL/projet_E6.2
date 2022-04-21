<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $data = new \App\DataExport();

    $data->exportWorkbench();

    sleep(5);

    header('Location: /gestion.comptes.php');

?>
<html>
<head>
    <title>Exportation des données en cours</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
</head>
<body style="display: flex; justify-content: center; align-items: center;">
    <h1>Exportation des données en cours</h1>
</body>
</html>
