<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\User;

/**
 * Class UserManager
 * @package MyApp\Repository
 */
class UserManager extends EntityManager
{
    /**
     * Get all user
     * @return array
     */
    public function getUser()
    {
        $statement = $this->db->query('SELECT * FROM user');
        return $statement->fetchObject(User::class);
    }

    /**
     * Get one user
     * @param $id int
     * @return mixed
     */
    public function getOne($id)
    {
        $statement = $this->db->prepare("SELECT * FROM user WHERE id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->fetch();
    }

}