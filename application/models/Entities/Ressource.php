<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ressource
 */
class Ressource
{
    /**
     * @var integer
     */
    private $idRessource;

    /**
     * @var string
     */
    private $nomRessource;


    /**
     * Get idRessource
     *
     * @return integer 
     */
    public function getIdRessource()
    {
        return $this->idRessource;
    }

    /**
     * Set nomRessource
     *
     * @param string $nomRessource
     * @return Ressource
     */
    public function setNomRessource($nomRessource)
    {
        $this->nomRessource = $nomRessource;
    
        return $this;
    }

    /**
     * Get nomRessource
     *
     * @return string 
     */
    public function getNomRessource()
    {
        return $this->nomRessource;
    }
}
