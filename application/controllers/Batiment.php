<?php
require(APPPATH.'libraries/REST_Controller.php');

class Batiment extends REST_Controller {
  
  public function __construct()
   {
    
    parent::__construct();
    $this->load->library('session');

   }




/******************************************************************************
			FONCTION QUI AFFICHE LE BATIMENT QUE LE JOUEUR A SELECTIONNE 
******************************************************************************/

	 //fonction qui récupère les infos de la ville du joueur
	 public function afficherBatiment_post()
	 {

	 	$data = json_decode(file_get_contents("php://input"));
	 	
		$batiment = array();


		// infos du batiment
         $query = $this->doctrine->em->createQuery('SELECT vb.idVilleBatiment, b.niveauBatiment, b.idTypeBatimentFk, t.nomBatiment, vb.idVilleFk FROM Entities\VilleBatiment vb JOIN Entities\Batiment b WITH b.idBatiment = vb.idBatimentFk JOIN Entities\TypeBatiment t WITH t.idTypeBatiment = b.idTypeBatimentFk WHERE vb.idVilleBatiment = ?1');
         $query->setParameter(1,$data->idVilleBatiment);
         $infosBatiment = $query->getSingleResult();

         $batiment['infosBatiment'] = $infosBatiment;


		// couts que va couter la prochaine amélioration

         $query = $this->doctrine->em->createQuery('SELECT c.idBatiment, c.coutBoisBatiment, c.coutFerBatiment, c.coutPierreBatiment, c.coutNourritureBatiment, c.coutVillageoisBatiment, c.niveauBatiment, c.idBatimentRequis FROM Entities\Batiment c WHERE c.niveauBatiment = ?1 AND c.idTypeBatimentFk = ?2');
         $query->setParameter(1,$infosBatiment['niveauBatiment'] + 1);
         $query->setParameter(2,$infosBatiment['idTypeBatimentFk']);         
         $records = $query->getSingleResult();

         if($records['idBatimentRequis'] != null)
         {
                    // on recupères les infos des batiments requis
                    $requis = explode(",",$records['idBatimentRequis']);

                    // on compte le nombre de batiments requis a avoir
                    $nbrBatimentsRequis = sizeof($requis);
                    $nbrBatiments = 0;

                    foreach($requis as $req)
                    {
                            //infos du batiment requis
                        $query = $this->doctrine->em->createQuery('SELECT b.niveauBatiment, b.idTypeBatimentFk FROM Entities\Batiment b WHERE b.idBatiment = ?1');
                        $query->setParameter(1,$req); 
                        $batRequis = $query->getSingleResult();
                        

                            // on fait un tableau de tous les batiments qui , lorsqu'on les a valide la requisition
                        $query = $this->doctrine->em->createQuery('SELECT b.idBatiment FROM Entities\Batiment b WHERE b.idTypeBatimentFk = ?1 AND b.niveauBatiment >= ?2');
                        $query->setParameter(1,$batRequis['idTypeBatimentFk']); 
                        $query->setParameter(2,$batRequis['niveauBatiment']);   
                        $listeBatimentsAije = $query->getArrayResult();  

                        //ai-je le batiment requis avec un niveau assez élevé ?

                        foreach($listeBatimentsAije as $aijeBatiment)
                        {
                            $query = $this->doctrine->em->createQuery('SELECT vb.idVilleBatiment FROM Entities\VilleBatiment vb WHERE vb.idBatimentFk = ?1 AND vb.idVilleFk = ?2');
                            $query->setParameter(1,$aijeBatiment['idBatiment']);
                            $query->setParameter(2,$infosBatiment['idVilleFk']);
                            $resultat = $query->getResult(); 


                            if(!empty($resultat))
                            {
                                $nbrBatiments ++;
                            }

                        }                                                                

                    }

                        // si le nombre de batiments requis a été rempli alors c'est bon
                        if($nbrBatiments == $nbrBatimentsRequis){
                            $batiment['coutAmelioration'] = $records;
                        }else{
                            $batiment['coutAmelioration'] = false;
                        }       

         }else{
            $batiment['coutAmelioration'] = $records;
         }

         
     	
     	$this->response($batiment,200);
	 }   


/******************************************************************************
			FONCTION QUI AMELIORE LE NIVEAU D UN BATIMENT
******************************************************************************/


