<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Student extends Person
{
 
	/**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="students")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    private $customer;

    /**
     * Set customer
     *
     * @param string $customer
     * @return Person
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return string 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

}
