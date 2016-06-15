<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * VilleBatiment
 */
class VilleBatiment
{
    /**
     * @var integer
     */
    private $idVilleBatiment;

    /**
     * @var integer
     */
    private $idVilleFk;

    /**
     * @var integer
     */
    private $idBatimentFk;


    /**
     * Get idVilleBatiment
     *
     * @return integer 
     */
    public function getIdVilleBatiment()
    {
        return $this->idVilleBatiment;
    }

    /**
     * Set idVilleFk
     *
     * @param integer $idVilleFk
     * @return VilleBatiment
     */
    public function setIdVilleFk($idVilleFk)
    {
        $this->idVilleFk = $idVilleFk;
    
        return $this;
    }

    /**
     * Get idVilleFk
     *
     * @return integer 
     */
    public function getIdVilleFk()
    {
        return $this->idVilleFk;
    }

    /**
     * Set idBatimentFk
     *
     * @param integer $idBatimentFk
     * @return VilleBatiment
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
}
