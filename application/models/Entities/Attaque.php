<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attaque
 */
class Attaque
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idVilleAttaque;

    /**
     * @var integer
     */
    private $idVilleDefend;


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
     * Set idVilleAttaque
     *
     * @param integer $idVilleAttaque
     * @return Attaque
     */
    public function setIdVilleAttaque($idVilleAttaque)
    {
        $this->idVilleAttaque = $idVilleAttaque;
    
        return $this;
    }

    /**
     * Get idVilleAttaque
     *
     * @return integer 
     */
    public function getIdVilleAttaque()
    {
        return $this->idVilleAttaque;
    }

    /**
     * Set idVilleDefend
     *
     * @param integer $idVilleDefend
     * @return Attaque
     */
    public function setIdVilleDefend($idVilleDefend)
    {
        $this->idVilleDefend = $idVilleDefend;
    
        return $this;
    }

    /**
     * Get idVilleDefend
     *
     * @return integer 
     */
    public function getIdVilleDefend()
    {
        return $this->idVilleDefend;
    }
}
