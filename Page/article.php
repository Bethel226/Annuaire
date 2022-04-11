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
<body>

<?php include 'menu.php'; ?>
  <h4 class="mt-3 text-center">Informations article</h4>
<div class="container shadow p-2 bg-body rounded mb-5">
        <form action="insertion.php" method="post">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Libelle" name="libelle" autocomplete="off">
          </div>
          <div class="mb-3">
            <input type="number" class="form-control" placeholder="Quantite" name="quantite" autocomplete="off">
          </div>
          <div class="mb-3">
            <input type="number" class="form-control" name="prixUnit" placeholder="Prix unitaire" min="0" autocomplete="off">
          </div>
          <div class="mb-3">
              <input type="date" class="form-control" name="date" placeholder="Date" autocomplete="off">
            </div>
          <div class="mb-3">
              <input type="text" class="form-control" name="proven" placeholder="Provenance" autocomplete="off">
          </div>
          
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validation du formulaire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">Etes-vous sur(e) de vouloir envoyer vos informations?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" name="valider" class="btn btn-success">Confirmer</button>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
            <button type="reset" class="btn btn-outline-primary"  name="Annuler">Annuler</button>
            </div>
    </form> 
    </div>  

<div class="container shadow p-2 bg-body rounded">
      <h4 class="mt-3 text-center">Liste des articles</h4>
<table id="myTable" class="table table bordered w-95" border="1" >
  <thead class="table bg-primary text-light">
    <tr>
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
<a href="imprimer.php"><button class="btn btn-outline-primary mb-3"  name="valider">Imprimer</button>
</a>
<a href="delete.php"><button class="btn btn-outline-primary mb-3"  name="valider">Supprimer</button></a>
</div>
<?php include 'foot.php'; ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</head>

