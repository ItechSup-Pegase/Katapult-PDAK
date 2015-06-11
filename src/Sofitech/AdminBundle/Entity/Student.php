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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return parent::getId();
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection $adresses
     */
    public function getAdresses()
    {
        return parent::getAdresses();
    }




    


}
