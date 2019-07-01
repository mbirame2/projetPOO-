

<?php
require_once "Autoloader.php";
Autoloader :: register();
//include("testconnexion.php");
//include("nonBoursier.class.php");
class controlEtudiant{ 
    


    //INSERTION NON BOURSIER et etudiant
    public function addnonBoursier(nonBoursier $nonboursier){
        
        //appel a la fonction pour la connexion
        $con=new testconnexion;
        $bdd=$con->connect();
       
        //insere dans etudiant
        $req=$bdd->prepare("INSERT INTO `ETUDIANT`( `matricule`, `nom`, `prenom`, `email`, `telephone`, `date_de_naissance`)VALUES ( :matricule,:nom,:prenom,:email,:telephone,:date_de_naissance)");
        $req->bindValue(':matricule', $nonboursier->getMatricule(), PDO::PARAM_STR);
        $req->bindValue(':nom', $nonboursier->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $nonboursier->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':email', $nonboursier->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':telephone', $nonboursier->getTelephone(), PDO::PARAM_INT);
        $req->bindValue(':date_de_naissance', $nonboursier->getDat_naissance());
        $req->execute();


        //appel a la fonction pour retourner la nouvelle valeur de id etudiant


        $requete=$bdd->query("SELECT MAX(`id_etudiant`) AS id FROM `ETUDIANT`");
          while($reponse=$requete->fetch()){
         $id=$reponse["id"];
                }
          if(get_class($nonboursier)=='nonBoursier'){
      $requete= $bdd->prepare("INSERT INTO `non_boursier`(`id_etudiant`, `adresse`) VALUES (:id_etudiant,:adresse)");   
      $requete->bindValue(':id_etudiant',$id, PDO::PARAM_INT);
        $requete->bindValue(':adresse', $nonboursier->getAdresse(), PDO::PARAM_STR);
        $requete->execute();
   
      }
        }

