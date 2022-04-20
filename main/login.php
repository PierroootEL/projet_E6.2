<?php

    require_once 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Se connecter</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
<div class="container">
    <img id="bg_image" src="assets/istp_bg.jpg" alt="">
    <img id="logo" src="assets/irup.jpg">
    <div class="login-container">
        <form method="post" action="app/listener/login.listener.php">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <button name="valid" type="submit">Se Connecter</button>
        </form>
        <?php new \App\LoginError(); ?>
        <br>
        <br>
        <a onclick="showPassword();">Mot de passe oublié ?</a>
        <h4 style="margin-top: 10px; display: none" id="password_text">Merci de contacter votre responsable !</h4>
    </div>
</div>
</body>
<script>
    function showPassword(){
        var password_text = document.getElementById('password_text').style;

        if (password_text.display === 'none'){
            password_text.display = 'block';
        }else{
            password_text.display = 'none';
        }
    }
</script>
</html>