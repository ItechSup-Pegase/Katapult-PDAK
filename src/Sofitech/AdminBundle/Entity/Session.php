<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Session
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofitech\AdminBundle\Entity\SessionRepository")
 */
class Session
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate", type="datetime")
     */
    private $startdate;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;


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
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return Session
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Session
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Teacher", inversedBy="sessions")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     **/
    private $teacher;

    /**
     * Set teacher
     *
     * @param string $teacher
     * @return Session
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return string 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Student", inversedBy="sessions",cascade={"persist"}) 
     * @ORM\JoinTable(name="sessions_students")
     *
     */
    private $students;

    public function __construct(){
        $this->students = new ArrayCollection();
    }

    /**
     * Set students
     *
     * @param \stdClass $students
     * @return Fomation
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students
     *
     * @return \stdClass 
     */
    public function getStudents()
    {
        return $this->students;
    }
}
