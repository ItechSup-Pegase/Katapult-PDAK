<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Adress
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Adress
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    protected $street;

    /**
     * @var string
     *
     * @ORM\Column(name="street2", type="string", length=255, nullable=true)
     */
    protected $street2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    protected $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    protected $country;

    /**
     * @ORM\ManyToMany(targetEntity="Person", mappedBy="adresses")
     * cascade={"persist"}
     */
    protected $persons;


    public function __toString(){
        return $this->city;
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
     * Set type
     *
     * @param string $type
     * @return Adress
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Adress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set street2
     *
     * @param string $street
     * @return Adress
     */
    public function setStreet2($street)
    {
        $this->street2 = $street;

        return $this;
    }

    /**
     * Get street2
     *
     * @return string 
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Adress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return Adress
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Adress
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * Set persons
     *
     * @param string $persons
     * @return Adress
     */
    public function setPersons($person)
    {
        $this->persons = $person;
        return $this;
    }
    /**
     * Get persons
     *
     * @return \stdClass 
     */
    public function getPersons()
    {
        return $this->persons;
    }
    /**
     * Add persons
     *
     * @param \Sofitech\AdminBundle\Entity\Person $persons
     * @return Adress
     */
    public function addPerson(\Sofitech\AdminBundle\Entity\Person $persons)
    {
        $this->persons[] = $persons;
        return $this;
    }
    /**
     * Remove persons
     *
     * @param \Sofitech\AdminBundle\Entity\Person $persons
     */
    public function removePerson(\Sofitech\AdminBundle\Entity\Person $persons)
    {
        $this->persons->removeElement($persons);
    }
}
