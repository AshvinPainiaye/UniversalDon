<?php

namespace Simplon\ActivitePartageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutDon
 *
 * @ORM\Table(name="statut_don")
 * @ORM\Entity(repositoryClass="Simplon\ActivitePartageBundle\Repository\StatutDonRepository")
 */
class StatutDon {

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
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    public $statut;

    /**
     * @ORM\ManyToOne(targetEntity="Dons", inversedBy="statut")
     */
    private $don;

    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="statut")
     */
    private $user;

   

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
     * Set statut
     *
     * @param string $statut
     *
     * @return StatutDon
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set don
     *
     * @param \Simplon\ActivitePartageBundle\Entity\Dons $don
     *
     * @return StatutDon
     */
    public function setDon(\Simplon\ActivitePartageBundle\Entity\Dons $don = null)
    {
        $this->don = $don;

        return $this;
    }

    /**
     * Get don
     *
     * @return \Simplon\ActivitePartageBundle\Entity\Dons
     */
    public function getDon()
    {
        return $this->don;
    }

    /**
     * Set user
     *
     * @param \Simplon\ActivitePartageBundle\Entity\Users $user
     *
     * @return StatutDon
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
}
