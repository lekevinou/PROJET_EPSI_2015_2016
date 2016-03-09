<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 */
class Joueur
{
    /**
     * @var integer
     */
    private $idJoueur;

    /**
     * @var string
     */
    private $pseudoJoueur;

    /**
     * @var string
     */
    private $emailJoueur;

    /**
     * @var string
     */
    private $mdpJoueur;

    /**
     * @var integer
     */
    private $idRaceFk;

    /**
     * @var string
     */
    private $descriptionJoueur;

    /**
     * @var integer
     */
    private $sexeJoueur;


    /**
     * Get idJoueur
     *
     * @return integer 
     */
    public function getIdJoueur()
    {
        return $this->idJoueur;
    }

    /**
     * Set pseudoJoueur
     *
     * @param string $pseudoJoueur
     * @return Joueur
     */
    public function setPseudoJoueur($pseudoJoueur)
    {
        $this->pseudoJoueur = $pseudoJoueur;
    
        return $this;
    }

    /**
     * Get pseudoJoueur
     *
     * @return string 
     */
    public function getPseudoJoueur()
    {
        return $this->pseudoJoueur;
    }

    /**
     * Set emailJoueur
     *
     * @param string $emailJoueur
     * @return Joueur
     */
    public function setEmailJoueur($emailJoueur)
    {
        $this->emailJoueur = $emailJoueur;
    
        return $this;
    }

    /**
     * Get emailJoueur
     *
     * @return string 
     */
    public function getEmailJoueur()
    {
        return $this->emailJoueur;
    }

    /**
     * Set mdpJoueur
     *
     * @param string $mdpJoueur
     * @return Joueur
     */
    public function setMdpJoueur($mdpJoueur)
    {
        $this->mdpJoueur = $mdpJoueur;
    
        return $this;
    }

    /**
     * Get mdpJoueur
     *
     * @return string 
     */
    public function getMdpJoueur()
    {
        return $this->mdpJoueur;
    }

    /**
     * Set idRaceFk
     *
     * @param integer $idRaceFk
     * @return Joueur
     */
    public function setIdRaceFk($idRaceFk)
    {
        $this->idRaceFk = $idRaceFk;
    
        return $this;
    }

    /**
     * Get idRaceFk
     *
     * @return integer 
     */
    public function getIdRaceFk()
    {
        return $this->idRaceFk;
    }

    /**
     * Set descriptionJoueur
     *
     * @param string $descriptionJoueur
     * @return Joueur
     */
    public function setDescriptionJoueur($descriptionJoueur)
    {
        $this->descriptionJoueur = $descriptionJoueur;
    
        return $this;
    }

    /**
     * Get descriptionJoueur
     *
     * @return string 
     */
    public function getDescriptionJoueur()
    {
        return $this->descriptionJoueur;
    }

    /**
     * Set sexeJoueur
     *
     * @param integer $sexeJoueur
     * @return Joueur
     */
    public function setSexeJoueur($sexeJoueur)
    {
        $this->sexeJoueur = $sexeJoueur;
    
        return $this;
    }

    /**
     * Get sexeJoueur
     *
     * @return integer 
     */
    public function getSexeJoueur()
    {
        return $this->sexeJoueur;
    }
}
