
<?php

    include_once 'main.php';

    class DatabaseRequests extends Database
    {

        public function returnAllUsers()
        {
            $this->startTransaction();

            return $this->generalRequest(
                'SELECT * FROM users'
            );

            $this->endTransaction();

            return true;
        }

        public function returnUserExistOrNot(int $u_id = null, string $username = null)
        {
            $this->startTransaction();

            if ($u_id != null) {
                return $this->generalRequest(
                    'SELECT id FROM users WHERE id = :id',
                    array(
                        ':id' => $u_id
                    )
                )->rowCount();
            }elseif ($username != null){
                return $this->generalRequest(
                    'SELECT id FROM users WHERE username = :username',
                    array(
                        ':username' => $username
                    )
                )->rowCount();
            }

            $this->endTransaction();

            return false;
        }

        public function returnUserByID(int $u_id)
        {
            $this->startTransaction();

            if ($this->returnUserExistOrNot($u_id) == 1) {
                return $this->generalRequest(
                    'SELECT * FROM users WHERE id = :id',
                    array(
                        ':id' => $u_id
                    )
                );
            }

            $this->endTransaction();

            return false;
        }

        public function returnUserByUsername(string $username)
        {
            $this->startTransaction();

            if ($this->returnUserExistOrNot(null, $username) == 1) {
                return $this->generalRequest(
                    'SELECT * FROM users WHERE username = :username',
                    array(
                        ':username' => $username
                    )
                );
            }

            $this->endTransaction();

            return false;
        }

        public function returnPasswordByUsername(string $username)
        {
            $this->startTransaction();

            if ($this->returnUserExistOrNot(null, $username) == 1){
                return $this->generalRequest(
                    'SELECT password FROM users WHERE username = :username',
                    array(
                        ':username' => $username
                    )
                )->fetch()['password'];
            }

            $this->endTransaction();

            return false;
        }

    }

?>