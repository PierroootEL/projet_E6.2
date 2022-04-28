<?php

    session_start();

    require_once 'vendor/autoload.php';
    require_once 'src/sessionCheckerAdmin.php';

    $order = new \App\Order();

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
    <link rel="stylesheet" type="text/css" href="assets/gestion.css">
    <link rel="stylesheet" type="text/css" href="assets/nav.css">
    <link rel="stylesheet" type="text/css" href="assets/dashboard.admin.css">



</head>
<body>
<nav>
    <ul>
        <li><a href="gestion.comptes.php">Gestion comptes</a></li>
        <li><a href="gestion.workbench.php">Gestion ateliers</a></li>
        <li><a href="gestion.products.php">Gestion produits</a></li>
        <li><a href="gestion.order.php">Gestion opérations</a></li>
    </ul>
</nav>
<div class="container">
    <div class="container_left">
        <h1><?php print $_SESSION['first_name'] . PHP_EOL .$_SESSION['last_name']; ?></h1>
       
        <button class="deux" type="button" onclick="location.href='dataexport.php'">Export des données</button>
        <button onclick="location.href='disconnect.php'">Logout</button>
    </div>
    <div class ="container_right">
        <?php 
            $order->returnAllOrderWithOperations();
         ?>
    </div>
</div>
<footer>
    <img src="assets/irup.jpg"
</footer>
</body>
</html>
