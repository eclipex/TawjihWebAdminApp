<?php

namespace DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diplome
 *
 * @ORM\Table(name="diplome", indexes={@ORM\Index(name="domaine", columns={"domaine"}), @ORM\Index(name="etablissement", columns={"etablissement"}), @ORM\Index(name="filiere", columns={"filiere"})})
 * @ORM\Entity
 */
class Diplome
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="bigint", nullable=false)
     */
    private $code;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer", nullable=false)
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domaine", referencedColumnName="id")
     * })
     */
    private $domaine;

    /**
     * @var \Etablissement
     *
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etablissement", referencedColumnName="id")
     * })
     */
    private $etablissement;

    /**
     * @var \Filiere
     *
     * @ORM\ManyToOne(targetEntity="Filiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="filiere", referencedColumnName="id")
     * })
     */
    private $filiere;



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
     * Set code
     *
     * @param integer $code
     *
     * @return Diplome
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return Diplome
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set capacite
     *
     * @param integer $capacite
     *
     * @return Diplome
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }

    /**
     * Get capacite
     *
     * @return integer
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * Set domaine
     *
     * @param \DatabaseBundle\Entity\Domaine $domaine
     *
     * @return Diplome
     */
    public function setDomaine(\DatabaseBundle\Entity\Domaine $domaine = null)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \DatabaseBundle\Entity\Domaine
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set etablissement
     *
     * @param \DatabaseBundle\Entity\Etablissement $etablissement
     *
     * @return Diplome
     */
    public function setEtablissement(\DatabaseBundle\Entity\Etablissement $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \DatabaseBundle\Entity\Etablissement
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set filiere
     *
     * @param \DatabaseBundle\Entity\Filiere $filiere
     *
     * @return Diplome
     */
    public function setFiliere(\DatabaseBundle\Entity\Filiere $filiere = null)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return \DatabaseBundle\Entity\Filiere
     */
    public function getFiliere()
    {
        return $this->filiere;
    }
    /**
     * @var \DatabaseBundle\Entity\Section
     */
    private $section;


    /**
     * Set section
     *
     * @param \DatabaseBundle\Entity\Section $section
     *
     * @return Diplome
     */
    public function setSection(\DatabaseBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \DatabaseBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }
}
