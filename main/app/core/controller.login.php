<?php

    include_once 'database/requests.php';

    class ControllerLogin extends DatabaseRequests
    {

        /**
         * @var string $username Username attempt send by the user
         */
        private $_username;

        /**
         * @var string $_password Password attempt send by the user
         */
        private $_password;

        public function __construct(string $username_attempt, string $password_attempt)
        {
            $this->_username = htmlspecialchars($username_attempt);
            $this->_password = htmlspecialchars($password_attempt);

            if ($this->checkAccount()){
                if($this->checkPassword()){
                    ControllerSession::startSession($this->returnUserByUsername($this->_username));
                }
            }
        }

        private function checkAccount()
        {
            if($this->returnUserExistOrNot(null, $this->_username) != 1){
                return false;
            }

            return true;
        }

        private function checkPassword()
        {
            include_once 'controller.password.php';
            if (ControllerPassword::passwordVerification($this->_password, $this->returnPasswordByUsername($this->_username))) {
                return true;
            } else {
                return false;
            }
        }

    }

?>