  public function addBoursier(Boursier $boursier){

            $statut=$boursier->getStatut();
            
            $con=new testconnexion;
        $bdd=$con->connect();
        $req=$bdd->prepare("INSERT INTO `ETUDIANT`( `matricule`, `nom`, `prenom`, `email`, `telephone`, `date_de_naissance`)VALUES ( :matricule,:nom,:prenom,:email,:telephone,:date_de_naissance)");
        $req->bindValue(':matricule', $boursier->getMatricule(), PDO::PARAM_STR);
        $req->bindValue(':nom', $boursier->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $boursier->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':email', $boursier->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':telephone', $boursier->getTelephone(), PDO::PARAM_INT);
        $req->bindValue(':date_de_naissance', $boursier->getDat_naissance());
        $req->execute();


        $requete=$bdd->query("SELECT MAX(`id_etudiant`) AS id FROM `ETUDIANT`");
          while($reponse=$requete->fetch()){
         $id=$reponse["id"];
          }
          echo $statut;
                $requete= $bdd->prepare("INSERT INTO `boursier`(`id_etudiant`, `id_type`) VALUES (:id_etudiant,:id_type)");   
            $requete->bindValue(':id_etudiant',$id, PDO::PARAM_INT);
        if($statut=='Demi bourse'){
                $requete->bindValue(':id_type', 1, PDO::PARAM_INT);  
                $requete->execute();
        }else if($statut=='Bourse Complet') {
            $requete->bindValue(':id_type', 2, PDO::PARAM_INT);     
            $requete->execute();
        }
        }
        public function addLoger(Loger $loger){
            $con=new testconnexion;
            $bdd=$con->connect();
            $req=$bdd->prepare("INSERT INTO `ETUDIANT`( `matricule`, `nom`, `prenom`, `email`, `telephone`, `date_de_naissance`)VALUES ( :matricule,:nom,:prenom,:email,:telephone,:date_de_naissance)");
            $req->bindValue(':matricule', $loger->getMatricule(), PDO::PARAM_STR);
            $req->bindValue(':nom', $loger->getNom(), PDO::PARAM_STR);
            $req->bindValue(':prenom', $loger->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(':email', $loger->getEmail(), PDO::PARAM_STR);
            $req->bindValue(':telephone', $loger->getTelephone(), PDO::PARAM_INT);
            $req->bindValue(':date_de_naissance', $loger->getDat_naissance());
            $req->execute();

            //Prenons l'id le plus grand
            $requete=$bdd->query("SELECT MAX(`id_etudiant`) AS id FROM `ETUDIANT`");
             while($reponse=$requete->fetch()){
             $id=$reponse["id"];
             }
            
            $requete= $bdd->prepare("INSERT INTO `chambre`( `id_batiment`, `nom chambre`) VALUES (:id_batiment,:nom_chambre)");
           // $requete->bindValue(':id_chambre',$id, PDO::PARAM_INT);
            $requete->bindValue(':id_batiment',$loger->getBatiment(), PDO::PARAM_INT);
            $requete->bindValue(':nom_chambre',$loger->getChambre(), PDO::PARAM_STR);
            $requete->execute();
            
            $requete=$bdd->query("SELECT MAX(`id_chambre`) AS i FROM `chambre`");
            while($reponse=$requete->fetch()){
            $i=$reponse["i"];
            }


            $requete= $bdd->prepare("INSERT INTO `loger`( `id_chambre`, `id_etudiant`) VALUES (:id_chambre,:id_etudiant)");
           // $requete->bindValue(':id_chambre',$id, PDO::PARAM_INT);
            $requete->bindValue(':id_chambre',$i, PDO::PARAM_INT);
            $requete->bindValue(':id_etudiant',$id, PDO::PARAM_STR);
            $requete->execute();



        }


   
  public function findAllEtudiant(){
            $con=new testconnexion;
            $bdd=$con->connect();
        $rec=$bdd->prepare("SELECT * FROM `ETUDIANT`");
        $rec->execute();
        $array= $rec->fetchAll();
        ?>
       
       <br> <br> <h4>Liste des etudiants</h4>
        <ul>
        <?php
        echo' <div class="bs-example">
        <table class="table table-striped table-dark">
        <tr>
        <th>prenom</th>
        <th>nom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Date Nais</th>
       
        <tr>
       </thead>';
       echo'<tbody>';
        
        foreach ($array as $array) : 
         echo' <tr>';
     echo '<td>'.'<td>'. $array['prenom'].'</td>'.' <td>'. $array['nom']. '</td>'.'<td>'. $array['email'].'</td>'. '<td>'. $array['telephone']. '</td>'.'<td>'. $array['date_de_naissance'].'<td>' ;
          echo' <tr>';
           endforeach; 

    }


    public function findAllBoursier(){
        $con=new testconnexion;
        $bdd=$con->connect();
    

    $re=$bdd->query (' SELECT e.prenom as prenom, e.nom as nom, e.email as email, e.telephone as tel, e.date_de_naissance as datnais
    FROM ETUDIANT e
    INNER JOIN boursier b
    ON e.id_etudiant = b.id_etudiant');
    
    $rec=$bdd->query ('SELECT  b.libellé as libelle, b.montant as montant FROM type_boursier b INNER JOIN  boursier t on b.id_type=t.id_type  ');
$rec->execute();
$array=$rec->fetch();
echo' <div class="bs-example">
 <table class="table table-striped table-dark">
 <tr>
 <th>prenom</th>
 <th>nom</th>
 <th>Email</th>
 <th>Telephone</th>
 <th>Date Nais</th>
 <th>Libellé</th>
 <th>Montant</th>
 <tr>
</thead>';
echo'<tbody>';

    while ($donnees = $re->fetch())
{ echo'<tr>';
	echo '<td>'.$donnees['prenom'].'</td>'.'<td>'.$donnees['nom'].'</td>'.'<td>'.$donnees['email'].'</td>'.'<td>'.$donnees['tel'].'</td>'.'<td>'.$donnees['datnais'].'</td>'.'<td>'.$array['libelle'].'</td>'.'<td>'.$array['montant'].'<td>';
  echo'</tr>'; }

echo'</tbody>';
echo'</table>';

$re->closeCursor();
   

    }
    public function findAllNonBoursier(){
      $con=new testconnexion;
      $bdd=$con->connect();
  

  $re=$bdd->query (' SELECT e.prenom as prenom, e.nom as nom, e.email as email, e.telephone as tel, e.date_de_naissance as datnais
  FROM ETUDIANT e
  INNER JOIN non_boursier b
  ON e.id_etudiant = b.id_etudiant');
  $rec=$bdd->query ('SELECT adresse FROM non_boursier');
//$rec->execute();
//$arra= $rec->fetchAll();

  echo' <div class="bs-example">
 <table class="table table-striped table-dark">
 <tr>
 <th>prenom</th>
 <th>nom</th>
 <th>Email</th>
 <th>Telephone</th>
 <th>Date Nais</th>
 <th>Adresse</th>
 
 <tr>
</thead>';
echo'<tbody>';
  while ($donnees = $re->fetch() && $array=$rec->fetch()){
    while ($arr = $re->fetch() ){ 
echo'<tr>';
echo '<td>'.$donnees['prenom'] .'</td>'.'<td>'.$donnees['nom'] .'</td>'.'<td>'.$donnees['email'] .'</td>'.'<td>'.$donnees['tel'] .'</td>'.'<td>'.$donnees['datnais'].'</td>'.'<td>'.$array['adresse'].'</td>';
echo'<tr>';
}}
$re->closeCursor();
 
  
  }

  public function findAllloger(){
    $con=new testconnexion;
    $bdd=$con->connect();


$re=$bdd->query (' SELECT e.prenom as prenom, e.nom as nom, e.email as email, e.telephone as tel, e.date_de_naissance as datnais
FROM ETUDIANT e
INNER JOIN loger l
ON e.id_etudiant = l.id_etudiant');
echo' <div class="bs-example">
<table class="table table-striped table-dark">
<tr>
<th>prenom</th>
<th>nom</th>
<th>Email</th>
<th>Telephone</th>
<th>Date Nais</th>
<th>Libellé</th>
<th>Montant</th>
<tr>
</thead>';
echo'<tbody>';
while ($donnees = $re->fetch())
{
  echo'<tr>';
  echo '<td>'.$donnees['prenom'] .'</td>'.'<td>'.$donnees['nom'] .'</td>'.'<td>'.$donnees['email'] .'</td>'.'<td>'.$donnees['tel'] .'</td>'.'<td>'.$donnees['datnais'].'</td>';
  echo'<tr>';
}

$re->closeCursor();


}
   
public function verification(){
  $con=new testconnexion;
  $bdd=$con->connect();
$prenom=prenom();
$nom=nom();
  
   $req=$bdd->prepare ('SELECT `id_etudiant` FROM `ETUDIANT` WHERE prenom=?');
   $req->execute(array( $prenom));
  // $rec->execute(array( $nom));
$array= $req->fetch();



$rec=$bdd->prepare("SELECT `id_etudiant` FROM `non_boursier`  ");
$rec->execute();
$arra= $rec->fetchAll();


$re=$bdd->prepare("SELECT `id_etudiant` FROM `boursier` ");
$re->execute();
$arr= $re->fetchAll();


$r=$bdd->prepare("SELECT `id_etudiant` FROM `loger`  ");
$r->execute();
$ar= $r->fetchAll();


foreach ($arra as $arra) :
  
if($array==$arra){ ?> <br> <br>
<h3 color="white" > L etudiant saisi est un etudiant non boursier</h3><?php
}
endforeach;
foreach ($arr as $arr) :
 if($array==$arr){ ?> <br> <br>
  <h3 color="white" > L etudiant saisi est un etudiant  boursier</h3><?php
 
}
endforeach;
foreach ($ar as $ar) :
 if($array==$ar){  ?> <br> <br>
  <h3 color="white" > L etudiant saisi est un etudiant loger</h3><?php
  
}
endforeach;

}


    }
       ?> 