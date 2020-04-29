<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FournisseurRepository")
 */
class Fournisseur
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
    * @ORM\Column(name="nom", type="string", length=255 ,nullable=true)
    */
    protected $nom;
    
    
    /**
    * @ORM\Column(name="prenom", type="string", length=255 ,nullable=true)
    */
    protected $prenom;
    
    /**
    * @ORM\Column(name="societe", type="string", length=255 ,nullable=true)
    */
    protected $societe;
    
    /**
    * @ORM\Column(name="code", type="string", length=255 ,nullable=true)
    */
    protected $code;
    
    /**
    * @ORM\Column(name="tel", type="string", length=255 ,nullable=true)
    */
    protected $tel;
    
    /**
    * @ORM\Column(name="email", type="string", length=255 ,nullable=true)
    */
    protected $email;
    
    /**
    * @ORM\Column(name="adresse", type="text", length=255 ,nullable=true)
    */
    protected $adresse;
    
    /**
    * @ORM\Column(name="siteweb", type="string", length=255 ,nullable=true)
    */
    protected $siteWeb;
    
    /**
    * @ORM\Column(name="type", type="string", length=255 ,nullable=true)
    */
    private $type;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Achat", mappedBy="fournisseur", cascade={"all"})
     */
    private $achats;
    

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->achats= new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
    if(is_null($this->societe)) {
        return 'NULL';
    }
    return $this->societe;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Fournisseur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Fournisseur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return Fournisseur
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Fournisseur
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Fournisseur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Fournisseur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Fournisseur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Fournisseur
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }
    /**
     * Add achat
     *
     * @param \AppBundle\Entity\Achat $achat
     *
     * @return Fournisseur
     */
    public function addAchat(\AppBundle\Entity\Achat $achat)
    {
        $this->achats[] = $achat;

        return $this;
    }

    /**
     * Remove achat
     *
     * @param \AppBundle\Entity\Achat $achat
     */
    public function removeAchat(\AppBundle\Entity\Achat $achat)
    {
        $this->achats->removeElement($achat);
    }

    /**
     * Get achats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAchats()
    {
        return $this->achats;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Fournisseur
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
}
