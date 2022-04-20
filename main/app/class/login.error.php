<?php

    namespace App;

    class LoginError
    {

        public function __construct()
        {

            if (isset($_GET['e']))
            {

                switch ($_GET['e']){
                    case 1:
                        print "Erreur d'identifiants";
                        break;
                    case 2:
                        print "Erreur d'identifiants";
                        break;
                    case 3:
                        print "Erreur lors de la connexion au compte";
                        break;
                }

            }

        }

        public static function returnLoginError(int $e)
        {
            header('Location: /login.php?e=' . $e);
            exit();
        }

    }

?>