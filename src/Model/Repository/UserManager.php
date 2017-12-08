<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\User;
/*require_once 'lib/swift_required.php';*/

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

    /**
     * @param $login
     * @return mixed
     */
    public function getPassword($login)
    {
        $statement = $this->db->prepare('SELECT * FROM user WHERE login = :login');
        $statement->execute([
            ':login' => $login
        ]);
        return $statement->fetchObject(User::class);
    }

    /**
     * @param $password
     * @return mixed
     */
    public function getLogin($password) /*$password correspond à ce qu'on a dans le formulaire*/
    {
        $statement = $this->db->prepare('SELECT * FROM user WHERE password = :password');
        $statement->execute([
            ':password' => $password
        ]);
        return $statement->fetchObject(User::class);
    }


}