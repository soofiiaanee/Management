<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="element_achat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ElementAchatRepository")
 */
class ElementAchat
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit", inversedBy="elementsAchat",cascade={"persist"})
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id", nullable=true)
     */
    private $produit;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Achat", inversedBy="elements",cascade={"persist"})
     * @ORM\JoinColumn(name="id_achat", referencedColumnName="id", nullable=true)
     */
    private $achat;


    public function __construct()
    {  
        
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
     * Set prix
     *
     * @param float $prix
     *
     * @return ElementAchat
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return ElementAchat
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }


    /**
     * Set achat
     *
     * @param \AppBundle\Entity\Achat $achat
     *
     * @return ElementAchat
     */
    public function setAchat(\AppBundle\Entity\Achat $achat = null)
    {
        $this->achat = $achat;
        return $this;
    }

    /**
     * Get achat
     *
     * @return \AppBundle\Entity\Achat
     */
    public function getAchat()
    {
        return $this->achat;
    }


    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return ElementAchat
     */
    public function setProduit(\AppBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
