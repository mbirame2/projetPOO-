<!DOCTYPE HTML>
<head>
 <link rel="stylesheet" href="test.css">
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
    
<form  method="POST">
  
    <div id='rechercher'>
        <h3>Rechercher un non Boursier</h3>
      <p> 
        <input type="text" name="ide"  placeholder="Rechercher id_etudiant " size="20" />
      </p>
      
      <input type="submit" value="Rechercher"  name="rechercher"/>

      </div>
    <div id='rechercher1'>
      <h3>Tous les etudiants non Boursiers</h3>
      <input type="submit" value="Rechercher"  name="rechercher1"/>
      </div>

      
    </form>
    
<?php
require_once "Autoloader.php";
Autoloader :: register();

if(!empty($_POST['ide'])  && isset($_POST['rechercher'])){
    
    //$r=new controlEtudiant();
    //$r->findEtudiant();
    $con=new testconnexion;
    $bdd=$con->connect();
$rec=$bdd->prepare("SELECT * FROM `non_boursier` WHERE id_etudiant=? ");

$rec->execute(array( $_POST['ide'] ));
$array= $rec->fetch();
?>


<?php
if($_POST['ide']==$array['id_etudiant']){ 
 
$rec=$bdd->prepare("SELECT `id_etudiant`, `matricule`, `nom`, `prenom`, `email`, `telephone`, `date_de_naissance` FROM `ETUDIANT` WHERE id_etudiant=? ");

$rec->execute(array( $_POST['ide'] ));
$arra= $rec->fetch();

echo' <div class="bs-example">
<table class="table table-striped table-dark">
<tr>
<th>matricule</th>
<th>prenom</th>
<th>nom</th>
<th>Email</th>
<th>Telephone</th>
<th>Date Nais</th>

<tr>
</thead>';
echo'<tbody> 
<tr>';

  
  echo '<td>'. $arra['matricule'].'</td> <td>'. $arra['prenom'] .'</td> <td>'. $arra['nom'] .'</td> <td>'. $arra['email'] .'</td> <td>'.  $arra['telephone'] .'</td> <td>'.  $arra['date_de_naissance'] .'</td>

 <tr>';
}
}


if( isset($_POST['rechercher1'])){

    $r=new controlEtudiant();
    $r->findAllNonBoursier();
    
}
?>  
