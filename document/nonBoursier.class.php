<?php
require_once "Autoloader.php";
Autoloader :: register();
//include "Etudiant.class.php"; 
//include "controlEtudiant.php";

class nonBoursier extends Etudiant{
   
    private $adresse;
  //  private  $id_etudiant; 
    

    public function __construct($matricule="",$nom = "", $prenom = "",$email="",
    $telephone="",$dat_naissance="",$adresse="")
    {
        //appel du constructeur de la classe parent
        parent::__construct($matricule,$nom , $prenom ,$email,
        $telephone,$dat_naissance);
        
        
        $this->adresse = $adresse;
       // $this->id_etudiant++;
        
    }

    // Pour auto incrementer id etudiant à chaque fois qu'on entre dans class tout en sachant que mon dernier etudiant a comme id 14 d'ou l'initialisation en 14
    
    public function getAdresse(){
        return $this->adresse;
    }
    public function setAdresse($adresse){
         $this->adresse = $adresse;
    }
    
    
    

}