<?php
namespace Demos\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="blog_image")
* @FileStore\Uploadable
*/
class BlogImage {
     /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="array")
    * @Assert\File( maxSize="5M")
    * @FileStore\UploadableField(mapping="image")
    **/
    protected $image;

    /**
    * @ORM\Column(type="datetime", nullable=true)
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
     * Set image
     *
     * @param array $image
     * @return BlogImage
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
     * @return BlogImage
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