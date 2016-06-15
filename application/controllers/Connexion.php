<?php
require(APPPATH.'libraries/REST_Controller.php');

class Connexion extends REST_Controller {
  
  public function __construct()
   {
    
    parent::__construct();
    $this->load->library('session');

    
   }


/******************************************************************************
			FONCTION DE redirection de connexion
******************************************************************************/

	 public function index_get()
	 {

      	redirect('/#/moi');
	 }




/******************************************************************************
			FONCTION DE CONNEXION
******************************************************************************/
	 public function connexion_post()
	 {

	    // on convertie les données envoyéees depuis le controller js angular
    $data = json_decode(file_get_contents("php://input"));

    	// on check si le joueur a bien rempli le formulaire de connexion

    	if(empty($data->pseudo) || empty($data->password))
    	{
    		$this->response('Veuillez saisir tous les champs',200);
    	}
        
	    //requete
        
        $joueurExiste = $this->doctrine->em->getRepository("Entities\Joueur")->findOneBy(array('pseudoJoueur'=>$data->pseudo, 'mdpJoueur' => sha1($data->password)));


        //Si la requete retourne un résultat
        if(!empty($joueurExiste)){

        			// instantiation des données de session
				     $newdata = array(
				           'id_joueur'=>$joueurExiste->getIdJoueur(),
				            'email_utilisateur'=>$joueurExiste->getEmailJoueur()                  
				      );     
				      $this->session->set_userdata($newdata);   

        		$this->response('ok',200);
        }else{
        	$this->response('Identifiants erronés',200);
        }

	}




/******************************************************************************
			FONCTION DE DECONNEXION
******************************************************************************/

	 public function deconnexion_get()
	 {
      	$this->session->sess_destroy();
      	redirect('/');

	}
	 


}
