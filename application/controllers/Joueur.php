<?php
require(APPPATH.'libraries/REST_Controller.php');

class Joueur extends REST_Controller {
  
  public function __construct()
   {
    
    parent::__construct();
    $this->load->library('session');

   }



/******************************************************************************
			FONCTION QUI RECUPERE LES INFOS DU JOUEUR POUR SON TABLEAU DE BORD
******************************************************************************/

	 //fonction qui récupère les infos lorsque le joueur arrive sur son écran d accueil
	 public function infosAccueil_get()
	 {

	 	$infos = array();

         $query = $this->doctrine->em->createQuery('SELECT j.pseudoJoueur FROM Entities\Joueur j WHERE j.idJoueur = ?1');
         $query->setParameter(1,$this->session->userdata('id_joueur'));
         $records = $query->getArrayResult();


         $infos['infosGenerales'] = $records[0];



         $query = $this->doctrine->em->createQuery('SELECT v.nomVille, v.populationTotaleVille, v.idVille FROM Entities\JoueurVille v WHERE v.idJoueurFk = ?1');
         $query->setParameter(1,$this->session->userdata('id_joueur'));
         $records = $query->getArrayResult();        

         $infos['villesJoueur'] = $records;

         $this->response($infos , 200);
	 }   



/******************************************************************************
			FONCTION QUI RECUPERE LES INFOS DE LA VILLE DU JOUEUR CONNECTE SUR LA QUELLE IL EST
******************************************************************************/

	 //fonction qui récupère les infos de la ville du joueur
	 public function infosMaVille_post()
	 {

	 	$data = json_decode(file_get_contents("php://input"));


    // on verifie que la ville appartient bien au joueur 

    $villeJoueur = $this->doctrine->em->getRepository("Entities\JoueurVille")->findOneBy(array('idVille'=>$data->idVille, 'idJoueurFk' => $this->session->userdata('id_joueur')));
         
    if(!empty($villeJoueur))
    {

		$ville = array();


     	// on récupère les infos générales de ma ville 
         $query = $this->doctrine->em->createQuery('SELECT v.nomVille, v.nombreBoisVille, v.nombreFerVille, v.nombrePierreVille, v.nombreNourritureVille, v.populationTotaleVille, v.populationMaxVille, v.populationOccupeeVille FROM Entities\JoueurVille v WHERE v.idJoueurFk = ?1');
         $query->setParameter(1,$this->session->userdata('id_joueur'));
         $records = $query->getSingleResult();

     	 $ville['infosGenerales'] = $records;



     	// on récupère la liste des batiments deja construits dans la ville en vue d'améliorer leur niveau ou d'effectuer une action

         $query = $this->doctrine->em->createQuery('SELECT vb.idVilleBatiment, b.niveauBatiment, b.idTypeBatimentFk, t.nomBatiment, b.idBatimentRequis FROM Entities\VilleBatiment vb JOIN Entities\Batiment b WITH b.idBatiment = vb.idBatimentFk JOIN Entities\TypeBatiment t WITH t.idTypeBatiment = b.idTypeBatimentFk WHERE vb.idVilleFk = ?1');
         $query->setParameter(1,$data->idVille);
         $mesBatiments = $query->getArrayResult();

         $ville['batimentsVille'] = $mesBatiments;

         /*
         // on fait un tableau des batiments qu'on n'a pas et qu'on peut construire
         $ville['batimentsConstructibles'] = array();
         // on récupère tous les batiments
         $query = $this->doctrine->em->createQuery('SELECT b.niveauBatiment, b.idTypeBatimentFk, t.nomBatiment, b.idBatimentRequis FROM Entities\Batiment b JOIN Entities\TypeBatiment t WITH t.idTypeBatiment = b.idTypeBatimentFk WHERE b.niveauBatiment = ?1');
         $query->setParameter(1,1);
         $batimentsConstructibles = $query->getArrayResult();

         
         foreach($batimentsConstructibles as $batimentConstructible)
         {
            
            //on fait le tri , on enleve les batiments qu'on a deja 
            $query = $this->doctrine->em->createQuery('SELECT vb.idVilleBatiment, b.niveauBatiment, b.idTypeBatimentFk, t.nomBatiment FROM Entities\VilleBatiment vb JOIN Entities\Batiment b WITH b.idBatiment = vb.idBatimentFk JOIN Entities\TypeBatiment t WITH t.idTypeBatiment = b.idTypeBatimentFk WHERE vb.idVilleFk = ?1 AND b.idTypeBatimentFk = ?2');
            $query->setParameter(1,$data->idVille);           
            $query->setParameter(2,$batimentConstructible['idTypeBatimentFk']); 
            $record = $query->getResult();

            if(!empty($record))
            {
                continue;

             // on check si le joueur a les batiments requis pour construire le batiment   
            }else{

                
                if($batimentConstructible['idBatimentRequis'] != null)
                {
                    // on recupères les infos des batiments requis
                    $requis = explode(",",$batimentConstructible['idBatimentRequis']);


                    // on compte le nombre de batiments requis a avoir
                    $nbrBatimentsRequis = sizeof($requis);
                    $nbrBatiments = 0;

                    foreach($requis as $req)
                    {
                        //infos du batiment requis
                        $query = $this->doctrine->em->createQuery('SELECT b.niveauBatiment, b.idTypeBatimentFk FROM Entities\Batiment b WHERE b.idBatiment = ?1');
                        $query->setParameter(1,$req); 
                        $batRequis = $query->getSingleResult();

                        //recupération des batiments que peut avoir le joueur pour que la requisition soit valide
                        $query = $this->doctrine->em->createQuery('SELECT b.idBatiment FROM Entities\Batiment b WHERE b.idTypeBatimentFk = ?1 AND b.niveauBatiment >= ?2');
                        $query->setParameter(1,$batRequis['idTypeBatimentFk']); 
                        $query->setParameter(2,$batRequis['niveauBatiment']);                         
                        $listeBatimentsAije = $query->getArrayResult();  


                        //ai-je le batiment requis avec un niveau assez élevé ?

                        foreach($listeBatimentsAije as $aijeBatiment)
                        {


                        $query = $this->doctrine->em->createQuery('SELECT vb.idVilleBatiment FROM Entities\VilleBatiment vb WHERE vb.idBatimentFk = ?1 AND vb.idVilleFk = ?2');
                        $query->setParameter(1,$aijeBatiment['idBatiment']);
                        $query->setParameter(2,$data->idVille);
                        $resultat = $query->getResult(); 

                            if(!empty($resultat))
                            {
                                $nbrBatiments ++;
                            }

                        }


                    }
                        // si le nombre de batiments requis a été rempli alors c'est bon
                        if($nbrBatiments == $nbrBatimentsRequis){
                            array_push($ville['batimentsConstructibles'], $batimentConstructible);
                        }



                }else{

                array_push($ville['batimentsConstructibles'], $batimentConstructible);


                }

            }
            
         }  */

     	
         	$this->response($ville,200);

         }else{
            $this->response('erreur 1',200);
         }

    }
	 
	




}
