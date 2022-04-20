<?php

    namespace App;

    class Database
    {

        private $_username = 'pierre';

        private $_password = 'Vatorea9nsoncerodall';

        private function startTransaction(): \PDO
        {

            return new \PDO(
                'mysql:host=localhost;dbname=Mykey3d;charset=utf8mb4',
                $this->_username,
                $this->_password,
                array(
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                )
            );

        }

        public function request(string $sql_req, array $sql_params = null): \PDOStatement
        {

            $r = $this->startTransaction()->prepare($sql_req);
            $r->execute($sql_params);

            return $r;

        }

    }

?>