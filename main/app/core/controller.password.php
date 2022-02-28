<?php

    class ControllerPassword
    {

        public function __construct()
        {
            include_once 'lib/password.php';
        }

        public static function passwordHashCreation(string $password)
        {
            return password_hash($password, PASSWORD_BCRYPT, array("cost" => 16));
        }

        public static function passwordVerification(string $clear_password, string $user_password)
        {
            return password_verify($clear_password, $user_password);
        }

    }

?>