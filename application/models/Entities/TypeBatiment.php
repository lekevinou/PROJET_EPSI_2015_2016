<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeBatiment
 */
class TypeBatiment
{
    /**
     * @var integer
     */
    private $idTypeBatiment;

    /**
     * @var string
     */
    private $nomBatiment;


    /**
     * Get idTypeBatiment
     *
     * @return integer 
     */
    public function getIdTypeBatiment()
    {
        return $this->idTypeBatiment;
    }

    /**
     * Set nomBatiment
     *
     * @param string $nomBatiment
     * @return TypeBatiment
     */
    public function setNomBatiment($nomBatiment)
    {
        $this->nomBatiment = $nomBatiment;
    
        return $this;
    }

    /**
     * Get nomBatiment
     *
     * @return string 
     */
    public function getNomBatiment()
    {
        return $this->nomBatiment;
    }
}
