<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="Adress", inversedBy="companies") 
     * @ORM\JoinTable(name="companies_adresses")
     */
    protected $adresses;

    public function __construct(){
        $this->adresses = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add adresses
     *
     * @param \Sofitech\AdminBundle\Entity\Adress $adresses
     * @return Company
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

    public function __toString(){
        return $this->name;
    }
}