	 public function ameliorerBatiment_post()
	 {

	 	$data = json_decode(file_get_contents("php://input"));

        //On vérifie tout d'abord que le batiment appartient bien au joueur et que c'est la bonne ville qui paye pour le bon batiment
         
         //$query = $this->doctrine->em->createQuery('SELECT jv.idVille FROM Entities\VilleBatiment vb JOIN Entities\JoueurVille jv WITH jv.idVille = vb.idVilleFk WHERE vb.idVilleBatiment = ?1 AND jv.idJoueurFk = ?2');
         
         $query = $this->doctrine->em->createQuery('SELECT vb.idVilleFk, b.niveauBatiment, b.idBatiment, b.idTypeBatimentFk, t.nomBatiment FROM Entities\VilleBatiment vb JOIN Entities\Batiment b WITH b.idBatiment = vb.idBatimentFk JOIN Entities\TypeBatiment t WITH t.idTypeBatiment = b.idTypeBatimentFk JOIN Entities\JoueurVille jv WITH jv.idVille = vb.idVilleFk  WHERE vb.idVilleBatiment = ?1 AND jv.idJoueurFk = ?2');
         $query->setParameter(1,$data->idVilleBatiment);  
         $query->setParameter(2,$this->session->userdata('id_joueur'));                 
         $record = $query->getResult();


         //on récupère l'id du batiment qu'on va construire

         if(!empty($record))
         {

            $batiment = $this->doctrine->em->getRepository("Entities\Batiment")->findOneBy(array('niveauBatiment'=>$record[0]['niveauBatiment']+1, 'idTypeBatimentFk' => $record[0]['idTypeBatimentFk']));
           

            if(!empty($batiment)){

                $idBatiment = $batiment->getIdBatiment();


                $tableau = array();

                    $tableau['boisSuffisant'] = false;
                    $tableau['pierreSuffisant'] = false;
                    $tableau['ferSuffisant'] = false;
                    $tableau['nourritureSuffisant'] = false;
                    $tableau['villageoisSuffisant'] = false;

                    // on récupère les coûts de l'amélioration

                     $query = $this->doctrine->em->createQuery('SELECT c.coutBoisBatiment, c.coutFerBatiment, c.coutPierreBatiment, c.coutNourritureBatiment, c.coutVillageoisBatiment FROM Entities\Batiment c WHERE c.idBatiment = ?1');
                     $query->setParameter(1,$idBatiment);        
                     $cout = $query->getSingleResult();

                     //$tableau['coutAmelioration'] = $cout;


                     //on check si le joueur a assez 
                     $query = $this->doctrine->em->createQuery('SELECT v.nombreBoisVille, v.nombreFerVille, v.nombrePierreVille, v.nombreNourritureVille, v.populationTotaleVille, v.populationOccupeeVille FROM Entities\JoueurVille v WHERE v.idVille = ?1');
                     $query->setParameter(1,$record[0]['idVilleFk']);        
                     $dispo = $query->getSingleResult();

                     //$tableau['RessourcesDispo'] = $dispo;

                     $differenceBois = $dispo['nombreBoisVille'] - $cout['coutBoisBatiment'];
                     $differenceFer = $dispo['nombreFerVille'] - $cout['coutFerBatiment'];
                     $differencePierre = $dispo['nombrePierreVille'] - $cout['coutPierreBatiment'];
                     $differenceNourriture = $dispo['nombreNourritureVille'] - $cout['coutNourritureBatiment'];
                     $popDispo = $dispo['populationTotaleVille'] - $dispo['populationOccupeeVille'];
                     $differenceVillageois = $popDispo - $cout['coutVillageoisBatiment'];


                     if($differenceBois >= 0)
                     {
                        $tableau['boisSuffisant'] = true;
                     }
                     if($differenceFer >= 0)
                     {
                        $tableau['ferSuffisant'] = true;
                     }
                     if($differencePierre >= 0)
                     {
                        $tableau['pierreSuffisant'] = true;
                     }
                     if($differenceNourriture >= 0)
                     {
                        $tableau['nourritureSuffisant'] = true;
                     }  
                     if($differenceVillageois >= 0)
                     {
                        $tableau['villageoisSuffisant'] = true;
                     }                

                     // on vérifie si le joueur a les ressources suffisantes pour améliorer le batiment
                     if($tableau['boisSuffisant'] && $tableau['ferSuffisant'] && $tableau['pierreSuffisant'] && $tableau['nourritureSuffisant'] && $tableau['villageoisSuffisant'])
                     {
                        //si le joueur a assez 




                        // on déduit de la ville les ressources utilisées pour la construction
                        $ville = $this->doctrine->em->find('Entities\JoueurVille', $record[0]['idVilleFk']);

                        $ville->setNombreBoisVille($differenceBois);
                        $ville->setNombreFerVille($differenceFer);
                        $ville->setNombrePierreVille($differencePierre);
                        $ville->setNombreNourritureVille($differenceNourriture);
                        $ville->setPopulationOccupeeVille($dispo['populationTotaleVille'] - $differenceVillageois);
                        $this->doctrine->em->persist($ville);
                        $this->doctrine->em->flush(); 

                        // on améliore le niveau du batiment
                        $batiment = $this->doctrine->em->find('Entities\VilleBatiment', $data->idVilleBatiment); 

                        $batiment->setIdBatimentFk($idBatiment);
                        $this->doctrine->em->persist($batiment);
                        $this->doctrine->em->flush(); 



                        // si le batiment est une maison on ajoute les places dispos dans la ville

                        if($record['idBatimentFk'] == 4)
                        {

                        $ville->setPopulationOccupeeVille($dispo['populationMaxVille'] - $differenceVillageois);
                        $this->doctrine->em->persist($ville);                    

                        }




                        $restant['boisRestant'] = $differenceBois;
                        $restant['ferRestant'] = $differenceFer;
                        $restant['pierreRestant'] = $differencePierre;
                        $restant['nourritureRestant'] = $differenceNourriture;

                        $this->response($restant, 200);


                     }else{
                        $this->response('insuffisant', 200);
                     }
        


        
            }else{

                $this->response('error 2');

            }



       

         }else{
            $this->response('erreur 1');
         }
	 	


	 }




}	 	