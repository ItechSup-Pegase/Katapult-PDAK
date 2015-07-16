<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


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

    /**
     * @ORM\ManyToMany(targetEntity="Session", mappedBy="students")
     * cascade={"persist"}
     */
    protected $sessions;

    public function __construct(){
        $this->sessions = new ArrayCollection();
    }

    /**
     * Add sessions
     *
     * @param \Sofitech\AdminBundle\Entity\Session $sessions
     * @return Person
     */
    public function addSession(\Sofitech\AdminBundle\Entity\Session $sessions)
    {
        $this->sessions[] = $sessions;

        return $this;
    }

    /**
     * Remove sessions
     *
     * @param \Sofitech\AdminBundle\Entity\Session $sessions
     */
    public function removeSession(\Sofitech\AdminBundle\Entity\Session $sessions)
    {
        $this->sessions->removeElement($sessions);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    public function __toString()
    {
        return parent::getLastname();
    }

}
