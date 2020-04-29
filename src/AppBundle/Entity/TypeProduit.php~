<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="type_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeProduitRepository")
 */
class TypeProduit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
    * @ORM\Column(name="type", type="string", length=255 ,nullable=false)
    */
    protected $type;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Produit", mappedBy="type", cascade={"all"})
     */
    private $produits;
    
    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }
    
    public function __toString() {
    if(is_null($this->type)) {
        return 'NULL';
    }
    return $this->type;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return TypeProduit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return TypeProduit
     */
    public function addProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Produit $produit
     */
    public function removeProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
