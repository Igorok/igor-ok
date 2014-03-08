<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project
 *
 * @author Garik
 */
namespace Demos\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="project")
* @FileStore\Uploadable
*/
class Project {
     /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $title;

    /**
    * @ORM\Column(type="text")
    */
    protected $description;

    /**
    * @ORM\Column(type="array")
    * @Assert\File( maxSize="5M")
    * @FileStore\UploadableField(mapping="projectimage")
    **/
    protected $image;

    /**
    * @ORM\Column(type="text")
    */
    protected $link;
    
    /**
    * @ORM\Column(type="datetime")
    */
    protected $created_time;
    
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
     * Set title
     *
     * @param string $title
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set contetn
     *
     * @param string $contetn
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get contetn
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param array $image
     * @return Project
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return array 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Project
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }
    
    /**
     * Set created_time
     *
     * @param \DateTime $createdTime
     * @return Project
     */
    public function setCreatedTime($createdTime)
    {
        $this->created_time = $createdTime;
    
        return $this;
    }

    /**
     * Get created_time
     *
     * @return \DateTime 
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }
    
}