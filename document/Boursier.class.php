<?php
require_once "Autoloader.php";
Autoloader :: register();
class Boursier extends Etudiant
{ 
    //private $montant;
    private $statut;


    public function __construct(
        $matricule="",$nom="" , $prenom="" ,$email="",
        $telephone=0,$dat_naissance="",$statut=""
        
     ) {
        //appel du constructeur de la classe parent

        parent::__construct($matricule,$nom , $prenom ,$email,
        $telephone,$dat_naissance);

        $this->statut = $statut;
        
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    public function getLibellé()
    {
        return $this->libellé;
    }
    public function setLibellé($libellé)
    {
        $this->libellé = $libellé;
    }
    public function infos()
    {
        //on concaténe à la fonction info de la classe parent
        // les attributs de la classe fille professeur
        return parent::infos() . ", " . $this->matiere;
    }
}
