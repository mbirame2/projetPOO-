<?php
class testconnexion {
function connect(){
    try{
     
       $connex = new PDO('mysql:host=localhost;dbname=projetPOO;charset=utf8', 'birame', '1302');
    }
     catch(PDOException $e){
        echo "$e->getMessage()";
    } 
    return $connex;
}}
?>