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
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Aspi\CMS\Framework\Repository\SiteRepository")
 * @Table(name="sites")
 */
class Site
{
	
	// Site status constants.
	const STATUS_DRAFT       = 1; // Draft.
	const STATUS_PUBLISHED   = 2; // Published.
    /**
     * @var integer
     *
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    /** 
    * @Column(name="status", type="integer")  
    */
    protected $status;
    
    /**
    * @var string
    *
    * @Column(name="domain_name", type="string", length=255, nullable=false)
    */
    protected $domainName;

    /** 
    * @Column(name="routing", type="text")  
    */
    protected $routing;

    /** 
    * @Column(name="hook", type="text")  
    */
    protected $hook;


     /**
     * Many Features have One Product.
     * @ManyToOne(targetEntity="Theme", inversedBy="sites")
     * @JoinColumn(name="theme_id", referencedColumnName="id")
     */
    private $theme;
    
    
    /**
     * Many Features have One Product.
     * @ManyToOne(targetEntity="Ip", inversedBy="sites")
     * @JoinColumn(name="ip_id", referencedColumnName="id")
     */
    private $siteIp;
    
     /**
    * @var ArrayCollection $pages
    *
    * @OneToMany(targetEntity="Page", mappedBy="sites", cascade={"persist", "remove", "merge"})
    */
    private $pages;
    
    public function __construct() {
        $this->pages = new ArrayCollection();
    }
        
    // Returns ID of this site.
    public function getId(): integer
    {
        return $this->id;
    }

     // Returns status of this site.
     public function getStatus(): integer
     {
         return $this->status;
     }
 
     // Sets status of this site.
     public function setStatus($status) 
     {
         $this->status = $status;
     }
     
    // Returns domainname of this site.
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    // Sets domainname of this site.
    public function setDomainName($domainName) 
    {
        $this->domainName = $domainName;
    }
    
    // Sets theme of this site.
    public function setTheme($theme) 
    {
        $this->theme = $theme;
    }

     // Returns theme of this site.
     public function getTheme(): integer
     {
         return $this->theme;
     }
     
    // Returns routing of this site.
    public function getRouting(): string
    {
        return $this->routing;
    }
    
    // Sets routing of this site.
    public function setRouting($routing) 
    {
        $this->routing = $routing;
    }
     // Returns hook of this site.
     public function getHook(): string
     {
         return $this->hook;
     }
     
     // Sets routing of this site.
     public function setHook($hook) 
     {
         $this->hook = $hook;
     }



}