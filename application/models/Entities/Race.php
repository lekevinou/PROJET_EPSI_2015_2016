<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 */
class Race
{
    /**
     * @var integer
     */
    private $idRace;

    /**
     * @var string
     */
    private $nomRace;

    /**
     * @var string
     */
    private $descriptionRace;


    /**
     * Get idRace
     *
     * @return integer 
     */
    public function getIdRace()
    {
        return $this->idRace;
    }

    /**
     * Set nomRace
     *
     * @param string $nomRace
     * @return Race
     */
    public function setNomRace($nomRace)
    {
        $this->nomRace = $nomRace;
    
        return $this;
    }

    /**
     * Get nomRace
     *
     * @return string 
     */
    public function getNomRace()
    {
        return $this->nomRace;
    }

    /**
     * Set descriptionRace
     *
     * @param string $descriptionRace
     * @return Race
     */
    public function setDescriptionRace($descriptionRace)
    {
        $this->descriptionRace = $descriptionRace;
    
        return $this;
    }

    /**
     * Get descriptionRace
     *
     * @return string 
     */
    public function getDescriptionRace()
    {
        return $this->descriptionRace;
    }
}
