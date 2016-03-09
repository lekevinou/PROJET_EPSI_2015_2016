<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageDestinataire
 */
class MessageDestinataire
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idMessage;

    /**
     * @var integer
     */
    private $idDestinataire;


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
     * Set idMessage
     *
     * @param integer $idMessage
     * @return MessageDestinataire
     */
    public function setIdMessage($idMessage)
    {
        $this->idMessage = $idMessage;
    
        return $this;
    }

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
     * Set idDestinataire
     *
     * @param integer $idDestinataire
     * @return MessageDestinataire
     */
    public function setIdDestinataire($idDestinataire)
    {
        $this->idDestinataire = $idDestinataire;
    
        return $this;
    }

    /**
     * Get idDestinataire
     *
     * @return integer 
     */
    public function getIdDestinataire()
    {
        return $this->idDestinataire;
    }
}
