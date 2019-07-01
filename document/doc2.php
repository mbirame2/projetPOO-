<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Formulaire d'accès à la page protégée</title>
  </head>
  <body>
    <?php

$exo=new PDO('mysql:dbname=exo;host=localhost', 'birame' , '1302');
$count=$exo->exec('INSERT INTO id SET titre="mon titre", date="'.date('Y-m-d H:i:s').'"  ');
var_dump($count);
//$exo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$res=$exo->query('SELECT * FROM batiment');
//$data=$res->fetchAll(PDO::FETCH_OBJ);
//var_dump($data[0]->id_batiment);
//echo'<br>';
    
    ?>
  </body>
</html>
  