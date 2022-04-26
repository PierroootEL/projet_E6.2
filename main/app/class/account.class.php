<?php

    namespace App;

    class Account extends Database
    {

        public function returnAllUsers($search)
        {

            if ($search){
                foreach($this->request(
                    "SELECT * FROM users WHERE users.last_name LIKE ':a%'",
                    array(
                        ':a' => $search
                    )
                )->fetchAll() as $account)
                {
                    print "
                    <tr>
                        <td>{$account['last_name']}</td>
                        <td>{$account['first_name']}</td>
                        <td>{$account['user_id']}</td>
                        <td><a href='motdepasse.php?id={$account['user_id']}'>{$account['user_id']}</a></td>
                        <td><a href='delete.php?type=acc&id={$account['user_id']}'>Supprimer</a></td>
                    </tr>
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
                        <td><a href='motdepasse.php?id={$account['user_id']}'>Modifier</a></td>
                        <td><a href='delete.php?type=acc&id={$account['user_id']}'>Supprimer</a></td>
                    </tr>
                ";
                }
            }

        }

        public function deleteUser(int $id)
        {

            $this->request(
                'DELETE FROM users WHERE user_id = :id',
                array(
                    ':id' => $id
                )
            );

        }

    }

?>