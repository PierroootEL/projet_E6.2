<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Ajouter une commande</title>

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
            <h1>Ajouter une commande</h1>
            <form method="post" action="app/listener/order.listener.php">
                <input  type="text" name="name" placeholder="Saisir le nom">
                <input  type="text" name="quantity" placeholder="Saisir la quantité">
                <button class="valide" name="valid" type="submit">Valider</button>
            </form>
        </div>
    </div>

</body>
<footer>
    <img src="assets/irup.jpg"
</footer>
</html>
