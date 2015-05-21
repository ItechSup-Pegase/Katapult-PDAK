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
    protected $billingadress;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="company", type="object")
     */
    protected $company;


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
    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var \DateTime
     */
    protected $birthdate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $adresses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Customer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Customer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Customer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Customer
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Add adresses
     *
     * @param \Sofitech\AdminBundle\Entity\Adress $adresses
     * @return Customer
     */
    public function addAdress(\Sofitech\AdminBundle\Entity\Adress $adresses)
    {
        $this->adresses[] = $adresses;

        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \Sofitech\AdminBundle\Entity\Adress $adresses
     */
    public function removeAdress(\Sofitech\AdminBundle\Entity\Adress $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
