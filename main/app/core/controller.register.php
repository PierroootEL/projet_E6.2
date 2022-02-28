<?php

    include_once 'database/requests.php';

    class ControllerRegister extends DatabaseRequests
    {

        /**
         * @var string $_firstname Firstname of the user account
         */
        private $_firstname;

        /**
         * @var string $_lastname Lastname of the user account
         */
        private $_lastname;

        /**
         * @var string $_password Password for the user account
         */
        private $_password;

        /**
         * @var string $_password_conf Password confirmation for the user account
         */
        private $_password_conf;

        /**
         * @var string $_username Username of the account ( combinaision of firstname and lastname )
         */
        private $_username;

        public function __construct(string $firstname, string $lastname, string $password, string $password_conf, string $username)
        {
            $this->_firstname = htmlspecialchars($firstname);
            $this->_lastname = htmlspecialchars($lastname);
            $this->_password = htmlspecialchars($password);
            $this->_password_conf = htmlspecialchars($password_conf);
            $this->_username = htmlspecialchars($firstname) . '.' . htmlspecialchars($lastname);
        }

        /**
         * Return if the acccount exist or not
         * @return bool True if doesn't exist, false if exists
         */
        private function checkAccount(): bool
        {
            if ($this->returnUserExistOrNot(null, $this->_username) == 0){
                return true;
            }else{
                return false;
            }
        }

        /**
         * Check if password and password_conf are the same, if true, check the lenght of the password
         * @return bool True if all is Ok, false on failure
         */
        private function checkPassword()
        {
            if ($this->_password != $this->_password_conf){
                return false;
            }

            if (strlen($this->_password) < 4){
                return false;
            }

            return true;
        }

        private function hashPassword()
        {
            include_once 'controller.password.php';

            $this->_password = ControllerPassword::passwordHashCreation($this->_password_conf);
        }

    }

?>