<?php

    namespace App;

    use App\Operation as Operation;

    class Order extends Database
    {

        public function returnAllOrder()
        {

            return $this->request(
                'SELECT * FROM orders'
            )->fetchAll();

        }

        public function returnAllOrderWithOperations()
        {

            foreach ($this->returnAllOrder() as $order) {
                $operation = new Operation();

                print "<div class='box'>";       
                print "<h2>{$order['name']}</h2>";
                foreach($operation->returnOperationFromOrderID($order['id']) as $operation)
                {
                    print "
                    <h4>Opération n°{$operation['operation_id']} : </h4>
                    <table>
                        <thead>
                            <th>Produit utilisé</th>
                            <th>Temps assigné</th>
                            <th>Elements fabriqués</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{$operation['product_value']}</td>
                                <td>{$operation['assigned_time']} Minutes</td>
                                <td>{$operation['ok_element']} / {$operation['quantity']}</td>
                            </tr>
                        </tbody>
                    </table>
                    ";

                }

                print "</div>";

            }

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

        public function returnSelectionForm()
        {

            foreach($this->returnAllOrder() as $order){
                print "<option value='{$order['id']}'>{$order['id']} : {$order['name']}</option>";
            }

        }

    }

?>
