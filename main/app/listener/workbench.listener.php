<?php

    if(isset($_POST['valid'])){
        require_once '/var/www/pierre/projet_E6.2/main/vendor/autoload.php';

        $workbench = new App\Workbench();
        $workbench->addWorkbench($_POST['fonction']);
    }

    header('Location: /gestionWorkbench');

?>