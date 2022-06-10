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
                    <td><a href='/delete?type=product&id={$product['product_id']}'>Supprimer</a></td>
                </tr>
                ";
            }

        }

        public function addNewProduct(string $name)
        {

            $this->request(
                'INSERT INTO product (name) VALUES (:name)',
                array(
                    ':name' => $name
                )
            );

        }

        public function deleteProduct(int $p_id)
        {

            $this->request(
                'DELETE FROM product WHERE product_id = :id',
                array(
                    ':id' => $p_id
                )
            );

        }

    }


?>