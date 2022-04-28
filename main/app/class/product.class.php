<?php 

    namespace App;

    class Product extends Database
    {

        public function returnAllProduct()
        {

            foreach($this->request(
                'SELECT * FROM product'
            )->fetchAll() as $product){
                print "
                <tr>
                    <td>{$product['product_id']}</td>
                    <td>{$product['name']}</td>
                </tr>
                ";
            }

        }

    }


?>