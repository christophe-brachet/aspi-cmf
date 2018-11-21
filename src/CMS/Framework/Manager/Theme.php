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


namespace Aspi\CMS\Framework\Manager;
use \Pimple\Container;

class Theme
{
    private $container = null;
    private $theme = null;
    public function __construct(Container $container)
    {
        
        $this->container = $container;
    }
    public function copyDirectory()
    {
        if($this->theme != null)
        {

            $sourceDir =  __DIR__.'/../../../../src/CMS/Themes/'.$this->container['theme'].'/templates';
            if(file_exists($sourceDir))
            {
                $directoryIterator = new \RecursiveDirectoryIterator($sourceDir, \RecursiveDirectoryIterator::SKIP_DOTS);
                $iterator = new \RecursiveIteratorIterator($directoryIterator, \RecursiveIteratorIterator::SELF_FIRST);
                foreach ($iterator as $item)
                {
                    if (!$item->isDir()&&!($item->getFileName()=='.DS_Store'))
                    {
                        $blob = file_get_contents($item->getRealpath());
                        $this->container['TemplateManager']->add($iterator->getSubPathName(),$blob,$this->theme);
                    }
                }
            }
        }  
    }
    public function createTheme() {
        if($this->container['theme'] != null)
        {
            //Create Default Theme
            $this->theme = new   \Aspi\CMS\Framework\Entity\Theme();
            $this->theme->setName($this->container['theme']);
            $this->container['em']->persist($this->theme);
            $this->container['em']->flush();
            $this->copyDirectory();
        }
        return $this->theme;
     
    }
}