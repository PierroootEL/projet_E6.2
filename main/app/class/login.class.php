<?php

    namespace App;

    class Login extends Database
    {

        public function __construct(string $username, string $password)
        {

            if ($this->request(
                'SELECT username FROM users WHERE username = :username',
                array(
                    ':username' => $username
                )
            )->rowCount() != 1)
            {
                LoginError::returnLoginError(1);
            }

            /** var_dump(Password::verifyPassword(
                $password,
                $this->request(
                    'SELECT password FROM users WHERE username = :username',
                    array(
                        ':username' => $username
                    )
                )->fetch()['password']
            ));

            exit(); */

            if (!Password::verifyPassword(
                $password,
                $this->request(
                    'SELECT password FROM users WHERE username = :username',
                    array(
                        ':username' => $username
                    )
                )->fetch()['password']
            )){
                LoginError::returnLoginError(2);
            }
            $session = new Session();
            $session->sessionStart(
                $this->request(
                    'SELECT user_id, last_name, first_name, username, assigned_workbench, assigned_authorisation, created_at FROM users WHERE username = :username',
                    array(
                        ':username' => $username
                    )
                )->fetch()
            );

        }

    }

?>