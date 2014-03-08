<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Garik
 */
namespace Demos\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;


/**
* @ORM\Entity
* @ORM\Table(name="post")
* @FileStore\Uploadable
*/
class Post {
     /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="string", length=128)
    */
    protected $title;
    
     /**
    * @ORM\Column(type="string", unique=true, length=128)
    */
    protected $post_url;
    
     /**
    * @ORM\Column(type="string", length=255)
    */
    protected $meta_keywords;
    
     /**
    * @ORM\Column(type="string", length=255)
    */
    protected $meta_description;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $short_description;
    
    /**
    * @ORM\Column(type="text")
    */
    protected $description;

    /**
    * @ORM\Column(type="array")
    * @Assert\File( maxSize="5M")
    * @FileStore\UploadableField(mapping="image")
    **/
    protected $image;

    /**
    * @ORM\Column(type="datetime")
    */
    protected $created_time;
    
    /**
    * @ORM\ManyToOne(targetEntity="Status", fetch="EAGER")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
    * })
    */
    protected $status_id;
    
    
    /**
    * @ORM\OneToMany(targetEntity="Comments", mappedBy="post_id")
    * @ORM\OrderBy({"created_time" = "DESC"})
    */
    protected $postComments;
    
    function __construct()
    {
        $this->postComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Post
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
     * Set post_url
     *
     * @param string $post_url
     * @return Post
     */
    public function setPostUrl($post_url)
    {
        $this->post_url = $post_url;
    
        return $this;
    }

    /**
     * Get post_url
     *
     * @return string 
     */
    public function getPostUrl()
    {
        return $this->post_url;
    }

    /**
     * Set meta_keywords
     *
     * @param string $metaKeywords
     * @return Post
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get meta_keywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     * @return Post
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;
    
        return $this;
    }

    /**
     * Get meta_description
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set short_description
     *
     * @param string $shortDescription
     * @return Post
     */
    public function setShortDescription($shortDescription)
    {
        $this->short_description = $shortDescription;
    
        return $this;
    }

    /**
     * Get short_description
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->short_description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Post
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
     * Set image
     *
     * @param array $image
     * @return Post
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
     * Set created_time
     *
     * @param \DateTime $createdTime
     * @return Post
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

    /**
     * Set status_id
     *
     * @param integer $statusId
     * @return Post
     */
    public function setStatusId($statusId)
    {
        $this->status_id = $statusId;
    
        return $this;
    }

    /**
     * Get status_id
     *
     * @return integer 
     */
    public function getStatusId()
    {
        return $this->status_id;
    }
    
    
    function __toString()
    {
      return $this->getTitle();
    }

    /**
     * Get postComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostComments()
    {
        return $this->postComments;
    }
}