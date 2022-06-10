<?php

    namespace App;

    class LoginError
    {

        /**
         * Erreur de connexion sur la page de login
         */
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

        /**
         * Redirection sur la page de login avec erreur dans l'URL
         *
         * @param integer $e
         * @return void
         */
        public static function returnLoginError(int $e)
        {
            header('Location: /login?e=' . $e);
            exit();
        }

    }

?>