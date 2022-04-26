<?php

    namespace App;

    class Password extends Database
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

        public function updatePassword(int $acc_id, string $password){
            $hash = self::hashPassword($password);

            $this->request(
                'UPDATE users SET password = :pass WHERE user_id = :id',
                array(
                    ':pass' => $hash,
                    ':id' => $acc_id
                )
            );
        }

    }

?>