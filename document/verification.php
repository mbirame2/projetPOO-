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
            <a class="nav-link text-uppercase text-expanded" href="findNonBoursier.php">Rechercher un non Boursier</a>
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
        <h3>Rechercher le statut d'un etudiant </h3>
      <p> 
        <input type="text" name="nom"  placeholder="Donner le nom " size="20" require />
      </p>
      <p> 
        <input type="text" name="prenom"  placeholder="Donner le prenom " size="20" require/>
      </p>
      
      <input type="submit" value="Rechercher"  name="rechercher"/>

      </div>

      
    </form>
    
<?php
require_once "Autoloader.php";
Autoloader :: register();

function nom(){
    return $_POST['nom'];
  }
  function prenom(){
    return $_POST['prenom'];
  }

if(  isset($_POST['rechercher'])){
    
    //$r=new controlEtudiant();
    //$r->findEtudiant();
   $new=new controlEtudiant;
   $new->verification();
}



?>  
