<?php

namespace Simplon\ActivitePartageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Dons
 *
 * @ORM\Table(name="dons")
 * @ORM\Entity(repositoryClass="Simplon\ActivitePartageBundle\Repository\DonsRepository")
 * @Vich\Uploadable
 */
class Dons {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="don")
     * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     */
    private $user;

    
    

    /**
     * @ORM\OneToMany(targetEntity="StatutDon", mappedBy="don")
     */
    private $statut;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="don_acquis", type="string", length=255, nullable=true)
     */
    private $don_acquis;
    
    
    /**
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null) {
        $this->imageFile = $image;
        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile() {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName) {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName() {
        return $this->imageName;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->statut = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Dons
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dons
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Dons
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set donAcquis
     *
     * @param string $donAcquis
     *
     * @return Dons
     */
    public function setDonAcquis($donAcquis)
    {
        $this->don_acquis = $donAcquis;

        return $this;
    }

    /**
     * Get donAcquis
     *
     * @return string
     */
    public function getDonAcquis()
    {
        return $this->don_acquis;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Dons
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \Simplon\ActivitePartageBundle\Entity\Users $user
     *
     * @return Dons
     */
    public function setUser(\Simplon\ActivitePartageBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Simplon\ActivitePartageBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add statut
     *
     * @param \Simplon\ActivitePartageBundle\Entity\StatutDon $statut
     *
     * @return Dons
     */
    public function addStatut(\Simplon\ActivitePartageBundle\Entity\StatutDon $statut)
    {
        $this->statut[] = $statut;

        return $this;
    }

    /**
     * Remove statut
     *
     * @param \Simplon\ActivitePartageBundle\Entity\StatutDon $statut
     */
    public function removeStatut(\Simplon\ActivitePartageBundle\Entity\StatutDon $statut)
    {
        $this->statut->removeElement($statut);
    }

    /**
     * Get statut
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
