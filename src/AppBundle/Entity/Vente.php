<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="vente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VenteRepository")
 */
class Vente
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ElementVente", mappedBy="vente", cascade={"all"})
     */
    private $elements;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="ventes",cascade={"persist"})
     * @ORM\JoinColumn(name="id_client", referencedColumnName="id", nullable=true)
     */
    private $client;
    
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
    
    /**
     * @ORM\Column(name="paye", type="boolean")
     */
    private $paye;


    public function __construct()
    {  
        $this->elements= new \Doctrine\Common\Collections\ArrayCollection();
        $this->avance=0;
        $this->paye=false;
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
     * @return Vente
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
     * @return Vente
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
     * @param \AppBundle\Entity\ElementVente $element
     *
     * @return Vente
     */
    public function addElement(\AppBundle\Entity\ElementVente $element)
    {
        $this->elements[] = $element;

        return $this;
    }

    /**
     * Remove element
     *
     * @param \AppBundle\Entity\ElementVente $element
     */
    public function removeElement(\AppBundle\Entity\ElementVente $element)
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
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Vente
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }


    /**
     * Set total
     *
     * @param float $total
     *
     * @return Vente
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
     * @return Vente
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

    /**
     * Set paye
     *
     * @param boolean $paye
     *
     * @return Vente
     */
    public function setPaye($paye)
    {
        $this->paye = $paye;

        return $this;
    }

    /**
     * Get paye
     *
     * @return boolean
     */
    public function getPaye()
    {
        return $this->paye;
    }
}
