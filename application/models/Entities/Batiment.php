<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Batiment
 */
class Batiment
{
    /**
     * @var integer
     */
    private $idBatiment;

    /**
     * @var integer
     */
    private $idTypeBatimentFk;

    /**
     * @var integer
     */
    private $niveauBatiment;

    /**
     * @var integer
     */
    private $coutBoisBatiment;

    /**
     * @var integer
     */
    private $coutFerBatiment;

    /**
     * @var integer
     */
    private $coutPierreBatiment;

    /**
     * @var integer
     */
    private $coutNourritureBatiment;

    /**
     * @var integer
     */
    private $coutVillageoisBatiment;

    /**
     * @var string
     */
    private $tempsConstructionBatiment;

    /**
     * @var string
     */
    private $idBatimentRequis;


    /**
     * Get idBatiment
     *
     * @return integer 
     */
    public function getIdBatiment()
    {
        return $this->idBatiment;
    }

    /**
     * Set idTypeBatimentFk
     *
     * @param integer $idTypeBatimentFk
     * @return Batiment
     */
    public function setIdTypeBatimentFk($idTypeBatimentFk)
    {
        $this->idTypeBatimentFk = $idTypeBatimentFk;
    
        return $this;
    }

    /**
     * Get idTypeBatimentFk
     *
     * @return integer 
     */
    public function getIdTypeBatimentFk()
    {
        return $this->idTypeBatimentFk;
    }

    /**
     * Set niveauBatiment
     *
     * @param integer $niveauBatiment
     * @return Batiment
     */
    public function setNiveauBatiment($niveauBatiment)
    {
        $this->niveauBatiment = $niveauBatiment;
    
        return $this;
    }

    /**
     * Get niveauBatiment
     *
     * @return integer 
     */
    public function getNiveauBatiment()
    {
        return $this->niveauBatiment;
    }

    /**
     * Set coutBoisBatiment
     *
     * @param integer $coutBoisBatiment
     * @return Batiment
     */
    public function setCoutBoisBatiment($coutBoisBatiment)
    {
        $this->coutBoisBatiment = $coutBoisBatiment;
    
        return $this;
    }

    /**
     * Get coutBoisBatiment
     *
     * @return integer 
     */
    public function getCoutBoisBatiment()
    {
        return $this->coutBoisBatiment;
    }

    /**
     * Set coutFerBatiment
     *
     * @param integer $coutFerBatiment
     * @return Batiment
     */
    public function setCoutFerBatiment($coutFerBatiment)
    {
        $this->coutFerBatiment = $coutFerBatiment;
    
        return $this;
    }

    /**
     * Get coutFerBatiment
     *
     * @return integer 
     */
    public function getCoutFerBatiment()
    {
        return $this->coutFerBatiment;
    }

    /**
     * Set coutPierreBatiment
     *
     * @param integer $coutPierreBatiment
     * @return Batiment
     */
    public function setCoutPierreBatiment($coutPierreBatiment)
    {
        $this->coutPierreBatiment = $coutPierreBatiment;
    
        return $this;
    }

    /**
     * Get coutPierreBatiment
     *
     * @return integer 
     */
    public function getCoutPierreBatiment()
    {
        return $this->coutPierreBatiment;
    }

    /**
     * Set coutNourritureBatiment
     *
     * @param integer $coutNourritureBatiment
     * @return Batiment
     */
    public function setCoutNourritureBatiment($coutNourritureBatiment)
    {
        $this->coutNourritureBatiment = $coutNourritureBatiment;
    
        return $this;
    }

    /**
     * Get coutNourritureBatiment
     *
     * @return integer 
     */
    public function getCoutNourritureBatiment()
    {
        return $this->coutNourritureBatiment;
    }

    /**
     * Set coutVillageoisBatiment
     *
     * @param integer $coutVillageoisBatiment
     * @return Batiment
     */
    public function setCoutVillageoisBatiment($coutVillageoisBatiment)
    {
        $this->coutVillageoisBatiment = $coutVillageoisBatiment;
    
        return $this;
    }

    /**
     * Get coutVillageoisBatiment
     *
     * @return integer 
     */
    public function getCoutVillageoisBatiment()
    {
        return $this->coutVillageoisBatiment;
    }

    /**
     * Set tempsConstructionBatiment
     *
     * @param string $tempsConstructionBatiment
     * @return Batiment
     */
    public function setTempsConstructionBatiment($tempsConstructionBatiment)
    {
        $this->tempsConstructionBatiment = $tempsConstructionBatiment;
    
        return $this;
    }

    /**
     * Get tempsConstructionBatiment
     *
     * @return string 
     */
    public function getTempsConstructionBatiment()
    {
        return $this->tempsConstructionBatiment;
    }

    /**
     * Set idBatimentRequis
     *
     * @param string $idBatimentRequis
     * @return Batiment
     */
    public function setIdBatimentRequis($idBatimentRequis)
    {
        $this->idBatimentRequis = $idBatimentRequis;
    
        return $this;
    }

    /**
     * Get idBatimentRequis
     *
     * @return string 
     */
    public function getIdBatimentRequis()
    {
        return $this->idBatimentRequis;
    }
}
