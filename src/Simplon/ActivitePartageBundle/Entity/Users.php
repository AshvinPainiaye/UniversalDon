<?php

namespace Simplon\ActivitePartageBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="users")
*/
class Users extends BaseUser
{
  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  protected $id;

  /**
  * @var string
  *
  * @ORM\Column(name="Telephone", type="string", length=255)
  */
  private $telephone;

  /**
  * @var string
  *
  * @ORM\Column(name="Ville", type="string", length=255)
  */
  private $ville;

  /**
  * @var string
  *
  * @ORM\Column(name="Nom", type="string", length=255, nullable=true)
  */
  private $nom;

  /**
  * @var string
  *
  * @ORM\Column(name="Prenom", type="string", length=255, nullable=true)
  */
  private $prenom;

  /**
  * @var string
  *
  * @ORM\Column(name="association", type="string", length=255, nullable=true)
  */
  private $association;

  
  /**
  * @ORM\OneToMany(targetEntity="Dons", mappedBy="user")
  * @ORM\JoinColumn(name="dons_id", referencedColumnName="id")
  */
  private $don;


  /**
  * @ORM\OneToMany(targetEntity="StatutDon", mappedBy="user")
  */
  private $statut;

  public function __construct()
  {
    parent::__construct();
    // your own logic
  }



    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Users
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Users
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Users
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
     * @return Users
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
     * Set association
     *
     * @param string $association
     *
     * @return Users
     */
    public function setAssociation($association)
    {
        $this->association = $association;

        return $this;
    }

    /**
     * Get association
     *
     * @return string
     */
    public function getAssociation()
    {
        return $this->association;
    }

    /**
     * Add don
     *
     * @param \Simplon\ActivitePartageBundle\Entity\Dons $don
     *
     * @return Users
     */
    public function addDon(\Simplon\ActivitePartageBundle\Entity\Dons $don)
    {
        $this->don[] = $don;

        return $this;
    }

    /**
     * Remove don
     *
     * @param \Simplon\ActivitePartageBundle\Entity\Dons $don
     */
    public function removeDon(\Simplon\ActivitePartageBundle\Entity\Dons $don)
    {
        $this->don->removeElement($don);
    }

    /**
     * Get don
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDon()
    {
        return $this->don;
    }

    /**
     * Add statut
     *
     * @param \Simplon\ActivitePartageBundle\Entity\StatutDon $statut
     *
     * @return Users
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
