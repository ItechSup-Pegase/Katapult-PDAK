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
     *
     * @ORM\OneToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return parent::getId();
    }




}
