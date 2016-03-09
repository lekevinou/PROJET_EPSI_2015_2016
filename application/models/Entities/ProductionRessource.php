<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductionRessource
 */
class ProductionRessource
{
    /**
     * @var integer
     */
    private $idProductionRessource;

    /**
     * @var integer
     */
    private $idBatimentFk;

    /**
     * @var integer
     */
    private $idRessourceFk;

    /**
     * @var integer
     */
    private $productionHeure;


    /**
     * Get idProductionRessource
     *
     * @return integer 
     */
    public function getIdProductionRessource()
    {
        return $this->idProductionRessource;
    }

    /**
     * Set idBatimentFk
     *
     * @param integer $idBatimentFk
     * @return ProductionRessource
     */
    public function setIdBatimentFk($idBatimentFk)
    {
        $this->idBatimentFk = $idBatimentFk;
    
        return $this;
    }

    /**
     * Get idBatimentFk
     *
     * @return integer 
     */
    public function getIdBatimentFk()
    {
        return $this->idBatimentFk;
    }

    /**
     * Set idRessourceFk
     *
     * @param integer $idRessourceFk
     * @return ProductionRessource
     */
    public function setIdRessourceFk($idRessourceFk)
    {
        $this->idRessourceFk = $idRessourceFk;
    
        return $this;
    }

    /**
     * Get idRessourceFk
     *
     * @return integer 
     */
    public function getIdRessourceFk()
    {
        return $this->idRessourceFk;
    }

    /**
     * Set productionHeure
     *
     * @param integer $productionHeure
     * @return ProductionRessource
     */
    public function setProductionHeure($productionHeure)
    {
        $this->productionHeure = $productionHeure;
    
        return $this;
    }

    /**
     * Get productionHeure
     *
     * @return integer 
     */
    public function getProductionHeure()
    {
        return $this->productionHeure;
    }
}
