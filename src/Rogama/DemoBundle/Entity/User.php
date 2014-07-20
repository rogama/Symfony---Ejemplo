<?php

namespace Rogama\DemoBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface; 
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="admin_user")
 * @ORM\Entity()
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer $id
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)  
     * 
     */
    protected $username;    
    
    /**					
     * @ORM\Column(name="password",	type="string", length=255)     
     */
    
    protected $password; 
    /**
     * @ORM\Column(name="salt",	type="string", length=255)    
     */
    
    protected $salt;    
    /**     
     * @ORM\ManyToMany(targetEntity="Role")		
     * @ORM\JoinTable(name="user_role", joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}, inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")})    
     */
    protected $user_roles;    
    
    public function __construct(){
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();   
    }
    
    /** 
     * Get id    
     *     
     * @return integer
     */ 
    public function getId(){
        return $this->id;
    }
    
    /**     
     * Set username     
     *  
     * @param string $username     
     */
    public function setUsername($username){
        $this->username = $username;
    }
    
    /**  
     * Get username   
     *
     * @return string 
     */  
    public function getUsername(){
        return $this->username;   
    }

    /**
     * Set password  
     *  
     * @param string $password   
     */
    public function setPassword($password){
        $this->password = $password;  
    }
    
    /**
     * Get password 
     *  
     * @return string
     */
    public function getPassword(){
        return $this->password;
    }    
    /**
     * Set salt    
     *
     * @param string $salt   
     */ 
    public function setSalt($salt){
        $this->salt = $salt;  
    }   
    /**
     * Get salt
     *
     * @return string
     */ 
    public function getSalt(){
        return $this->salt; 
    }

    /**
     * Add user_roles
     *
     * @param Rogama\DemoBundle\Entity\Role $userRoles
     */
    public function addRole(\Rogama\DemoBundle\Entity\Role $userRoles){
        $this->user_roles[] = $userRoles;
    }
    public function setUserRoles($roles){
        $this->user_roles = $roles;
    }
    
    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles(){
        return $this->user_roles;
    }
    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection  
     */
    public function getRoles(){
        //return $this->user_roles->toArray();
        $roles = array();
        foreach ($this->userRoles as $role) {
            $roles[] = $role->getRole();
        }

        return $roles;
        //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array  
    }
    
    /**
     * Compares this user to another to determine if they are the same.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user){
        return md5($this->getUsername()) == md5($user->getUsername());
    }
    /**
     * Erases the user credentials.
     */ 
    public function eraseCredentials() {
    
    }

    /**
    * Serializes the content of the current User object
    * @return string
    */
    public function serialize()
    {
        return json_encode(
                array($this->username, $this->password, $this->salt,
                        $this->user_roles, $this->id));
    }

    /**
     * Unserializes the given string in the current User object
     * @param serialized
     */
    public function unserialize($serialized)
    {
        list($this->username, $this->password, $this->salt,
                        $this->user_roles, $this->id) = json_decode(
                $serialized);
    }  

}
