<?php
namespace Demos\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
* @ORM\Entity
* @ORM\Table(name="comments")
*/
class Comments {
     /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="string", length=128)
    */
    protected $name;
    
     /**
    * @ORM\Column(type="string", length=255)
    */
    protected $email;
    
    /**
    * @ORM\Column(type="text")
    */
    protected $description;
    
    /**
    * @ORM\Column(type="datetime")
    */
    protected $created_time;
    
    /**
    * @ORM\ManyToOne(targetEntity="Post", fetch="EAGER")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="post_id", referencedColumnName="id", nullable = false)
    * })
    */
    protected $post_id;
    
    protected $captcha;
    
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
     * @return Comments
     */
    public function setName($name)
    {
        $this->name = strip_tags($name);
    
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
     * Set email
     *
     * @param string $email
     * @return Comments
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Comments
     */
    public function setDescription($description)
    {
        $this->description = strip_tags($description);
    
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
     * Set created_time
     *
     * @param \DateTime $createdTime
     * @return Comments
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
     * Set post_id
     *
     * @param integer $postId
     * @return Comments
     */
    public function setPostId($postId)
    {
        $this->post_id = $postId;
    
        return $this;
    }

    /**
     * Get post_id
     *
     * @return integer
     */
    public function getPostId()
    {
        return $this->post_id;
    }
    
    public function getCaptcha()
    {
        return $this->captcha;
    }

    public function setCaptcha($captcha)
    {
        $this->captcha = $captcha;
    }
}