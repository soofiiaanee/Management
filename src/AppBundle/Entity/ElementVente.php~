<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="element_vente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ElementVenteRepository")
 */
class ElementVente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit", inversedBy="elementsVente",cascade={"persist"})
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vente", inversedBy="elements",cascade={"persist"})
     * @ORM\JoinColumn(name="id_vente", referencedColumnName="id", nullable=true)
     */
    private $vente;


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
     * @return ElementVente
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
     * @return ElementVente
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
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return ElementVente
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

    /**
     * Set vente
     *
     * @param \AppBundle\Entity\Vente $vente
     *
     * @return ElementVente
     */
    public function setVente(\AppBundle\Entity\Vente $vente = null)
    {
        $this->vente = $vente;

        return $this;
    }

    /**
     * Get vente
     *
     * @return \AppBundle\Entity\Vente
     */
    public function getVente()
    {
        return $this->vente;
    }
}
