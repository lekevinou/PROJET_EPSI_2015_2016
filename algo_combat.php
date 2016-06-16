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
		return $this->_attaque;
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

Class Armee{

	private $unites = array();

	public function getUnites(){
		return $this->_unites;
	}

	public function setUnites($unites){
		$this->_unites = $unites;
	}

	public function __construct($unites){
		$this->setUnites($unites);
	}

	public function calculAttaque(){

		$mesUnites = array();
		$mesUnites = $this->getUnites();

		$nbInfant = 0;
		$nbDistant = 0;
		$nbCavalier = 0;
		$nbTotal = 0;
		$attaqueTotale = 0;
		$random = rand (0 , 10)/100;
		echo $random;
		foreach ($mesUnites as $monUnite) {

			$type = $monUnite->getType();

			switch($type){
				case 'Infanterie':
					$nbInfant++;
					break;
				case 'Distant':
					$nbDistant++;
					break;
				case 'Cavalier':
			 		$nbCavalier++;
			 		break;

			}

			$nbTotal++;
			$attaqueTotale = $attaqueTotale + $monUnite->getAttaque();
		}

		$resultatAttaque = array();
		$resultatAttaque['ratioInfant'] = $nbInfant / $nbTotal;
		$resultatAttaque['ratioDistant'] = $nbDistant / $nbTotal;
		$resultatAttaque['ratioCavalier'] = $nbCavalier / $nbTotal;
		$resultatAttaque['Total'] = $nbTotal;
		$resultatAttaque['attaqueTotale'] = $attaqueTotale + $attaqueTotale * $random;

		print_r($resultatAttaque);

		return $resultatAttaque;
	}

	public function calculDefense($resultatAttaque){

		//print_r($resultatAttaque);


		$mesUnites = array();
		$mesUnites = $this->getUnites();

		$defInfant = 0;
		$defDistant = 0;
		$defCavalier = 0;
		$defTotal = 0;
		$random = rand (0 , 10)/100;

		foreach ($mesUnites as $monUnite) {
			$defInfant = $defInfant + $monUnite->getDefInfant();
			$defDistant = $defDistant + $monUnite->getDefDistant();
			$defCavalier = $defCavalier + $monUnite->getDefCavalier();	
		}

		$defInfant = $defInfant * $resultatAttaque['ratioInfant'];
		$defDistant = $defDistant * $resultatAttaque['ratioDistant'];
		$defCavalier = $defCavalier * $resultatAttaque['ratioCavalier'];

		$defTotal = $defInfant + $defDistant + $defCavalier;
		$defTotal = $defTotal + $defTotal * $random;
		echo $defTotal;
		if($defTotal >= $resultatAttaque['attaqueTotale']){
			echo 'La defense gagne !';
			return true;
		}else{
			echo 'L\'attaque gagne !';
			return false;
		 }
		}

}

$rodeur = new Unite("Rodeur", "Infanterie", 5, 5, 5, 5);
$barbare = new Unite("Barbare", "Infanterie", 20, 10, 15, 5);
$piquier = new Unite("Piquier", "Infanterie", 10, 20, 10, 40);
$fantassin = new Unite("Fantassin", "Infanterie", 25, 20, 20, 10);
$paladin = new Unite("Paladin", "Infanterie", 35, 25, 30, 15);
$archer = new Unite("Archer", "Distant", 20, 5, 20, 15);
$arbalerier = new Unite("Arbaletrier", "Distant", 30, 40, 20, 10);
$cavalierLeger = new Unite("Cavalier Leger", "Cavalier", 30, 30, 10, 15);
$cavalierLourd = new Unite("Cavalier Lourd", "Cavalier", 50, 35, 15, 20);

$tableau[] = $archer;
$tableau[] = $barbare;
$tableau[] = $piquier;
$tableau[] = $fantassin;
$tableau[] = $paladin;
$tableau[] = $arbalerier;
$tableau[] = $cavalierLeger;
$tableau[] = $cavalierLourd;

$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;
$tableau2[] = $cavalierLourd;

$armee = new Armee($tableau);
$armee2 = new Armee($tableau2);

//echo $barbare->getNom();
//echo $archer->getNom();

$resultat = array();
$resultat = $armee->calculAttaque();

$armee2->calculDefense($resultat);


?>