<?php
require_once "Autoloader.php";
Autoloader :: register();

class Loger extends Etudiant{
    private $batiment;
    private $chambre;
   

    public function __construct($matricule="",$nom = "", $prenom = "",$email="",
    $telephone="",$dat_naissance="",$batiment="",$chambre="")   {

        parent::__construct($matricule,$nom , $prenom ,$email,
        $telephone,$dat_naissance);

        $this->batiment = $batiment;
        $this->chambre = $chambre;
    }
    public function getBatiment(){
        return $this->batiment;
    }
    public function setBatiment($batiment){
         $this->batiment = $batiment;
    }
    public function getChambre(){
        return $this->chambre;
    }
    public function setChambre($chambre){
         $this->chambre = $chambre;
    }
    
    
    
    
    
    
    
    public function addPersonnel(Personne $unePersonne )
    {
       $this->personnes[] = $unePersonne;
    }
    public function findPersonnel($nom){
        foreach ($this->personnes as $key => $value) {
            if($value->nom==$nom)
                return $value;
        }
        return null;
    }
    public function getListPersonne($type){
        $tabperso=[];
        for($i=0;$i<=count($this->personnes);$i++){
            if(get_class($this->personnes[$i])==$type){
                $tabperso[] =$this->personnes[$i];
            }
        }
        return $tabperso;
    }
    //trouver un element dans une tableau a partir de 
    // sa position
    public function find($i)
    {
        if($i>=0 && $i<count($this->personnes) )
            return $this->personnes[$i];
        
        return null;
    }


}