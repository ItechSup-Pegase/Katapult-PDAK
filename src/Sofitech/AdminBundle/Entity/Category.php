<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Sofitech\AdminBundle\Entity\CategoryRepository")
 *
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentCategory")
     **/
    protected $childrenCategory;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="childrenCategory")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    protected $parentCategory;

    /**
     * @ORM\OneToMany(targetEntity="Formation", mappedBy="category")
     * cascade={"persist"}
     */
    protected $formations;

    public function __construct(){
        $this->childrenCategory = new ArrayCollection();
        $this->formations = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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
     * @return Category
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
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    public function setParentCategory( Category $parent = NULL )
    {
        $this->parentCategory = $parent;

        return $this;
    }

    public function getChildrenCategory()
    {
        return $this->childrenCategory;
    }

    public function setChildrenCategory( ArrayCollection $children )
    {
        $this->childrenCategory= $children;

        return $this;
    }

     /**
     * Add formations
     *
     * @param \Sofitech\AdminBundle\Entity\Formation $formations
     * @return Category
     */
    public function addFormation(\Sofitech\AdminBundle\Entity\Formation $formations)
    {
        $this->formations[] = $formations;

        return $this;
    }

    /**
     * Remove formations
     *
     * @param \Sofitech\AdminBundle\Entity\Formation $formations
     */
    public function removeFormation(\Sofitech\AdminBundle\Entity\Formation $formations)
    {
        $this->formations->removeElement($formations);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormations()
    {
        return $this->formations;
    }

}