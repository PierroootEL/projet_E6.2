<?php

    namespace App;

    class Account extends Database
    {

        public function returnAllUsers($search)
        {

            if ($search){
                foreach($this->request(
                    "SELECT user_id, last_name, first_name FROM users WHERE last_name LIKE ':a%'",
                    array(
                        ':a' => $_GET['search']
                    )
                )->fetchAll() as $account)
                {
                    print "
                    <tr>
                        <td>{$account['last_name']}</td>
                        <td>{$account['first_name']}</td>
                        <td>{$account['user_id']}</td>
                        <td><a href=''>{$account['user_id']}</a> </td>
                        <td><a href=''>Supprimer</a> </td>
                ";
                }
            }

            if (!$search) {
                foreach ($this->request(
                    'SELECT user_id, last_name, first_name FROM users'
                )->fetchAll() as $account) {
                    print "
                    <tr>
                        <td>{$account['last_name']}</td>
                        <td>{$account['first_name']}</td>
                        <td>{$account['user_id']}</td>
                        <td><a href=''>{$account['user_id']}</a></td>
                        <td><a href=''>Supprimer</a></td>
                ";
                }
            }

        }

    }

?>