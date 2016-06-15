<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * JoueurVille
 */
class JoueurVille
{
    /**
     * @var integer
     */
    private $idVille;

    /**
     * @var integer
     */
    private $idJoueurFk;

    /**
     * @var string
     */
    private $nomVille;

    /**
     * @var integer
     */
    private $positionxVille;

    /**
     * @var integer
     */
    private $positionyVille;

    /**
     * @var integer
     */
    private $nombreBoisVille;

    /**
     * @var integer
     */
    private $nombreFerVille;

    /**
     * @var integer
     */
    private $nombrePierreVille;

    /**
     * @var integer
     */
    private $nombreNourritureVille;

    /**
     * @var integer
     */
    private $populationOccupeeVille;

    /**
     * @var integer
     */
    private $populationTotaleVille;

    /**
     * @var integer
     */
    private $populationMaxVille;


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
     * Set idJoueurFk
     *
     * @param integer $idJoueurFk
     * @return JoueurVille
     */
    public function setIdJoueurFk($idJoueurFk)
    {
        $this->idJoueurFk = $idJoueurFk;
    
        return $this;
    }

    /**
     * Get idJoueurFk
     *
     * @return integer 
     */
    public function getIdJoueurFk()
    {
        return $this->idJoueurFk;
    }

    /**
     * Set nomVille
     *
     * @param string $nomVille
     * @return JoueurVille
     */
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;
    
        return $this;
    }

    /**
     * Get nomVille
     *
     * @return string 
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * Set positionxVille
     *
     * @param integer $positionxVille
     * @return JoueurVille
     */
    public function setPositionxVille($positionxVille)
    {
        $this->positionxVille = $positionxVille;
    
        return $this;
    }

    /**
     * Get positionxVille
     *
     * @return integer 
     */
    public function getPositionxVille()
    {
        return $this->positionxVille;
    }

    /**
     * Set positionyVille
     *
     * @param integer $positionyVille
     * @return JoueurVille
     */
    public function setPositionyVille($positionyVille)
    {
        $this->positionyVille = $positionyVille;
    
        return $this;
    }

    /**
     * Get positionyVille
     *
     * @return integer 
     */
    public function getPositionyVille()
    {
        return $this->positionyVille;
    }

    /**
     * Set nombreBoisVille
     *
     * @param integer $nombreBoisVille
     * @return JoueurVille
     */
    public function setNombreBoisVille($nombreBoisVille)
    {
        $this->nombreBoisVille = $nombreBoisVille;
    
        return $this;
    }

    /**
     * Get nombreBoisVille
     *
     * @return integer 
     */
    public function getNombreBoisVille()
    {
        return $this->nombreBoisVille;
    }

    /**
     * Set nombreFerVille
     *
     * @param integer $nombreFerVille
     * @return JoueurVille
     */
    public function setNombreFerVille($nombreFerVille)
    {
        $this->nombreFerVille = $nombreFerVille;
    
        return $this;
    }

    /**
     * Get nombreFerVille
     *
     * @return integer 
     */
    public function getNombreFerVille()
    {
        return $this->nombreFerVille;
    }

    /**
     * Set nombrePierreVille
     *
     * @param integer $nombrePierreVille
     * @return JoueurVille
     */
    public function setNombrePierreVille($nombrePierreVille)
    {
        $this->nombrePierreVille = $nombrePierreVille;
    
        return $this;
    }

    /**
     * Get nombrePierreVille
     *
     * @return integer 
     */
    public function getNombrePierreVille()
    {
        return $this->nombrePierreVille;
    }

    /**
     * Set nombreNourritureVille
     *
     * @param integer $nombreNourritureVille
     * @return JoueurVille
     */
    public function setNombreNourritureVille($nombreNourritureVille)
    {
        $this->nombreNourritureVille = $nombreNourritureVille;
    
        return $this;
    }

    /**
     * Get nombreNourritureVille
     *
     * @return integer 
     */
    public function getNombreNourritureVille()
    {
        return $this->nombreNourritureVille;
    }

    /**
     * Set populationOccupeeVille
     *
     * @param integer $populationOccupeeVille
     * @return JoueurVille
     */
    public function setPopulationOccupeeVille($populationOccupeeVille)
    {
        $this->populationOccupeeVille = $populationOccupeeVille;
    
        return $this;
    }

    /**
     * Get populationOccupeeVille
     *
     * @return integer 
     */
    public function getPopulationOccupeeVille()
    {
        return $this->populationOccupeeVille;
    }

    /**
     * Set populationTotaleVille
     *
     * @param integer $populationTotaleVille
     * @return JoueurVille
     */
    public function setPopulationTotaleVille($populationTotaleVille)
    {
        $this->populationTotaleVille = $populationTotaleVille;
    
        return $this;
    }

    /**
     * Get populationTotaleVille
     *
     * @return integer 
     */
    public function getPopulationTotaleVille()
    {
        return $this->populationTotaleVille;
    }

    /**
     * Set populationMaxVille
     *
     * @param integer $populationMaxVille
     * @return JoueurVille
     */
    public function setPopulationMaxVille($populationMaxVille)
    {
        $this->populationMaxVille = $populationMaxVille;
    
        return $this;
    }

    /**
     * Get populationMaxVille
     *
     * @return integer 
     */
    public function getPopulationMaxVille()
    {
        return $this->populationMaxVille;
    }
}
