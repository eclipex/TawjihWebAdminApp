<?php

namespace DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domaine
 *
 * @ORM\Table(name="domaine", uniqueConstraints={@ORM\UniqueConstraint(name="designation", columns={"designation_domaine"})})
 * @ORM\Entity
 */
class Domaine
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
     * @var string
     *
     * @ORM\Column(name="designation_domaine", type="string", length=255, nullable=false)
     */
    private $designationDomaine;



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
     * Set designationDomaine
     *
     * @param string $designationDomaine
     *
     * @return Domaine
     */
    public function setDesignationDomaine($designationDomaine)
    {
        $this->designationDomaine = $designationDomaine;

        return $this;
    }

    /**
     * Get designationDomaine
     *
     * @return string
     */
    public function getDesignationDomaine()
    {
        return $this->designationDomaine;
    }
}
