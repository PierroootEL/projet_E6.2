<?php

    namespace App;

    class Register extends Database
    {

        public function __construct(string $first_name, string $last_name, string $password, string $password_conf)
        {

            if (!Password::comparePassword($password, $password_conf)){
                RegisterError::returnRegisterError(2);
            }

            if ($this->request(
                'SELECT username FROM users WHERE username = :username',
                array(
                    ':username' => strtolower($first_name) . '.' . strtolower($last_name)
                )
            )->rowCount() != 0){
                RegisterError::returnRegisterError(1);
            }

            if(!$this->request(
                'INSERT INTO users (last_name, first_name, username, password) VALUES (:last, :first, :username, :password)',
                array(
                    ':last' => $last_name,
                    ':first' => $first_name,
                    ':username' => strtolower($first_name) . '.' . strtolower($last_name),
                    ':password' => Password::hashPassword($password)
                )
            )){
                RegisterError::returnRegisterError(3);
            }

            header('Location: /login.php');

        }

    }

?>