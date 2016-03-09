<?php
class Joueur_model extends CI_Model {

	 public function __construct()
     {
        $this->load->database();
     }
	 


	     
	 //fonction qui récupère les infos lorsque le joueur arrive sur son écran d accueil
	  
	 function getMesInfosAccueil()
     {
     	$joueur = array();

     	$this-> db -> select("u.pseudo_joueur");
     	$this-> db -> from('joueur u');     	
     	$this-> db -> where('u.id_joueur', $this->session->userdata('id_joueur'));
     	$this -> db -> limit(1);
     	$query = $this -> db -> get();

     	$joueur['infosGenerales'] = $query->first_row();



     	$this-> db -> select("v.nom_ville, v.nombre_population_ville, v.id_ville");
     	$this-> db -> from('joueur-ville v');     	
     	$this-> db -> where('v.id_joueur_fk', $this->session->userdata('id_joueur'));
     	$query = $this -> db -> get();

     	$joueur['villesJoueur'] = $query->result();

     	return $joueur;

     }


	 //fonction qui récupère les infos de la ville du joueur
     
	 function getInfosVille($data)
     {
     	$ville = array();

     	// on récupère les infos générales de ma ville
     	$this-> db -> select("v.nom_ville, v.nombre_bois_ville, v.nombre_fer_ville, v.nombre_pierre_ville, v.nombre_nourriture_ville");
     	$this-> db -> from('joueur-ville v');     	
     	$this-> db -> where('v.id_ville', $data);
     	$this -> db -> limit(1);
     	$query = $this -> db -> get();

     	$ville['infosGenerales'] = $query->first_row();


     	// on récupère la liste des batiments
     	$this-> db -> select("b.niveau_batiment,b.id_type_batiment_fk,t.nom_batiment");
     	$this-> db -> from('ville-batiment v');  
     	$this-> db ->join('batiment b', 'b.id_batiment = v.id_batiment_fk'); 
     	$this-> db ->join('type_batiment t', 't.id_type_batiment = b.id_type_batiment_fk');   	
     	$this-> db -> where('v.id_ville_fk', $data);
     	$query = $this -> db -> get();
     	$batiments = $query->result();


     	// on parcour la liste des batiments pour récupérer le cout de leur amélioration !

     	$couts = array();

     	foreach($batiments as $batiment)
     	{
     		
     	$this-> db -> select("c.cout_bois_batiment, c.cout_fer_batiment,c.cout_pierre_batiment,c.cout_nourriture_batiment,c.cout_villageois_batiment, c.niveau_batiment");
     	$this-> db -> from('batiment c');  
     	$this-> db -> where('c.niveau_batiment', $batiment->niveau_batiment+1);
     	$this-> db -> where('c.id_type_batiment_fk', $batiment->id_type_batiment_fk);     	
     	$query = $this -> db -> get(); 
     	$record = $query->first_row(); 

     		     	$row=array('nom_batiment'=>$batiment->nom_batiment, 'niveau_batiment' => $batiment->niveau_batiment, 'couts_amelioration' => $record);
  
				array_push($couts, $row);


     	}
     	


     	$ville['batimentsVille'] = $couts;


     	return $ville;

     }


}	  