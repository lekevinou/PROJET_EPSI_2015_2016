<?php
require(APPPATH.'libraries/REST_Controller.php');

class Game extends REST_Controller {
  
  public function __construct()
   {
    
    parent::__construct();
    $this->load->library('session');

   }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


// fichier toute et principal de angular js qui se répète dans chaque vue 
	 public function index_get(){
	 	$this->load->view('index');
	 }



	 public function insertBatiment_get()

	 {
	 	/*
	 	//ferme

	 		$batiment = new Entities\Batiment;

			$batiment->setIdTypeBatimentFk(4);
			$batiment->setNiveauBatiment(0);
			$batiment->setCoutBoisBatiment(0);
			$batiment->setCoutFerBatiment(0);	
			$batiment->setCoutPierreBatiment(0);	
			$batiment->setCoutNourritureBatiment(0);	
			$batiment->setCoutVillageoisBatiment(0);	
			$batiment->setTempsConstructionBatiment('00:00:00');			
            $this->doctrine->em->persist($batiment);
			$this->doctrine->em->flush();



	 		$niveau=1;
	 		$coutBois = 25;
	 		$coutFer= 15;
	 		$coutPierre = 10;
	 		$coutNourriture = 8;
	 		$coutVillageois = 0;
	 		$temps = '00:02:38';

			 		

	 		for($i = 0 ; $i<25; $i++)
	 		{
	 		$batiment = new Entities\Batiment;

			$batiment->setIdTypeBatimentFk(4);
			$batiment->setNiveauBatiment($niveau);
			$batiment->setCoutBoisBatiment($coutBois);
			$batiment->setCoutFerBatiment($coutFer);	
			$batiment->setCoutPierreBatiment($coutPierre);	
			$batiment->setCoutNourritureBatiment($coutNourriture);	
			$batiment->setCoutVillageoisBatiment($coutVillageois);	
			$batiment->setTempsConstructionBatiment($temps);			
            $this->doctrine->em->persist($batiment);
			$this->doctrine->em->flush();

				$niveau ++;

				$coutBois = $coutBois * 1.5;
				$coutFer = $coutFer * 1.5;
				$coutPierre = $coutPierre * 1.5;
				$coutNourriture = $coutNourriture * 1.5;

				
				$seconds = strtotime("1970-01-01 $temps UTC");
				$multiply = $seconds * 1.5;  #Here you can multiply with your dynamic value
				$temps = gmdate("H:i:s",$multiply);				
				

			}
			*/
	 }

		

	 


}
