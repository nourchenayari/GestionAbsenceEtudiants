<?php 
include '../home/navbar.html';
require_once 'C_etudiant.php';

if (isset($_POST['submit'])) { 
    $etudiant = new etudiant('', $_POST['nom'], $_POST['prenom'], $_POST['DateNaissance'], $_POST['CodeClasse'], $_POST['NumInscription'], $_POST['Adress'], $_POST['mail'], $_POST['Tel']);
    $etudiant->ajouter_etudiant();
    echo "<script>alert('étudiant ajouté avec succès !');</script>";
    echo"<script> window.location ='etudiant.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">

</head>
<body>
<form class="container bg-light text p-2 my-3 col-md-4" action="#" method="POST">
            <h2 class="text-center fw-bold"> Ajouter Etudiant</h2>
    <label  class="form-label fw-bold" for="nom">Nom :</label>
    <input class="form-control"  type="text" id="nom" name="nom"><br>
    <label  class="form-label fw-bold" for="prenom">Prénom :</label>
    <input  class="form-control"  type="text" id="prenom" name="prenom"><br>
    <label class="form-label fw-bold" for="DateNaissance">Date de naissance :</label>
    <input class="form-control" type="date" id="DateNaissance" name="DateNaissance"><br>
    <label  class="form-label fw-bold" for="CodeClasse"> classe :</label>
    <select class="form-control" name="CodeClasse" id="CodeClasse">
        <?php 
        require_once '../classe/C_classe.php';
        $classe = new classe('', '', '', '');
        $res = $classe->affiche_classe();
        while ($row= $res->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <option class="form-control" value="<?php echo $row['CodeClasse']; ?>" style="color: black;"><?php echo $row['NomClasse']; ?></option>
        <?php }?>
    </select>
    <label   class="form-label fw-bold" for="NumInscription">Numéro d'inscription :</label>
    <input class="form-control" type="text" id="NumInscription" name="NumInscription"><br>
    <label class="form-label fw-bold" for="Adress">Adresse :</label>
    <input class="form-control" type="text" id="Adress" name="Adress"><br>
    <label class="form-label fw-bold" for="mail">E-mail :</label>
    <input class="form-control" type="email" id="mail" name="mail"><br>
    <label class="form-label fw-bold" for="Tel">Téléphone :</label>
    <input class="form-control" type="text" id="Tel" name="Tel"><br>
    <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
    <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href = 'etudiant.php';">Reset</button>
</form>
</body>
</html>

