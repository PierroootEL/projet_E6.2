<?php

    namespace App;

    class RegisterError
    {

        public function __construct()
        {

            if (isset($_GET['e']))
            {

                switch ($_GET['e']){
                    case 1:
                        print "Un compte existe déjà avec ce nom d'utilisateur";
                        break;
                    case 2:
                        print "Les mots de passes ne correspondent pas";
                        break;
                    case 3:
                        print "Erreur lors de la création du compte";
                        break;
                }

            }

        }

        public static function returnRegisterError(int $e)
        {

            header('Location: /register.php?e=' . $e);
            exit();

        }

    }

?>