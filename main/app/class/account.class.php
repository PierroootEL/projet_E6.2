<?php

    namespace App;

    class Account extends Database
    {

        public function returnAllUsers()
        {

            foreach($this->request(
                'SELECT user_id, last_name, first_name FROM users'
            )->fetchAll() as $account)
            {
                print "
                    <tr>
                        <td>{$account['last_name']}</td>
                        <td>{$account['first_name']}</td>
                        <td>{$account['user_id']}</td>
                        <td><a href=''></a> {$account['user_id']}</td>
                ";
            }

        }

    }

?>