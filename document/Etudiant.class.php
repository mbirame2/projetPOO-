<?php 
 
 abstract class Etudiant
{
    private $nom;
    private $prenom;
    private $dat_naissance;
    private $matricule;
    private $email;
    private $telephone;
    public static $nbrePersonne=0;

    public function __construct($matricule="",$nom = "", $prenom = "",$email="",
    $telephone="",$dat_naissance="")
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->dat_naissance = $dat_naissance;
        
        self::$nbrePersonne++;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        return $this->nom = $nom;

    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this ;

    }
    public function getDat_naissance(){
        return $this->dat_naissance;
    }
    public function setDat_naissance($dat_naissance){
        $this->dat_naissance = $dat_naissance;
        return $this;

    }
    public function getMatricule(){
        return $this->matricule;
    }
    public function setMatricule($matricule){
      return  $this->matricule = $matricule;

    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
       return $this->email = $email;

    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function setTelephone($telephone){
       return $this->telephone =$telephone ;

    }

    public function infos(){
        return $this->nom. ", ".$this->prenom.", ".$this->age;
    }
}
