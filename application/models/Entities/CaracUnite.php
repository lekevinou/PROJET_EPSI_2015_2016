<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CaracUnite
 */
class CaracUnite
{
    /**
     * @var integer
     */
    private $idUnite;

    /**
     * @var string
     */
    private $nomUnite;

    /**
     * @var string
     */
    private $descriptionUnite;

    /**
     * @var integer
     */
    private $attaqueUnite;

    /**
     * @var integer
     */
    private $defenseInfanterieUnite;

    /**
     * @var integer
     */
    private $defenseDistantUnite;

    /**
     * @var integer
     */
    private $defenseCavalerieUnite;

    /**
     * @var integer
     */
    private $vitesseUnite;

    /**
     * @var integer
     */
    private $capaciteTransportUnite;

    /**
     * @var integer
     */
    private $idTypeUnite;

    /**
     * @var integer
     */
    private $coutBoisUnite;

    /**
     * @var integer
     */
    private $coutFerUnite;

    /**
     * @var integer
     */
    private $coutPierreUnite;

    /**
     * @var integer
     */
    private $coutNourritureUnite;

    /**
     * @var integer
     */
    private $tempsCreationUnite;


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
     * Set nomUnite
     *
     * @param string $nomUnite
     * @return CaracUnite
     */
    public function setNomUnite($nomUnite)
    {
        $this->nomUnite = $nomUnite;
    
        return $this;
    }

    /**
     * Get nomUnite
     *
     * @return string 
     */
    public function getNomUnite()
    {
        return $this->nomUnite;
    }

    /**
     * Set descriptionUnite
     *
     * @param string $descriptionUnite
     * @return CaracUnite
     */
    public function setDescriptionUnite($descriptionUnite)
    {
        $this->descriptionUnite = $descriptionUnite;
    
        return $this;
    }

    /**
     * Get descriptionUnite
     *
     * @return string 
     */
    public function getDescriptionUnite()
    {
        return $this->descriptionUnite;
    }

    /**
     * Set attaqueUnite
     *
     * @param integer $attaqueUnite
     * @return CaracUnite
     */
    public function setAttaqueUnite($attaqueUnite)
    {
        $this->attaqueUnite = $attaqueUnite;
    
        return $this;
    }

    /**
     * Get attaqueUnite
     *
     * @return integer 
     */
    public function getAttaqueUnite()
    {
        return $this->attaqueUnite;
    }

    /**
     * Set defenseInfanterieUnite
     *
     * @param integer $defenseInfanterieUnite
     * @return CaracUnite
     */
    public function setDefenseInfanterieUnite($defenseInfanterieUnite)
    {
        $this->defenseInfanterieUnite = $defenseInfanterieUnite;
    
        return $this;
    }

    /**
     * Get defenseInfanterieUnite
     *
     * @return integer 
     */
    public function getDefenseInfanterieUnite()
    {
        return $this->defenseInfanterieUnite;
    }

    /**
     * Set defenseDistantUnite
     *
     * @param integer $defenseDistantUnite
     * @return CaracUnite
     */
    public function setDefenseDistantUnite($defenseDistantUnite)
    {
        $this->defenseDistantUnite = $defenseDistantUnite;
    
        return $this;
    }

    /**
     * Get defenseDistantUnite
     *
     * @return integer 
     */
    public function getDefenseDistantUnite()
    {
        return $this->defenseDistantUnite;
    }

    /**
     * Set defenseCavalerieUnite
     *
     * @param integer $defenseCavalerieUnite
     * @return CaracUnite
     */
    public function setDefenseCavalerieUnite($defenseCavalerieUnite)
    {
        $this->defenseCavalerieUnite = $defenseCavalerieUnite;
    
        return $this;
    }

    /**
     * Get defenseCavalerieUnite
     *
     * @return integer 
     */
    public function getDefenseCavalerieUnite()
    {
        return $this->defenseCavalerieUnite;
    }

    /**
     * Set vitesseUnite
     *
     * @param integer $vitesseUnite
     * @return CaracUnite
     */
    public function setVitesseUnite($vitesseUnite)
    {
        $this->vitesseUnite = $vitesseUnite;
    
        return $this;
    }

    /**
     * Get vitesseUnite
     *
     * @return integer 
     */
    public function getVitesseUnite()
    {
        return $this->vitesseUnite;
    }

    /**
     * Set capaciteTransportUnite
     *
     * @param integer $capaciteTransportUnite
     * @return CaracUnite
     */
    public function setCapaciteTransportUnite($capaciteTransportUnite)
    {
        $this->capaciteTransportUnite = $capaciteTransportUnite;
    
        return $this;
    }

    /**
     * Get capaciteTransportUnite
     *
     * @return integer 
     */
    public function getCapaciteTransportUnite()
    {
        return $this->capaciteTransportUnite;
    }

    /**
     * Set idTypeUnite
     *
     * @param integer $idTypeUnite
     * @return CaracUnite
     */
    public function setIdTypeUnite($idTypeUnite)
    {
        $this->idTypeUnite = $idTypeUnite;
    
        return $this;
    }

    /**
     * Get idTypeUnite
     *
     * @return integer 
     */
    public function getIdTypeUnite()
    {
        return $this->idTypeUnite;
    }

    /**
     * Set coutBoisUnite
     *
     * @param integer $coutBoisUnite
     * @return CaracUnite
     */
    public function setCoutBoisUnite($coutBoisUnite)
    {
        $this->coutBoisUnite = $coutBoisUnite;
    
        return $this;
    }

    /**
     * Get coutBoisUnite
     *
     * @return integer 
     */
    public function getCoutBoisUnite()
    {
        return $this->coutBoisUnite;
    }

    /**
     * Set coutFerUnite
     *
     * @param integer $coutFerUnite
     * @return CaracUnite
     */
    public function setCoutFerUnite($coutFerUnite)
    {
        $this->coutFerUnite = $coutFerUnite;
    
        return $this;
    }

    /**
     * Get coutFerUnite
     *
     * @return integer 
     */
    public function getCoutFerUnite()
    {
        return $this->coutFerUnite;
    }

    /**
     * Set coutPierreUnite
     *
     * @param integer $coutPierreUnite
     * @return CaracUnite
     */
    public function setCoutPierreUnite($coutPierreUnite)
    {
        $this->coutPierreUnite = $coutPierreUnite;
    
        return $this;
    }

    /**
     * Get coutPierreUnite
     *
     * @return integer 
     */
    public function getCoutPierreUnite()
    {
        return $this->coutPierreUnite;
    }

    /**
     * Set coutNourritureUnite
     *
     * @param integer $coutNourritureUnite
     * @return CaracUnite
     */
    public function setCoutNourritureUnite($coutNourritureUnite)
    {
        $this->coutNourritureUnite = $coutNourritureUnite;
    
        return $this;
    }

    /**
     * Get coutNourritureUnite
     *
     * @return integer 
     */
    public function getCoutNourritureUnite()
    {
        return $this->coutNourritureUnite;
    }

    /**
     * Set tempsCreationUnite
     *
     * @param integer $tempsCreationUnite
     * @return CaracUnite
     */
    public function setTempsCreationUnite($tempsCreationUnite)
    {
        $this->tempsCreationUnite = $tempsCreationUnite;
    
        return $this;
    }

    /**
     * Get tempsCreationUnite
     *
     * @return integer 
     */
    public function getTempsCreationUnite()
    {
        return $this->tempsCreationUnite;
    }
}
