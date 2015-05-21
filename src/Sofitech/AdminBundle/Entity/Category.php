<?php

namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @var \stdClass
     *
     * @ORM\Column(name="parentCategory", type="object", nullable=true)
     */
    protected $parentCategory = null;

    /**
     * @ORM\ManyToMany(targetEntity="Teacher", mappedBy="categories") 
     */
    protected $categories;

    public function __construct(){
        $this->categories = new ArrayCollection();
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

    /**
     * Set parentCategory
     *
     * @param \stdClass $parentCategory
     * @return Category
     */
    public function setParentCategory($parentCategory)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \stdClass 
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Add categories
     *
     * @param \Sofitech\AdminBundle\Entity\Teacher $categories
     * @return Category
     */
    public function addCategory(\Sofitech\AdminBundle\Entity\Teacher $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Sofitech\AdminBundle\Entity\Teacher $categories
     */
    public function removeCategory(\Sofitech\AdminBundle\Entity\Teacher $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
