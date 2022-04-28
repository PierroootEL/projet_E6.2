<?php

    namespace App;

    use App\Operation as Operation;

    class Order extends Database
    {

        /**
         * Return all orders
         *
         * @return array | false
         */
        public function returnAllOrder()
        {

            return $this->request(
                'SELECT * FROM orders'
            )->fetchAll();

        }

        /**
         * Return all orders in a HTMLTable
         *
         * @return
         */
        public function returnAllOrderHTMLTable()
        {

            foreach($this->returnAllOrder() as $order)
            {

                print "
                <tr>
                    <td>{$order['id']}</td>
                    <td>{$order['name']}</td>
                    <td>{$order['assigned_time']}</td>
                    <td>{$order['status']}<td>
                    <td>{$order['created_order']}</td>
                </tr>
                ";

            }

        }

        /**
         * Return all order with operations associed in HTML Table
         *
         * @return 
         */
        public function returnAllOrderWithOperations()
        {

            foreach ($this->returnAllOrder() as $order) {
                $operation = new Operation();

                print "<div class='box'>";       
                print "<h2>{$order['name']}</h2>";
                foreach($operation->returnOperationFromOrderID($order['id']) as $operation)
                {
                    $d1 = new \DateTime(date('H:i:s'));
                    $d2 = new \DateTime(date('H:i:s', strtotime($operation['create_date'] . '+' . $operation['assigned_time'] . 'minutes')));
                    $jour_actuel = date('Y-m-d');
                    $jour_creation = date('Y-m-d', strtotime($operation['create_date']));

                    if ($jour_actuel > $jour_creation) {
                        $this->request(
                            'UPDATE operation SET status = 3 WHERE operation_id = :id',
                            array(
                                ':id' => $operation['operation_id']
                            )
                        );
                    }

                    $interval = $d1->diff($d2);

                    
                    $temps_restant = "{$interval->h}:{$interval->i}:{$interval->s}";
                                    
                    $heures_restantes = date('H', strtotime($temps_restant)) * 60;
                    
                    $pieces_restantes = $operation['quantity'] - $operation['ok_element'];

                    
                    $tacktime = (date('i', strtotime($temps_restant)) + $heures_restantes) / $pieces_restantes;

                    if ($d1 > $d2){
                        $tacktime = '- ' . $tacktime;
                    }

                    print "
                    <h4>Opération n°{$operation['operation_id']} : </h4>
                    <table>
                        <thead>
                            <th>Produit utilisé</th>
                            <th>Temps assigné</th>
                            <th>Elements fabriqués</th>
                            <th>Tack Time</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{$operation['product_value']}</td>
                                <td>{$operation['assigned_time']} Minutes</td>
                                <td>{$operation['ok_element']} / {$operation['quantity']}</td>
                                <td>{$tacktime}</td>

                            </tr>
                        </tbody>
                    </table>
                    ";

                }

                print "</div>";

            }

        }

        /**
         * Return a product using is ID
         *
         * @param integer $product_id
         * @return 
         */
        public function returnProductByID(int $product_id)
        {

            return $this->request(
                'SELECT * FROM product WHERE product_id = :id',
                array(
                    ':id' => $product_id
                )
            )->fetch()['name'];

        }

        public function returnSelectionForm()
        {

            foreach($this->returnAllOrder() as $order){
                print "<option value='{$order['id']}'>{$order['id']} : {$order['name']}</option>";
            }

        }

        public function addNewOrder(string $name, int $asssiged_time)
        {

            $this->request(
                'INSERT INTO orders (name, assigned_time) VALUES (:name, :time)',
                array(
                    ':name' => $name,
                    ':time' => $asssiged_time
                )
            );

        }

    }

?>
