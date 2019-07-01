<!DOCTYPE HTML>
<head>
 
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Rechercher Boursier</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
    .list{
    text-align: center;
    margin-top:20px;
}
</style>
</head> 
<body>
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4 py-2 bg-dark">
<ul class="navbar-nav mx-auto">
        
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="etudiantService.php">Ajouter un Boursier, un non Boursier ou un loger <a>
          </li>

          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="findBoursier.php">Trouver un Boursier</a>
          </li>
         
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="test.php">Rechercher un etudiant</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="findNonBoursier.php">Rechercher un etudiant non Boursier</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="findloger.php">Rechercher un etudiant loger</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="verification.php">Check Statut</a>
          </li>
        </ul>
     
  </nav>
  <div class="form">
<form action="etudiantService.php" method="POST"> 
      <p> 
        <input type="text" name="prenom"  placeholder="prenom" size="20" required/>
      </p>
      <p>
       <input type="text" name="nom"  size="20" placeholder="nom"required/>
      </p>
      <p>
       
        <input type="number" name="matricule"  placeholder="Numero matricule"required/>
      </p>

      <p>
        <input type="number" name="number"  placeholder="Numero Telephone" required />
      </p>
     
      <p>
        <input type="text" name="email"  placeholder="email"  required />
      </p>
      <p>
        <input type="date" name="danaiss"  placeholder="date de naissance"  required />
      </p>
     
      
     <p>

      <input type="radio" name="opt_rad" id="nonBoursier" value="nom" onclick="showHideBourse()"/>Non Boursier
      <!--label for="nonBoursier"></label> <br-->
       <fieldset id="infoNonBoursier" >

      <label for="name">Adresse :</label> 
     
      <input type="text" name="adresse" id="adresse" placeholder="Adresse"/> 
     
        </fieldset>  
        </p>
        <p>
        <input type="radio" name="opt_rad" id="Boursier" value="nom" onclick="showHideBourse()"/>Boursier
        <fieldset id="infoBoursier" >

        <!--label for="name">Libelle:</label>
        <input type="text" name="libelle" id="libelle" placeholder="libelle"/-->

        <label for="statut">type de bourse</label> 
        <select name="statut"  size=1 >
          <optgroup>
            <option >Demi bourse</option>
            <option >Bourse Complet</option>
          </optgroup>
          </select> 
          </fieldset>
          </p> 
          <p>
          <input type="radio" name="opt_rad" id="Loger" value="nom" onclick="showHideBourse()"/>Loger

          
            <fieldset id="infoLoger">
              
          <label for="name">Chambre :</label>
            <input type="text" name="chambre" id="libelle" placeholder="Chambre"/>
             

            <label for="batiment">batiment</label>
        <select name="batiment" id="batiment" size=1 >
          <optgroup>
            <option value="1">Pavillon 1</option>
            <option value="2">Pavillon 2</option>
            <option value="3">Pavillon 3</option>
            <option value="4">Pavillon 4</option> 
          </optgroup>
          </select> 
          </fieldset> 
          </p>
     
        <input type="submit" value="AJOUTER"  name="ajouter"/>
    
        </form>
          </div>
         
         
<?php

//include ("Etudiant.php");
require_once "Autoloader.php";
Autoloader :: register();

//inserer boursier
if (  isset($_POST['ajouter']) && !empty($_POST['adresse']) ) {

  $matricule=$_POST['matricule'];
  $prenom=$_POST['prenom'];
  $nom=$_POST['nom'];
  $email=$_POST['email'];
  $tel=$_POST['number'];
  $adresse=$_POST['adresse'];

  $dat_naissance=$_POST['danaiss'];
  //$etu=new Etudiant($matricule,$nom,$prenom,$email,$tel,$dat_naissance);
  //$test= new ControlEtudiant();
  $nb= new nonBoursier($matricule,$nom,$prenom,$email,$tel,$dat_naissance,$adresse);
  $nob= new controlEtudiant;
  $nob->addnonBoursier($nb);
  //$test->addEtudiant($etu);

  }
  if (  isset($_POST['statut']) && isset($_POST['ajouter'])) {
      //if($_POST['statut']="Demi Bourse"){
        $matricule=$_POST['matricule'];
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $tel=$_POST['number'];
        //$adresse=$_POST['adresse'];
      
        $dat_naissance=$_POST['danaiss'];
        $statut=$_POST['statut'];
        $b= new Boursier($matricule,$nom,$prenom,$email,$tel,$dat_naissance,$statut);
        $bour= new controlEtudiant;
        $bour->addBoursier($b);
     // }else{
    //  echo $statut;
      //}
  }

  if (  isset($_POST['ajouter']) && !empty($_POST['chambre']) && isset($_POST['batiment']) ) {

    $matricule=$_POST['matricule'];
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $tel=$_POST['number'];
    $chambre=$_POST['chambre'];
    $batiment=$_POST['batiment'];
   // $adresse=$_POST['adresse'];
    $dat_naissance=$_POST['danaiss'];

    $b= new Loger($matricule,$nom,$prenom,$email,$tel,$dat_naissance,$batiment,$chambre);
    $bour= new controlEtudiant;
    $bour->addLoger($b);

  }

?>

<script>

 document.getElementById('infoNonBoursier').style.display='none';
 document.getElementById('infoBoursier').style.display='none';
 document.getElementById('infoLoger').style.display='none';

 function showHideBourse(){
      if (document.getElementById('nonBoursier').checked){
        document.getElementById('infoNonBoursier').style.display='block';
        document.getElementById('infoBoursier').style.display='none';
       document.getElementById('infoLoger').style.display='none';
      }else if(document.getElementById('Boursier').checked) {
        document.getElementById('infoBoursier').style.display='block';
        document.getElementById('infoNonBoursier').style.display='none';
        document.getElementById('infoLoger').style.display='none';
      }

      else if(document.getElementById('Loger').checked){
        document.getElementById('infoLoger').style.display='block';
        document.getElementById('infoBoursier').style.display='none'; 
        document.getElementById('infoNonBoursier').style.display='none';
      }
 }
</script>
</body>