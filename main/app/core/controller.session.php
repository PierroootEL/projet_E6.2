    <?php

        class ControllerSession
        {

            public static function startSession(array $users_info, bool $redirect_to_path, string $redirect_path = null)
            {
                session_start();

                if ($redirect_to_path){
                    header('Location: ' . $redirect_path);
                }
            }

            public static function checkRights()
            {
                session_start();

                if (empty($_SESSION['token'])){
                    ControllerSession::endSession();
                }
            }

            public static function endSession()
            {
                session_start();

                foreach ($_SESSION as $session_var){
                    unset($var);
                }

                header('Location: login.php');
            }

        }

    ?>