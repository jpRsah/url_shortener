<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as AcmeAssert;

class Url
{
    /**
     * @AcmeAssert\Brokenlink
     */
    protected $url;
    

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 20,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @AcmeAssert\HasInBD
     */
    protected $shortcut;
   

    public function getShortcut()
    {
        return $this->shortcut;
    }

    public function setShortcut($shortcut)
    {
        $this->shortcut = $shortcut;
    }
}