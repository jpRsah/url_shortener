<?php

// src/AppBundle/Entity/urlcontact.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="urlcontact")
 */
class Urlcontact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $url;

       public function getUrl()
        {
            return $this->url;
        }

        public function setUrl($url)
        {
            $this->url = $url;
        }


    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $shortcut;

        public function getShortcut()
        {
            return $this->shortcut;
        }

        public function setShortcut($shortcut)
        {
            $this->shortcut = $shortcut;
        }
    
   
    /**
     * @ORM\Column(type="datetime", name="date_time")
     */
    private $datetime;

        public function setDatetime()
        {
            //$this->datetime = date("Y-m-d H:i:s");
            $this->datetime = new \DateTime("now");
        }
        public function getDatetime()
        {
            return $this->datetime;
        }
}

