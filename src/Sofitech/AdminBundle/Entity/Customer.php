<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Customer extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)")
     **/
    protected $company;

    /**
     * @ORM\OneToMany(targetEntity="Student", mappedBy="customer")
     **/
    private $students;

    public function __construct() {
        $this->students = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->company;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Person
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
