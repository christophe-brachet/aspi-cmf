<?php
/*
*MIT License
*
*Copyright (c) 2018 Christophe Brachet
*
*Permission is hereby granted, free of charge, to any person obtaining a copy
*of this software and associated documentation files (the "Software"), to deal
*in the Software without restriction, including without limitation the rights
*to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
*copies of the Software, and to permit persons to whom the Software is
*furnished to do so, subject to the following conditions:
*
*The above copyright notice and this permission notice shall be included in all
*copies or substantial portions of the Software.
*
*THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
*IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
*AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
*OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
*SOFTWARE.
*
*
*/
declare(strict_types=1);

namespace Aspi\CMS\Framework\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Core\Application\Repository\UserRepository")
 * @Table(name="user")
 */
class User
{
    /**
     * @var integer
     *
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Column(name="name",type="string", length=64)
     */
    protected $name;

    /**
    * @var string
    * @Column(type="string", length=255, unique=true)
    */
    protected $email;

    /**
    * @var string
    * @Column(type="string", length=255)
    */
    protected $password;
    
    /**
    * @var string
    * @Column(type="text")
    */
    protected $imap_password;
  

     // Returns ID of this theme.
    public function getId(): integer
    {
        return $this->id;
    }

    // Sets ID of this theme.
    public function setId($id) 
    {
        $this->id = $id;
    }

    // Returns name of this theme.
    public function getName(): string
    {
        return $this->name;
    }

    // Sets name of this theme.
    public function setName($name) 
    {
        $this->name = $name;
    }
    
    //Returns Email of this user.
    public function getEmail()
    {
          return $this->email;
    }
          
    // Sets Email of this user.
    public function setEmail($email) 
    {
        $this->email = $email;
    }
    
    //Returns Password of this user.
    public function getPassword()
    {
         return $this->password;
    }
         
    // Sets Password of this user.
    public function setPassword($password) 
    {
         $this->password = $password;
    }
    
    //Returns Imap Password of this user.
    public function getImapPassword()
    {
           return $this->imap_password;
    }
           
    // Sets Imap Password of this user.
    public function setImapPassword($imap_password) 
    {
        $this->imap_password= $imap_password;
    }


 
}