<?php
include '../home/navbar.html';
require_once 'C_matiere.php';
if(isset($_GET['CodeMatiere'])) {
    $matiere = new Matiere('','','','','');
    $result = $matiere->afficher_matiere_by_id($_GET['CodeMatiere']);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    if (isset($_POST['submit'])) {
        $matiere = new Matiere('', $_POST['NomMatiere'], $_POST['NbreHeureCoursParSemaine'], $_POST['NbreHeureTDParSemaine'], $_POST['NbreHeureTPParSemaine']);
        $matiere->editer_matiere($_POST['CodeMatiere'], $_POST['NomMatiere'], $_POST['NbreHeureCoursParSemaine'], $_POST['NbreHeureTDParSemaine'], $_POST['NbreHeureTPParSemaine']);
        echo "<script>alert('Matière modifiée avec succès !');</script>";
        echo"<script> window.location ='matiere.php';</script>";
      }
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Modifier une matière</title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
  </head>
  <body>
  <form class="container bg-light text p-2 my-3 col-md-4" method="post" action="#">
  <h2 class="text-center fw-bold">Modifier Matiere</h2>
      <div>
        <label class="form-label fw-bold" for="CodeMatiere">Code Matière :</label>
        <input class="form-control" type="text" name="CodeMatiere" id="CodeMatiere" value="<?php echo $row['CodeMatiere']; ?>" readonly required />
      </div>
      <div>
        <label class="form-label fw-bold" for="NomMatiere">Nom de la Matière :</label>
        <input class="form-control" type="text" name="NomMatiere" id="NomMatiere" value="<?php echo $row['NomMatiere']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="NbreHeureCoursParSemaine">Nombre d'heures de cours par semaine :</label>
        <input class="form-control" type="text" name="NbreHeureCoursParSemaine" id="NbreHeureCoursParSemaine" value="<?php echo $row['NbreHeureCoursParSemaine']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="NbreHeureTDParSemaine">Nombre d'heures de TD par semaine :</label>
        <input class="form-control" type="text" name="NbreHeureTDParSemaine" id="NbreHeureTDParSemaine" value="<?php echo $row['NbreHeureTDParSemaine']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="NbreHeureTPParSemaine">Nombre d'heures de TP par semaine :</label>
        <input class="form-control" type="text" name="NbreHeureTPParSemaine" id="NbreHeureTPParSemaine" value="<?php echo $row['NbreHeureTPParSemaine']; ?>" required />
      </div>
      <button class="btn btn-primary" type="submit" name="submit">Update</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='matiere.php';">Reset</button></form>    </form>
  </body>
</html>