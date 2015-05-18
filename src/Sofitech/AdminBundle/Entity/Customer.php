<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Customer extends Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="billingadress", type="object")
     */
    private $billingadress;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="company", type="object")
     */
    private $company;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return parent::getId();
    }

    /**
     * Set billingadress
     *
     * @param \stdClass $billingadress
     * @return Customer
     */
    public function setBillingadress($billingadress)
    {
        $this->billingadress = $billingadress;

        return $this;
    }

    /**
     * Get billingadress
     *
     * @return \stdClass 
     */
    public function getBillingadress()
    {
        return $this->billingadress;
    }

    /**
     * Set company
     *
     * @param \stdClass $company
     * @return Customer
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \stdClass 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
