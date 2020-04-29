<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="achat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AchatRepository")
 */
class Achat
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="cree_le",type="datetime", nullable=true)
     */
    private $creeLe;

    /**
     * @var \DateTime $updated
     *
     * @ORM\Column(name="modifie_le",type="datetime", nullable=true)
     */
    private $modifieLe;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ElementAchat", mappedBy="achat", cascade={"all"})
     */
    private $elements;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fournisseur", inversedBy="achats",cascade={"persist"})
     * @ORM\JoinColumn(name="id_fournisseur", referencedColumnName="id", nullable=true)
     */
    private $fournisseur;
    
    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;
    
    /**
     * @var float
     *
     * @ORM\Column(name="avance", type="float")
     */
    private $avance;


    public function __construct()
    {  
        $this->elements= new \Doctrine\Common\Collections\ArrayCollection();
        $this->avance=0;
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
     * Set creeLe
     *
     * @param \DateTime $creeLe
     *
     * @return Achat
     */
    public function setCreeLe($creeLe)
    {
        $this->creeLe = $creeLe;

        return $this;
    }

    /**
     * Get creeLe
     *
     * @return \DateTime
     */
    public function getCreeLe()
    {
        return $this->creeLe;
    }

    /**
     * Set modifieLe
     *
     * @param \DateTime $modifieLe
     *
     * @return Achat
     */
    public function setModifieLe($modifieLe)
    {
        $this->modifieLe = $modifieLe;

        return $this;
    }

    /**
     * Get modifieLe
     *
     * @return \DateTime
     */
    public function getModifieLe()
    {
        return $this->modifieLe;
    }

    /**
     * Add element
     *
     * @param \AppBundle\Entity\ElementAchat $element
     *
     * @return Achat
     */
    public function addElement(\AppBundle\Entity\ElementAchat $element)
    {
        $this->elements[] = $element;

        return $this;
    }

    /**
     * Remove element
     *
     * @param \AppBundle\Entity\ElementAchat $element
     */
    public function removeElement(\AppBundle\Entity\ElementAchat $element)
    {
        $this->elements->removeElement($element);
    }

    /**
     * Get elements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Set fournisseur
     *
     * @param \AppBundle\Entity\Fournisseur $fournisseur
     *
     * @return Achat
     */
    public function setFournisseur(\AppBundle\Entity\Fournisseur $fournisseur = null)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return \AppBundle\Entity\Fournisseur
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }


    /**
     * Set total
     *
     * @param float $total
     *
     * @return Achat
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set avance
     *
     * @param float $avance
     *
     * @return Achat
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;

        return $this;
    }

    /**
     * Get avance
     *
     * @return float
     */
    public function getAvance()
    {
        return $this->avance;
    }
}
