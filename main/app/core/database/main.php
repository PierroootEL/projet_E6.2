<?php

    class Database
    {

        /**
         * @var Database $_dbh Objet de la base de données
         */
        protected $_dbh;

        /**
         * @var string $_db_username Nom d'utilisateur de la base de données
         */
        private $_db_username;

        /**
         * @var string $_db_password Mot de passe de la base de données
         */
        private $_db_password;

        const DB_DSN = 'mysql:host=localhost;dbname=Mykey3d;charset=utf8mb4';

        /**
         * Start the transaction with the database, has to be start before trying to execute requests
         * @return void Database object contains database informations on succes, error log is created on failure
         */
        public function startTransaction()
        {
            $this->_db_username = json_decode(file_get_contents('/etc/e6.2/creds.json'), true)['db_username'];
            $this->_db_password = json_decode(file_get_contents('/etc/e6.2/creds.json'), true)['db_password'];

            try {
                $this->_dbh = new PDO(
                    self::DB_DSN,
                    $this->_db_username,
                    $this->_db_password,
                    array(
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    )
                );
            }catch(PDOException $e){
                file_put_contents(
                    'logs/connect_error_' . date('d-m-Y_H-i-s' . '.log'),
                    'Code erreur : ' . $e->getCode() . ' Message d\'erreur : ' . $e->getMessage()
                );
            }
        }

        public function endTransaction()
        {
            unset($this->_dbh);
            unset($this->_db_username);
            unset($this->_db_password);
        }

        public function generalRequest(string $sql_request, array $sql_parameters = null)
        {
            $r = $this->_dbh->prepare($sql_request);
            $r->execute($sql_parameters);

            return $r;
        }

    }

?>