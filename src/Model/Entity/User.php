<?php

namespace Weasley\Model\Entity;

/**
 * Class User
 * @package Weasley\Model\Entity
 */
class User
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;


    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

}