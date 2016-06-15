<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 */
class Message
{
    /**
     * @var integer
     */
    private $idMessage;

    /**
     * @var \DateTime
     */
    private $dateMessage;

    /**
     * @var integer
     */
    private $idExpediteurMessage;

    /**
     * @var string
     */
    private $objetMessage;

    /**
     * @var string
     */
    private $txtMessage;


    /**
     * Get idMessage
     *
     * @return integer 
     */
    public function getIdMessage()
    {
        return $this->idMessage;
    }

    /**
     * Set dateMessage
     *
     * @param \DateTime $dateMessage
     * @return Message
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;
    
        return $this;
    }

    /**
     * Get dateMessage
     *
     * @return \DateTime 
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set idExpediteurMessage
     *
     * @param integer $idExpediteurMessage
     * @return Message
     */
    public function setIdExpediteurMessage($idExpediteurMessage)
    {
        $this->idExpediteurMessage = $idExpediteurMessage;
    
        return $this;
    }

    /**
     * Get idExpediteurMessage
     *
     * @return integer 
     */
    public function getIdExpediteurMessage()
    {
        return $this->idExpediteurMessage;
    }

    /**
     * Set objetMessage
     *
     * @param string $objetMessage
     * @return Message
     */
    public function setObjetMessage($objetMessage)
    {
        $this->objetMessage = $objetMessage;
    
        return $this;
    }

    /**
     * Get objetMessage
     *
     * @return string 
     */
    public function getObjetMessage()
    {
        return $this->objetMessage;
    }

    /**
     * Set txtMessage
     *
     * @param string $txtMessage
     * @return Message
     */
    public function setTxtMessage($txtMessage)
    {
        $this->txtMessage = $txtMessage;
    
        return $this;
    }

    /**
     * Get txtMessage
     *
     * @return string 
     */
    public function getTxtMessage()
    {
        return $this->txtMessage;
    }
}
