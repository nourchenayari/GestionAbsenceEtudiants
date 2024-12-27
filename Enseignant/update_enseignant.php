<?php 
include '../home/navbar.html';

require_once 'C_enseignant.php';
if(isset($_GET['CodeEnseignant'])) {
    $enseignant = new enseignant('','','','','','','','','');
    $result = $enseignant->afficher_enseignant_by_id($_GET['CodeEnseignant']);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();}
    if (isset($_POST['submit'])) {
    $enseignant = new enseignant($_POST['CodeEnseignant'], $_POST['nom'], $_POST['prenom'], $_POST['dateRecrutement'], $_POST['adress'], $_POST['mail'], $_POST['tel'], $_POST['CodeDepartement'], $_POST['CodeGrade'] );     
    $enseignant->editer_enseignant($_POST['CodeEnseignant'], $_POST['nom'], $_POST['prenom'], $_POST['dateRecrutement'], $_POST['adress'], $_POST['mail'], $_POST['tel'], $_POST['CodeDepartement'], $_POST['CodeGrade']);
    echo "<script>alert('enseignant modifier avec succès !');</script>";
    echo"<script> window.location ='enseignant.php';</script>";
  }
  
  }
    
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Modifier un enseignant</title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
  </head>
  <body>
  <form class="container bg-light text p-2 my-3 col-md-4" method="post" action="#">
  <h2 class="text-center fw-bold">Modifier un enseignant</h2>
      <div>
        <label class="form-label fw-bold" for="CodeEnseignant">Code Enseignant :</label>
        <input class="form-control" type="text" name="CodeEnseignant" id="CodeEnseignant" value="<?php echo $row['CodeEnseignant']; ?>" readonly required/>
      </div>
      <div>
        <label class="form-label fw-bold" for="nom">Nom :</label>
        <input  class="form-control" type="text" name="nom" id="nom" value="<?php echo $row['nom']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="prenom">Prénom :</label>
        <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $row['prenom']; ?>" required />
      </div>
      <div>
        <label  class="form-label fw-bold" for="dateRecrutement">Date de recrutement :</label>
        <input class="form-control" type="date" name="dateRecrutement" id="dateRecrutement" value="<?php echo $row['dateRecrutement']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="adress">Adresse :</label>
        <input  class="form-control" type="text" name="adress" id="adress" value="<?php echo $row['adress']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="mail">Adresse email :</label>
        <input class="form-control" type="email" name="mail" id="mail" value="<?php echo $row['mail']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="tel">Numéro de téléphone :</label>
        <input class="form-control" type="tel" name="tel" id="tel" value="<?php echo $row['tel']; ?>" required />
      </div>
      <div>
        <label class="form-label fw-bold" for="CodeDepartement">Département :</label>
        <select class="form-control"  name="CodeDepartement" id="CodeDepartement">
              <?php 
              require_once '../departement/C_departement.php';
              $departement = new Departement();
              $res1 = $departement->affiche_departements();   
               while( $row1 = $res1->fetch_assoc()) {
              ?>
<option value="<?php echo $row1['CodeDepartement']; ?>" style="color: black;"><?php echo $row1['NomDepartement']; ?></option>
        <?php }?>
            </select>
      </div>
      <div>
        <label class="form-label fw-bold" for="CodeGrade"> Grade :</label>
        <select class="form-control"  name="CodeGrade" id="CodeGrade">
              <?php 
              require_once '../grade/C_grade.php';
              $Grade = new Grade();
              $res2 = $Grade->affiche_grade();   
               while( $row2 = $res2->fetch_assoc()) {
              ?>
<option value="<?php echo $row2['CodeGrade']; ?>" style="color: black;"><?php echo $row2['NomGrade']; ?></option>
        <?php }?>
            </select>
      </div>
      <button  class="btn btn-primary"type="submit" name="submit">Update</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='enseignant.php';">Reset</button>
    </form>
  </body>
</html>