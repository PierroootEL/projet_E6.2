<?php

    namespace App;

    class Session extends Database
    {

        public function sessionStart(array $session_params)
        {

            session_start();

            foreach ($session_params as $key => $value)
            {
                $_SESSION[$key] = $value;
            }

            if ($this->request(
                'SELECT authorisation_id, perm FROM authorisation WHERE authorisation_id = :id',
                array(
                    ':id' => $_SESSION['assigned_authorisation']
                )
            )->fetch()['perm'] == 'admin'){
                header('Location: /dashboardAdmin');
                exit();
            }

            header('Location: /dashboardUser');

        }

        public function sessionRights(bool $need_admin_rights = false)
        {

            session_start();

            if (!isset($_SESSION['username'])){
                self::sessionEnd();
            }

            if ($need_admin_rights) {
                if ($this->request(
                        'SELECT authorisation_id, perm FROM authorisation WHERE authorisation_id = :id',
                        array(
                            ':id' => $_SESSION['assigned_authorisation']
                        )
                    )->fetch()['perm'] != 'admin') {
                    self::sessionEnd();
                }
            }

        }

        public static function sessionEnd()
        {

            session_start();

            session_unset();

            session_destroy();

            header('Location: /login');

        }

    }

?>