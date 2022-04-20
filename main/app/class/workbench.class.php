<?php

    namespace App;

    class Workbench extends Database
    {

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