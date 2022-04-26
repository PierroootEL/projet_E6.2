<?php

    namespace App;

    class Order extends Database
    {

        public function returnAllOrder()
        {

            $this->request(
                'SELECT * FROM order'
            )->fetchAll();

        }

        public function returnAllOperationsFromOrder()
        {

            foreach ($this->request(
                'SELECT * FROM orders LEFT JOIN orderOperation ON orders.id = orderOperation.order_id LEFT JOIN operation ON orderOperation.operation_id = operation.assigned_order'
            )->fetchAll() as $order)
            {

                var_dump($order);
                print "<br><br>";

            }

        }

    }

?>