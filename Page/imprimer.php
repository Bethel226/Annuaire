<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Style/css/style.css">
</head>
<body onload print ()>

<div class="container shadow p-2 bg-body rounded">
      <h4 class="mt-3 text-center">Liste des articles</h4>
<table class="table table bordered w-95" border="1" >
  <thead class="table bg-primary text-light">
    <tr>
        <td>No</td>
        <td>Libelle </td>
        <td>Quantite</td>
        <td>Prix unitaire</td>
        <td>Date</td>
        <td>Provenance</td>
    </tr>
  </thead>
  
  <?php

try {
    // se connecter à mysql
    $pdo = new PDO("mysql:host=localhost;dbname=bd_article", "root", "");
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
}

// mysql select query
//$stmt = $con->prepare('SELECT name, model, os, type, ip, idrac FROM P_SERVERS');
$q = $pdo->prepare('SELECT * FROM Article');

$q->execute();
$data = $q->fetchAll();

?>
  <tbody >
  <?php
foreach ($data as $donnee) {
?>
  <tr>
        <td>  <?php echo $donnee['idArt']; ?></td>
        <td>  <?php echo $donnee['libelle']; ?></td>
        <td>  <?php echo $donnee['quantite']; ?></td>
        <td>  <?php echo $donnee['prixUnit']; ?></td>
        <td> <?php echo $donnee['date']; ?></td>
        <td> <?php echo $donnee['proven']; ?></td>
    </tr>
    <?php
            }
            ?>
  
  </tbody>
</table> <br>
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  

