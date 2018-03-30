<?php

namespace DatabaseBundle\Entity;

/**
 * Filieres
 */
class Filieres
{
    /**
     * @var string
     */
    private $designation;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Filieres
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
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
}
