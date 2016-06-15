<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * VilleUnite
 */
class VilleUnite
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idVille;

    /**
     * @var integer
     */
    private $idUnite;

    /**
     * @var integer
     */
    private $idNombreUnite;


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
     * Set idVille
     *
     * @param integer $idVille
     * @return VilleUnite
     */
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    
        return $this;
    }

    /**
     * Get idVille
     *
     * @return integer 
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * Set idUnite
     *
     * @param integer $idUnite
     * @return VilleUnite
     */
    public function setIdUnite($idUnite)
    {
        $this->idUnite = $idUnite;
    
        return $this;
    }

    /**
     * Get idUnite
     *
     * @return integer 
     */
    public function getIdUnite()
    {
        return $this->idUnite;
    }

    /**
     * Set idNombreUnite
     *
     * @param integer $idNombreUnite
     * @return VilleUnite
     */
    public function setIdNombreUnite($idNombreUnite)
    {
        $this->idNombreUnite = $idNombreUnite;
    
        return $this;
    }

    /**
     * Get idNombreUnite
     *
     * @return integer 
     */
    public function getIdNombreUnite()
    {
        return $this->idNombreUnite;
    }
}
