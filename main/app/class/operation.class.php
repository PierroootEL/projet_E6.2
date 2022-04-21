<?php

    namespace App;

    use Cassandra\Time;

    class Operation extends Database
    {

        public function returnAllOperations()
        {

            foreach ($this->request(
                'SELECT * FROM users LEFT JOIN workbench ON users.assigned_workbench = workbench.workbench_id LEFT JOIN operation ON workbench.assigned_operation = operation.operation_id LEFT JOIN product ON operation.product_value = product.product_id'
            )->fetchAll() as $operation){

                print $operation['create_date'];
                print "<br>";
                print $operation['assigned_time'];
                $explode_date = explode(' ', date('H i s', strtotime($operation['create_date']) + strtotime($operation['assigned_time'])));
                $final_date = $explode_date[0]+3 . ':' . $explode_date[1] . ':' . $explode_date[2];
                print "<br> = ";
                print $final_date;
                $date = date('H i s');
                print ""
                $explode_date2 = explode(' ', date('H i s', strtotime($date) - strtotime($final_date)));
                print "<br>";
                print_r($explode_date2);

                // print $temps_restant = date('H:i:s', strtotime($final_date) - strtotime('H:i:s'));

               print "
                <tr>
                    <td>{$operation['workbench_id']}</td>        
                    <td>{$operation['username']}</td>        
                    <td>" . round($tacktime, 2) . " par pièce</td>        
                    <td>{$temps_restant}</td>        
                    <td>{$operation['ok_element']} / {$operation['quantity']}</td>        
                    <td>{$operation['name']}</td>
                </tr>
               ";
            }

        }

    }

?>