<?php

    namespace App;

    class Order extends Database
    {

        public function returnAllOperations()
        {

            $this->request(
                'SELECT * FROM order'
            )->fetchAll();

        }

    }

?>