<?php
// Bundle/Entity/Enquiry.php &&&&&&&&&&&&&&&&?????????????????

namespace AppBundle\Entity;


class Enquiry
{
    protected $url;

    protected $shortcut;

    protected $datetime;


    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getShortcut()
    {
        return $this->shortcut;
    }

    /**
     * @param mixed $shortcut
     */
    public function setShortcut($shortcut)
    {
        $this->shortcut = $shortcut;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

}