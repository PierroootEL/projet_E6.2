<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerUser.php';

    $workbench = new \App\Workbench();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Dashboard utilisateur</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" type="text/css" href="assets/dashboard.user.css">

</head>
<body>
    <div class="container">
        <h2><?php print $_SESSION['first_name'] . PHP_EOL . $_SESSION['last_name']; ?></h2>
        <h3>Atelier n° : <?php print $workbench->returnAssignedWorkbench($_SESSION['username'])['workbench_id']; ?></h3>
        <h4 style="font-size: 20px">Nom de l'atelier : <?php print $workbench->returnAssignedWorkbench($_SESSION['username'])['workbench_name']; ?></h4>
        <button onclick="location.href='disconnect.php'">Logout</button>
        <h1>Tacktime: 0.20 min </h1>
        <h3>Pièce A 2/20</h3>
        <h3>Pièce B 6/20</h3>
    </div>
</body>
<footer>
    <img src="assets/irup.jpg"
</footer>
</html>

