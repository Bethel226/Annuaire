<?php

$host = 'localhost';
$dbname = 'bd_article';
$username = 'root';
$password = '';

if(isset($_POST['valider'])){

  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","root","");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }

  // récupérer les valeurs 
  $libelle = $_POST['libelle'];
  $quantite = $_POST['quantite'];
  $prixUnit = $_POST['prixUnit'];
  $date = $_POST['date'];
  $proven = $_POST['proven'];

  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `Article`(`libelle`, `quantite`, `prixUnit`, `date`, `proven`) VALUES (:libelle,:quantite,:prixUnit,:date,:proven)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":libelle"=>$libelle,":quantite"=>$quantite,":prixUnit"=>$prixUnit,":date"=>$date,":proven"=>$proven));

  // vérifier si la requête d'insertion a réussi
  if($exec){
    echo 'Donnees inserees avec succes';
  }else{
    echo "Echec de l'operation d'insertion";
  }
}
?>