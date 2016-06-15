<?php
require(APPPATH.'libraries/REST_Controller.php');

class Inscription extends REST_Controller {
  
  public function __construct()
   {
    
    parent::__construct();
    $this->load->library('session');

    
   }




/******************************************************************************
			FONCTION D'INSCRIPTION DEPUIS LA PAGE D'ACCUEIL
******************************************************************************/

	 public function inscription_post()
	 {
	    
	    // on convertie les données envoyéees depuis le controller js angular
    	$data = json_decode(file_get_contents("php://input"));


    	//on check si l'utlisateur a bien rempli tous les champs

    	if( !isset($data->pseudo) || !isset($data->email) || !isset($data->password) || !isset($data->repeatPassword))
    	{
    		$this->response('incomplet',200);
    	}


    	// on créé un tableau pour indiquer chaque champs valide ou invalide
    	$tableau = array();

    	$tableau['pseudoDispo'] = false;
    	$tableau['pseudoCaracteres'] = false;
    	$tableau['formatEmail'] = false;
    	$tableau['emailDispo'] = false;
    	$tableau['repeterMdp'] = false;
    	$tableau['formatMdp'] = false;

	    //on check si le pseudo est disponible
	    $pseudoExiste = $this->doctrine->em->getRepository("Entities\Joueur")->findOneBy(array('pseudoJoueur'=>$data->pseudo));

	    if(empty($pseudoExiste))
	    {
    	$tableau['pseudoDispo'] = true;
	    }


	    //on check si le pseudo ne contient pas de caractères invalides
	    if(preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $data->pseudo))
	    {
	          $tableau['pseudoCaracteres'] = true;
	    }    	

	    // on check si le format de l'email est valide
	    if (filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
	    	    $tableau['formatEmail'] = true;
	    }


	    //on check si l'adresse email est disponible
	    $emailExiste = $this->doctrine->em->getRepository("Entities\Joueur")->findOneBy(array('emailJoueur'=>$data->email));

	    if(empty($emailExiste))
	    {
    	$tableau['emailDispo'] = true;
	    }



	    // on check si les 2 passwords sont identiques

	    if($data->password == $data->repeatPassword)
	    {
	    	$tableau['repeterMdp'] = true;
	    }	


	    // on check si le mot de passe contient au moins 6 caractère

	    if(strlen($data->password)>=6)
	    {
	    	$tableau['formatMdp'] = true;
	    }	


	    // on ajoute le nouveau joueur seulement si toutes les conditions sont a true !
	    if($tableau['pseudoDispo'] && $tableau['pseudoCaracteres'] && $tableau['formatEmail'] && $tableau['emailDispo'] && $tableau['repeterMdp'] && $tableau['formatMdp'])
	    {

	    	//création du joueur
	    	$joueur = new Entities\Joueur;

			$joueur->setPseudoJoueur($data->pseudo);
			$joueur->setEmailJoueur($data->email);
			$joueur->setMdpJoueur(sha1($data->password));
			$joueur->setIdRaceFk(1);
            $this->doctrine->em->persist($joueur);
			$this->doctrine->em->flush();

            //création de sa premiere ville

	    	$ville = new Entities\JoueurVille;

			$ville->setIdJoueurFk($joueur->getIdJoueur());
			$ville->setNomVille('Village de '.$joueur->getPseudoJoueur());
			$ville->setPopulationOccupeeVille(20);							
			$ville->setPopulationTotaleVille(30);
			$ville->setPopulationMaxVille(40);			
			$ville->setNombreBoisVille(500);	
			$ville->setNombreFerVille(500);	
			$ville->setNombrePierreVille(500);	
			$ville->setNombreNourritureVille(500);				
            $this->doctrine->em->persist($ville);
			$this->doctrine->em->flush();


			//On ajoute les bâtiments de base a la ville

			$scierie = new Entities\VilleBatiment;

			$scierie->setIdVilleFk($ville->getIdVille());
			$scierie->setIdBatimentFk(2); // SCIERIE NIVEAU 1
            $this->doctrine->em->persist($scierie);
			$this->doctrine->em->flush();

			$carriere = new Entities\VilleBatiment;

			$carriere->setIdVilleFk($ville->getIdVille());
			$carriere->setIdBatimentFk(54); // CARRIERE PIERRE NIVEAU 1
            $this->doctrine->em->persist($carriere);
			$this->doctrine->em->flush();

			$minerai = new Entities\VilleBatiment;

			$minerai->setIdVilleFk($ville->getIdVille());
			$minerai->setIdBatimentFk(27); // minerai fer niveau 0
            $this->doctrine->em->persist($minerai);
			$this->doctrine->em->flush();

			$ferme = new Entities\VilleBatiment;

			$ferme->setIdVilleFk($ville->getIdVille());
			$ferme->setIdBatimentFk(79); // ferme  niveau 0
            $this->doctrine->em->persist($ferme);
			$this->doctrine->em->flush();			



		// on créé une session pour l'utilisateur qui vient de s'inscrire afin de le rediriger dessuite
		       $newdata = array(
		           'id_joueur'=>$joueur->getIdJoueur(),
		            'email_utilisateur'=>$joueur->getEmailJoueur()                 
		      );     
		      $this->session->set_userdata($newdata); 			

	    	$this->response('ok',200);

	    }else{
	    	$this->response($tableau,200);
	    }

	}
	 


}
