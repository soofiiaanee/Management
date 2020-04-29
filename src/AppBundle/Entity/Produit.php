<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeProduit", inversedBy="produits",cascade={"persist"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true)
     */
    private $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Marque", inversedBy="produits",cascade={"persist"})
     * @ORM\JoinColumn(name="marque_id", referencedColumnName="id", nullable=true)
     */
    private $marque;
    
    
    /**
    * @ORM\Column(name="libelle", type="string", length=255 ,nullable=true)
    */
    protected $libelle;
    
    /**
    * @ORM\Column(name="reference", type="string", length=255 ,nullable=true)
    */
    protected $reference;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix_achat", type="float")
     */
    private $prixAchat;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix_vente", type="float")
     */
    private $prixVente;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer",nullable=true)
     */
    private $quantite;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ElementAchat", mappedBy="produit", cascade={"all"})
     */
    private $elementAchat;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ElementVente", mappedBy="produit", cascade={"all"})
     */
    private $elementVente;
    
    
    
    public function __construct()
    {
    }
    
    public function __toString() {
    if(is_null($this->reference)) {
        return 'NULL';
    }
    return $this->reference;
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Produit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set prixAchat
     *
     * @param float $prixAchat
     *
     * @return Produit
     */
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    /**
     * Get prixAchat
     *
     * @return float
     */
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * Set prixVente
     *
     * @param float $prixVente
     *
     * @return Produit
     */
    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    /**
     * Get prixVente
     *
     * @return float
     */
    public function getPrixVente()
    {
        return $this->prixVente;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\TypeProduit $type
     *
     * @return Produit
     */
    public function setType(\AppBundle\Entity\TypeProduit $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\TypeProduit
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set marque
     *
     * @param \AppBundle\Entity\Marque $marque
     *
     * @return Produit
     */
    public function setMarque(\AppBundle\Entity\Marque $marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \AppBundle\Entity\Marque
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Produit
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
     * Add elementAchat
     *
     * @param \AppBundle\Entity\ElementAchat $elementAchat
     *
     * @return Produit
     */
    public function addElementAchat(\AppBundle\Entity\ElementAchat $elementAchat)
    {
        $this->elementAchat[] = $elementAchat;

        return $this;
    }

    /**
     * Remove elementAchat
     *
     * @param \AppBundle\Entity\ElementAchat $elementAchat
     */
    public function removeElementAchat(\AppBundle\Entity\ElementAchat $elementAchat)
    {
        $this->elementAchat->removeElement($elementAchat);
    }

    /**
     * Get elementAchat
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElementAchat()
    {
        return $this->elementAchat;
    }

    /**
     * Add elementVente
     *
     * @param \AppBundle\Entity\ElementVente $elementVente
     *
     * @return Produit
     */
    public function addElementVente(\AppBundle\Entity\ElementVente $elementVente)
    {
        $this->elementVente[] = $elementVente;

        return $this;
    }

    /**
     * Remove elementVente
     *
     * @param \AppBundle\Entity\ElementVente $elementVente
     */
    public function removeElementVente(\AppBundle\Entity\ElementVente $elementVente)
    {
        $this->elementVente->removeElement($elementVente);
    }

    /**
     * Get elementVente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElementVente()
    {
        return $this->elementVente;
    }
}
