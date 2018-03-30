<?php

namespace DatabaseBundle\Entity;

/**
 * Diplome
 */
class Diplome
{
    /**
     * @var integer
     */
    private $code;

    /**
     * @var integer
     */
    private $score;

    /**
     * @var integer
     */
    private $capacite;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DatabaseBundle\Entity\Etablissements
     */
    private $etablissement;

    /**
     * @var \DatabaseBundle\Entity\Filieres
     */
    private $filiere;

    /**
     * @var \DatabaseBundle\Entity\Domaine
     */
    private $domaine;


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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set etablissement
     *
     * @param \DatabaseBundle\Entity\Etablissements $etablissement
     *
     * @return Diplome
     */
    public function setEtablissement(\DatabaseBundle\Entity\Etablissements $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \DatabaseBundle\Entity\Etablissements
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set filiere
     *
     * @param \DatabaseBundle\Entity\Filieres $filiere
     *
     * @return Diplome
     */
    public function setFiliere(\DatabaseBundle\Entity\Filieres $filiere = null)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return \DatabaseBundle\Entity\Filieres
     */
    public function getFiliere()
    {
        return $this->filiere;
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
}

