<?php

    namespace App;

    class Workbench extends Database
    {

        public function returnAllWorkbenchNoHTML()
        {

            return $this->request('SELECT * FROM workbench');
        
        }

        public function returnAllWorkbench()
        {

            foreach ($this->request(
                'SELECT * FROM workbench'
            ) as $workbench){
                print "
                <tr>
                    <td>N°{$workbench['workbench_id']}</td>
                    <td>{$workbench['workbench_name']}</td>
                    <td><a href='/edit.workbench.php?id={$workbench['workbench_id']}'>Modifier</a></td>
                    <td><a href='/delete.php?type=bench&id={$workbench['workbench_id']}'>Supprimer</a><td>
                </tr>
                ";
            }

        }

        public function returnAssignedWorkbench(string $username)
        {

            return $this->request(
                'SELECT workbench_id, workbench_name FROM workbench LEFT JOIN users ON workbench.workbench_id = users.assigned_workbench WHERE username = :username',
                array(
                    ':username' => $username
                )
            )->fetch() ?: print "Non renseigné";

        }

        public function returnProductAssignedByOperationID(int $o_id)
        {

            return $this->request(
                'SELECT name FROM workbench LEFT JOIN product ON workbench.assigned_product = product.product_id WHERE assigned_operation = :id',
                array(
                    ':id' => $o_id
                )
            )->fetch()['name'];

        }

        public function addWorkbench(string $fonction)
        {

            return $this->request(
                'INSERT INTO workbench (workbench_name) VALUES (:w)',
                array(
                    ':w' => $fonction
                )
            );

        }

        public function deleteWorkbench(int $id)
        {

            $this->request(
                'DELETE FROM workbench WHERE workbench_id = :id',
                array(
                    ':id' => $id
                )
            );

        }

        public function returnSelectionForm()
        {
            foreach ($this->returnAllWorkbenchNoHTML() as $workbench) {
                print "<option name='workbench' value='{$workbench['workbench_id']}'>{$workbench['workbench_id']} : {$workbench['workbench_name']}</option>";
            }
        }

    }

?>