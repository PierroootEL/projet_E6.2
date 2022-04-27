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

        public function returnProductByID(int $product_id)
        {

            return $this->request(
                'SELECT * FROM product WHERE product_id = :id',
                array(
                    ':id' => $product_id
                )
            )->fetch()['name'];

        }

        public function returnAllOperationsFromOrder()
        {

            foreach ($this->request(
                'SELECT * FROM orders'
            )->fetchAll() as $order)
            {
                print"
                <h1>Commande n°{$order['id']}</h1>
                <h2>Produit commandé : {$order['name']}</h2>
                ";
                foreach($this->request(
                    'SELECT * FROM operation LEFT JOIN orders ON operation.assigned_order = orders.id WHERE orders.id = :id',
                    array(
                        ':id' => $order['id']
                    )
                )->fetchAll() as $order_operation){

                    $d1 = new \DateTime(date('H:i:s'));
                    $d2 = new \DateTime(date('H:i:s', strtotime($order_operation['create_date'] . '+' . $order_operation['assigned_time'] . 'minutes')));

                    if ($d1 > $d2){
                        $this->request(
                            'UPDATE order_operation SET status = 3 WHERE order_operation_id = :id',
                            array(
                                ':id' => $order_operation['order_operation_id']
                            )
                        );
                    }

                    $interval = $d1->diff($d2);

                    $temps_restant = "{$interval->h}:{$interval->i}:{$interval->s}";

                    $heures_restantes = date('H', strtotime($temps_restant)) * 60;
                    $pieces_restantes = $order_operation['quantity'] - $order_operation['ok_element'];

                    $tacktime = (date('i', strtotime($temps_restant)) + $heures_restantes) / $pieces_restantes;

                    print "
                        <tr>
                            <td>" . round($tacktime, 2) . " minutes par pièce</td>        
                            <td>{$temps_restant}</td>        
                            <td>{$order_operation['ok_element']} / {$order_operation['quantity']}</td>        
                            <td>{$this->returnProductByID($order_operation['product_value'])}</td>
                        </tr>
                    ";
                }

            }

        }

    }

?>