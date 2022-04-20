<?php

    namespace App;

    class Password
    {

        public static function comparePassword(string $password1, string $password2)
        {

            return $password1 == $password2;

        }

        public static function hashPassword(string $password, int $cost = 16)
        {

            return password_hash(
                $password,
                PASSWORD_BCRYPT,
                array(
                    "cost" => $cost
                )
            );

        }

        public static function verifyPassword(string $password, string $hashed_password)
        {

            return password_verify($password, $hashed_password);

        }

    }

?>