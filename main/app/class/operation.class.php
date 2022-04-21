<?php

    namespace App;

    class Operation extends Database
    {

        public function returnAllOperations()
        {

            foreach ($this->request(
                'SELECT * FROM users LEFT JOIN workbench ON users.assigned_workbench = workbench.workbench_id LEFT JOIN operation ON workbench.assigned_operation = operation.operation_id LEFT JOIN product ON operation.product_value = product.product_id'
            )->fetchAll() as $operation){
                $tacktime = $operation['assigned_time'] / $operation['quantity'];
               print "
                <tr>
                    <td>{$operation['workbench_id']}</td>        
                    <td>{$operation['username']}</td>        
                    <td>" . round($tacktime, 2) . " par pièce</td>        
                    <td>{$operation['assigned_time']}</td>        
                    <td>{$operation['ok_element']} / {$operation['quantity']}</td>        
                    <td>{$operation['name']}</td>        
                </tr>
               ";
            }

        }

    }

?>