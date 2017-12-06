<?php

namespace Weasley\Model\Entity;

/**
 * Class Product
 * @package Weasley\Model\Entity
 */
class Product
{
    /**
 * @var string
 */

    private $idProduit;

    private $descriptionProduit;

    private $nomProduit;

    private $imageUrl;

    private $catProduit;


    /**
     * @return string
     */
    public function getIdProduit(): string
    {
        return $this->idProduit;
    }


    /**
     * @return mixed
     */
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    /**
     * @param mixed $description_produit
     */
    public function setDescriptionProduit($descriptionProduit)
    {
        $this->descriptionProduit = $descriptionProduit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @param mixed $nom_produit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $image_url
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getCatProduit()
    {
        return $this->catProduit;
    }


}