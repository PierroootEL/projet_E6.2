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
                if ($operation['ok_element'] >= $operation['quantity']){
                    $this->request(
                        'UPDATE operation SET status = 2 WHERE operation_id = :id',
                        array(
                            ':id' => $operation['operation_id']
                        )
                    );
                }

                if ($operation['status'] == '2'){
                    print "
                        <tr>
                            <td>{$operation['workbench_id']}</td>        
                            <td>{$operation['username']}</td>        
                            <td>Fini</td>        
                            <td>Fini</td>        
                            <td>{$operation['ok_element']} / {$operation['quantity']}</td>        
                            <td>{$operation['name']}</td>
                        </tr>
                    ";

                    continue;
                }

                if ($operation['status'] == '3'){
                    print "
                        <tr>
                            <td>{$operation['workbench_id']}</td>        
                            <td>{$operation['username']}</td>        
                            <td>En retard</td>        
                            <td>En retard</td>        
                            <td>{$operation['ok_element']} / {$operation['quantity']}</td>        
                            <td>{$operation['name']}</td>
                        </tr>
                    ";

                    continue;
                }

                $d1 = new \DateTime(date('H:i:s'));
                $d2 = new \DateTime(date('H:i:s', strtotime($operation['create_date'] . '+' . $operation['assigned_time'] . 'minutes')));

                if ($d1 > $d2){
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
                    $this->request(
                        'UPDATE operation SET status = 3 WHERE operation_id = :id',
                        array(
                            ':id' => $operation['operation_id']
                        )
                    );
                }

                print "
                <tr>
                    <td>{$operation['workbench_id']}</td>        
                    <td>{$operation['username']}</td>        
                    <td>" . round($tacktime, 2) . " minutes par pièce</td>        
                    <td>{$temps_restant}</td>        
                    <td>{$operation['ok_element']} / {$operation['quantity']}</td>        
                    <td>{$operation['name']}</td>
                </tr>
               ";
            }

        }

    }

?>