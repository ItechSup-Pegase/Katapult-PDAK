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
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     **/
    protected $company;

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
