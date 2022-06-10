<?php

    namespace App;

    class Password extends Database
    {

        /**
         * Compare le mots de passe renseigné
         *
         * @param string $password1
         * @param string $password2
         * @return bool
         */
        public static function comparePassword(string $password1, string $password2)
        {

            return $password1 == $password2;

        }

        /**
         * Hash le mot de passe avec par défaut 16 en puissance
         *
         * @param string $password
         * @param integer $cost
         * @return void
         */
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

        /**
         * Vérifie un mot de passe avec le hash
         *
         * @param string $password
         * @param string $hashed_password
         * @return bool
         */
        public static function verifyPassword(string $password, string $hashed_password)
        {

            return password_verify($password, $hashed_password);

        }

        /**
         * Change le mot de passe d'un utilisateur
         *
         * @param integer $acc_id
         * @param string $password
         * @return void
         */
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