<?php

    namespace App;

    class Operation extends Database
    {

        /**
         * Retourne toutes les opérations créées
         *
         * @return array|false 
         */
        public function returnAllOperations()
        {

            foreach ($this->mainForeachStatement() as $operation) {
                $assigned_workbench = $this->assignedWorkbenchDetails($operation['operation_id']);
                if ($assigned_workbench) {
                    $assigned_user = $this->assignedUserDetails($assigned_workbench['workbench_id']);
                }
                $assigned_product = $this->assignedProduct($operation['product_value']);

                $tacktime = $this->returnTackTime($operation['create_date'], $operation['assigned_time'], $operation['operation_id'], $operation['quantity'], $operation['ok_element']);
                
                if ($operation['status'] == 2) {
                    print "
                        <tr>
                            <td>{$assigned_workbench['workbench_id']}</td>
                            <td>{$assigned_user['first_name']} {$assigned_user['last_name']}</td>
                            <td>Terminé</td>
                            <td>Terminé</td>
                            <td>{$tacktime['pieces_restantes']} / {$operation['quantity']}</td>
                            <td>{$assigned_product['name']}</td>
                        </tr>
                    ";   
                
                    continue;
                }

                if ($operation['status'] == 3) {
                    print "
                        <tr>
                            <td>{$assigned_workbench['workbench_id']}</td>
                            <td>{$assigned_user['first_name']} {$assigned_user['last_name']}</td>
                            <td>En retard</td>
                            <td>En retard</td>
                            <td>{$tacktime['pieces_restantes']} / {$operation['quantity']}</td>
                            <td>{$assigned_product['name']}</td>
                        </tr>
                    ";

                    continue;
                }

                print "
                    <tr>
                        <td>{$assigned_workbench['workbench_id']}</td>
                        <td>{$assigned_user['first_name']} {$assigned_user['last_name']}</td>
                        <td>{$tacktime['tacktime']}</td>
                        <td>{$tacktime['temps_restant']}</td>
                        <td>{$tacktime['pieces_restantes']} / {$operation['quantity']}</td>
                        <td>{$assigned_product['name']}</td>
                    </tr>
                ";

            }   

        }

        /**
         * Retourne toutes les opérations associés à un numéro de commande spécifique
         *
         * @param integer $o_id
         * @return void
         */
        public function returnOperationFromOrderID(int $o_id)
        {

            return $this->request(
                'SELECT * FROM operation WHERE assigned_order = :id',
                array(
                    ':id' => $o_id
                )
            )->fetchAll();

        }

        /**
         * Ajouter une nouvelle opération
         *
         * @param integer $o_id
         * @param integer $quantity
         * @param integer $assigned_time
         * @return void
         */
        public function addNewOperation(int $o_id, int $quantity, int $assigned_time)
        {

            $this->request(
                'INSERT INTO operation (quantity, assigned_order, assigned_time) VALUES (:quantity, :order, :time)',
                array(
                    ':quantity' => $quantity,
                    ':order' => $o_id,
                    ':time' => $assigned_time
                )
            );

            /* $this->request(
                'SELECT '
            ) */

            $this->request(
                'UPDATE workbench SET assigned_operation = '
            );

        }

        /**
         * Retourne toutes les opétations
         *
         * @return array
         */
        private function mainForeachStatement()
        {

            return $this->request('SELECT * FROM operation')->fetchAll();

        }

        /**
         * Informations sur l'établi associé à une commande
         *
         * @param integer $w_id
         * @return void
         */
        private function assignedWorkbenchDetails(int $w_id)
        {

            return $this->request(
                'SELECT * FROM workbench WHERE assigned_operation = :id',
                array(
                    ':id' => $w_id
                )
            )->fetchAll();

        }

        /**
         * Retourne les utilisateurs associés a une opération
         *
         * @param integer $w_id
         * @return void
         */
        private function assignedUserDetails(int $w_id)
        {

                return $this->request(
                    'SELECT * FROM users WHERE assigned_workbench = :id',
                    array(
                        ':id' => $w_id
                    )
                )->fetch();

        }

        /**
         * Retourne les produits en fonction de leur ID propre
         *
         * @param integer $p_id
         * @return void
         */
        private function assignedProduct(int $p_id)
        {
                return $this->request(
                    'SELECT * FROM product WHERE product_id = :id',
                    array(
                        ':id' => $p_id
                    )
                )->fetch();

        }

        /**
         * Retourne le tacktime en fonction des différents paramètres inscrits
         *
         * @param string $create_date
         * @param string $assigned_time
         * @param integer $operation_id
         * @param integer $quantity
         * @param integer $ok_element
         * @return void
         */
        private function returnTackTime(string $create_date, string $assigned_time, int $operation_id, int $quantity, int $ok_element)
        {

            $d1 = new \DateTime(date('H:i:s'));
            $d2 = new \DateTime(date('H:i:s', strtotime($create_date . '+' . $assigned_time . 'minutes')));

            $interval = $d1->diff($d2);

            
            $temps_restant = "{$interval->h}:{$interval->i}:{$interval->s}";

            
            $heures_restantes = date('H', strtotime($temps_restant)) * 60;
            
            $pieces_restantes = $quantity - $ok_element;

            
            $tacktime = (date('i', strtotime($temps_restant)) + $heures_restantes) / $pieces_restantes;

            if ($d1 > $d2){
                $tacktime = '- ' . $tacktime;
            }

            

            return array(
                'tacktime' => $tacktime,
                'pieces_restantes' => $pieces_restantes,
                'temps_restant' => $temps_restant
            );

        }

    }

?>