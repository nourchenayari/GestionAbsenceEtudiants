<?php 
include '../home/navbar.html';
require_once 'C_matiere.php';

if (isset($_POST['submit'])) { 
    $matiere = new matiere('', $_POST['NomMatiere'], $_POST['NbreHeureCoursParSemaine'], $_POST['NbreHeureTDParSemaine'], $_POST['NbreHeureTPParSemaine']);
    $matiere->ajouter_matiere();
    echo "<script>alert('matière ajoutée avec succès !');</script>";
    echo"<script> window.location ='matiere.php';</script>";

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une mati&egrave;re</title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">

</head>
<body>
<form class="container bg-light text p-2 my-3 col-md-4" method="post" action="#">
<h2 class="text-center fw-bold">Ajouter Matiere</h2>
    <label class="form-label fw-bold" for="NomMatiere">Nom de la matière :</label>
    <input  class="form-control"type="text" id="NomMatiere" name="NomMatiere"><br>
    <label  class="form-label fw-bold"for="NbreHeureCoursParSemaine">Nombre d'heures de cours par semaine :</label>
    <input  class="form-control" type="number" id="NbreHeureCoursParSemaine" name="NbreHeureCoursParSemaine"><br>
    <label class="form-label fw-bold" for="NbreHeureTDParSemaine">Nombre d'heures de TD par semaine :</label>
    <input  class="form-control" type="number" id="NbreHeureTDParSemaine" name="NbreHeureTDParSemaine"><br>
    <label class="form-label fw-bold" for="NbreHeureTPParSemaine">Nombre d'heures de TP par semaine :</label>
    <input  class="form-control" type="number" id="NbreHeureTPParSemaine" name="NbreHeureTPParSemaine"><br>
    <button class="btn btn-primary" type="submit" name="submit">Ajouter</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='matiere.php';">Reset</button></form>
</body>
</html>
