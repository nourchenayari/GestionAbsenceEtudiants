<?php
include '../home/navbar.html';
require_once 'C_etudiant.php';

if(isset($_GET['CodeEtudiant'])) {
    $etudiant = new Etudiant('','','','','','','','','');
    $result = $etudiant->afficher_etudiant_by_id($_GET['CodeEtudiant']);

    if(isset($result) && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if (isset($_POST['update'])) {
    $etudiant = new Etudiant('', $_POST['nom'], $_POST['prenom'], $_POST['DateNaissance'],$_POST['CodeClasse'],$_POST['NumInscription'], $_POST['Adress'], $_POST['mail'], $_POST['Tel']);  
    $etudiant->editer_etudiant($_POST['CodeEtudiant'], $_POST['nom'], $_POST['prenom'], $_POST['DateNaissance'],$_POST['CodeClasse'],$_POST['NumInscription'], $_POST['Adress'], $_POST['mail'], $_POST['Tel']);
    echo "<script>alert('Etudiant modifié avec succès !');</script>";
    echo"<script> window.location ='etudiant.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">

  </head>
  <body>
  <form class="container bg-light text p-2 my-3 col-md-4" action="#" method="POST">
  <h2 class="text-center fw-bold"> Modifier Etudiant</h2>
      <div>
        <label class="form-label fw-bold" for="CodeEtudiant">Code Etudiant :</label>
        <input class="form-control" type="text" name="CodeEtudiant" id="CodeEtudiant" value="<?php echo $row['CodeEtudiant']; ?>"  readonly required />
      </div>
      <div>
      <label  class="form-label fw-bold" for="nom">Nom :</label>
    <input  class="form-control" type="text" id="nom" name="nom" value="<?php echo $row['nom']; ?>"><br>

    <label class="form-label fw-bold" for="prenom">Prénom :</label>
    <input class="form-control" type="text" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>"><br>

    <label class="form-label fw-bold" for="DateNaissance">Date de naissance :</label>
    <input class="form-control" type="date" id="DateNaissance" name="DateNaissance" value="<?php echo $row['DateNaissance']; ?>"><br>

    <label class="form-label fw-bold" for="CodeClasse">classe :</label>
    <select class="form-control" name="CodeClasse" id="CodeClasse">
    <?php 
    require_once '../classe/C_classe.php';
    $classe = new classe('', '', '', '');
    $res = $classe->affiche_classe();
    while ($row2= $res->fetch_array(MYSQLI_ASSOC)) {
    ?>
        <option class="form-control" value="<?php echo $row2['CodeClasse']; ?>" style="color: black;"><?php echo $row2['NomClasse']; ?></option>
    <?php } ?>
</select>

    <label class="form-label fw-bold" for="NumInscription">Numéro d'inscription :</label>
    <input class="form-control" type="text" id="NumInscription" name="NumInscription" value="<?php echo $row['NumInscription']; ?>"><br>

    <label class="form-label fw-bold" for="Adress">Adresse :</label>
    <input class="form-control" type="text" id="Adress" name="Adress" value="<?php echo $row['Adress']; ?>"><br>

    <label class="form-label fw-bold" for="mail">E-mail :</label>
    <input class="form-control" type="email" id="mail" name="mail" value="<?php echo $row['mail']; ?>"><br>

    <label class="form-label fw-bold"for="Tel">Téléphone :</label>
    <input  class="form-control" type="text" id="Tel" name="Tel" value="<?php echo $row['Tel']; ?>"><br>
    <button class="btn btn-primary" type="submit" name="update">Update</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='etudiant.php';">Reset</button>
    </form>
  </body>
</html>
