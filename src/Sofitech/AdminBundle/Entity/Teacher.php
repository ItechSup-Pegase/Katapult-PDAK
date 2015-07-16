<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Teacher
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Teacher extends Person
{

	/**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="teacher")
     **/
    private $sessions;

    public function __construct() {
        $this->sessions = new ArrayCollection();
    }

    public function __toString()
    {
        return parent::getLastname();
    }



    // /**
    //  * Set session
    //  *
    //  * @param string $session
    //  * @return Person
    //  */
    // public function setSession($session)
    // {
    //     $this->session = $session;

    //     return $this;
    // }

    // /**
    //  * Get session
    //  *
    //  * @return string 
    //  */
    // public function getSession()
    // {
    //     return $this->session;
    // }



}
