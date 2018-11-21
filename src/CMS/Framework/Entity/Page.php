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
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinColumns;


/**
 * @Entity
 * @Table(name="pages")
 */
class Page
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
    * @Column(name="title")  
    */
    protected $title;
    
    
   /** 
   * @Column(name="content")  
   */
   protected $content;
   
    /**
    * @var Site $site
    *
    * @ManyToOne(targetEntity="Site", inversedBy="pages", cascade={"persist", "merge"})
    * @JoinColumns({
    *  @JoinColumn(name="site_id", referencedColumnName="id")
    * })
    */
    private $site;
    
     
    /**
     * @param Site $site
     */
    public function setSite(Site $site)
    {
        $this->site = $site;
    }
 
    /**
     * @return Site $site
     */
    public function getSite()
    {
        return $this->site;
    }
}