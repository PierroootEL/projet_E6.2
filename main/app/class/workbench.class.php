<?php

    namespace App;

    class Workbench extends Database
    {

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
                    <td><a href='/edit.workbench.php?id={$workbench['workbench_id']}'>Supprimer</a></td>
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

    }

?>