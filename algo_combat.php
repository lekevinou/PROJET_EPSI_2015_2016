<?php

Class Unite{

	private $_nom;
	private $_type;
	private $_attaque;
	private $_defInfant;
	private $_defDistant;
	private $_defCavalier;

	public function getNom(){
		return $this->_nom;
	}

	public function setNom($nom){
		$this->_nom = $nom;
	}

	public function getType(){
		return $this->_type;
	}

	public function setType($type){
		$this->_type = $type;
	}

	public function getAttaque(){
		return $this->_type;
	}

	public function setAttaque($attaque){
		$this->_attaque = $attaque;
	}

	public function setDefInfant($defInfant){
		$this->_defInfant = $defInfant;
	}

	public function getDefInfant(){
		return $this->_defInfant;
	}

	public function setDefDistant($defDistant){
		$this->_defDistant = $defDistant;
	}

	public function getDefDistant(){
		return $this->_defDistant;
	}

	public function setDefCavalier($defCavalier){
		$this->_defCavalier = $defCavalier;
	}

	public function getDefCavalier(){
		return $this->_defCavalier;
	}

	public function __construct($nom, $type, $attaque, $defInfant, $defDistant, $defCavalier){
		$this->setNom($nom);
		$this->setType($type);
		$this->setAttaque($attaque);
		$this->setDefInfant($defInfant);
		$this->setDefDistant($defDistant);
		$this->setDefCavalier($defCavalier);
	}

}
/*
Class Armee{

	var $unites = array();

	public function calculAttaque(){

		private $nbInfant = 0;
		private $nbDistant = 0;
		private $nbCavalier = 0;
		private $nbTotal = 0;

		foreach ($unite as $monUnite) {
			if($monUnite.type == Infanterie)
				$nbInfant++;
			elseif($monUnite.type == Distant)
				$nbDistant++;
			elseif($monUnite.type == Cavalier)
				$nbCavalier++;

			$nbTotal++;	
		}

		$resultatAttaque = array();
		$resultatAttaque['ratioInfant'] => $nbInfant / $nbTotal;
		$resultatAttaque['ratioDistant'] => $nbDistant / $nbTotal;
		$resultatAttaque['ratioCavalier'] => $nbCavalier / $nbTotal;
		$resultatAttaque['ratioTotal'] => $nbTotal;

		return $resultatAttaque;
	}

	public function calculDefense($resultatAttaque, $unites){

		var $defInfant = 0;
		var $defDistant = 0;
		var $defCavalier = 0;
		var $defTotal = 0;

		foreach ($unite as $monUnite) {
			$defInfant => $defInfant + $monUnite.defInfant;
			$defDistant => $defDistant + $monUnite.defDistant;
			$defCavalier => $defCavalier + $monUnite.defCavalier;	
		}

		$defInfant = $defInfant * $resultatAttaque['ratioInfant'];
		$defDistant = $defDistant * $resultatAttaque['ratioDistant'];
		$defCavalier = $defCavalier * $resultatAttaque['ratioCavalier'];

		$defTotal = $defInfant + $defDistant + $defCavalier;

		if($defTotal >= $resultatAttaque['ratioTotal'])
			return true;
		else
			return false;

}
*/

$barbare = new Unite("Barbare1", "Barbare", 20, 5, 20, 15);
$archer = new Unite("Archer1", "Distant", 20, 5, 20, 15);

echo $barbare->getNom();
echo $archer->getNom();

?>