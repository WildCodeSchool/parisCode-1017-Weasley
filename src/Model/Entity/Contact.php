<?php

namespace Weasley\Model\Entity;

/**
 * Class User
 * @package Weasley\Model\Entity
 */
class Contact
{
    /**
 * @var string
 */
    private $adresse;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @return string
     */

    private $ouverture;


    private $commentaire;
    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getOuverture()
    {
        return $this->ouverture;
    }

    /**
     * @param mixed $ouverture
     */
    public function setOuverture($ouverture)
    {
        $this->ouverture = $ouverture;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

}