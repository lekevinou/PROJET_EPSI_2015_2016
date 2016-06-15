<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeUnite
 */
class TypeUnite
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idTypeUnite;

    /**
     * @var string
     */
    private $nomTypeUnite;


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
     * Set idTypeUnite
     *
     * @param integer $idTypeUnite
     * @return TypeUnite
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
     * Set nomTypeUnite
     *
     * @param string $nomTypeUnite
     * @return TypeUnite
     */
    public function setNomTypeUnite($nomTypeUnite)
    {
        $this->nomTypeUnite = $nomTypeUnite;
    
        return $this;
    }

    /**
     * Get nomTypeUnite
     *
     * @return string 
     */
    public function getNomTypeUnite()
    {
        return $this->nomTypeUnite;
    }
}
