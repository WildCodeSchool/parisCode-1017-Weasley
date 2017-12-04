<?php

namespace Weasley\Model\Repository;

use PDO;
use Weasley\Model\Entity\User;
require_once 'lib/swift_required.php';

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

//    public function sendMessage(){
//
//    // Create the mail transport configuration
//    $transport = Swift_MailTransport::newInstance();
//
//    // Create the message
//    $message = \Swift_Message::newInstance()
//        ->setSubject('validation de votre mail')
//        ->setFrom('$user')
//        ->setTo('elisaratcha@gmail.com')
//        ->setCharset('utf-8')
//        ->setContentType('text/html')
//        ->setBody($this->renderView('merci pour votre message!'));
//    $this->get('mailer')->send($message);
//}



}