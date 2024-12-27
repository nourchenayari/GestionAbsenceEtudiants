<?php
include '../home/navbar.html';

//supprimer
require_once 'C_enseignant.php';
if(isset($_GET['CodeEnseignant'])){
    $id=$_GET['CodeEnseignant'];
    $enseignant=new enseignant ($id,'','','','','','','','');
    $enseignant->supprimer_enseignant($id);
    echo "<script>alert(' supprimé avec succès !');</script>";
    echo "<script>window.location.href='enseignant.php';</script>";
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


    <title>Document</title>
</head>
<body>
    <br>
<div id="menu">      
    <a class="btn btn-primary"  href="ajouter enseignant.php" ><b>+</b> Ajouter Enseignant </a> <br> 
</div>
<form action="#" method="post">
    <label class="form-label fw-bold" for="chercher">Rechercher par nom ou prénom: 
        <input type="text" name="search_term"> 
        <input type="submit" name="submit" value="Rechercher" class="btn btn-primary">
    </label> 
</form>
<br>
<div class="tabscroll">
     <table id="tabusser" border="1" class="table table-hover  my-4  table-bordered text-center container">

<thead class="tbl-header">
    <tr>
    <th>CodeEnseignant</th>
        <th>nom</th>
        <th>prenom</th>
        <th>dateRecrutement</th>
        <th>adress</th>
        <th>mail</th>
        <th>tel</th>
        <th>Departement</th>
        <th>Grade</th> 
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
</thead>
<tbody class="tbl-content">
 <?php
require_once 'C_enseignant.php';
$enseignant = new enseignant ('', '', '', '', '', '', '', '', '');

if (empty($_POST['search_term'])) {
    $res = $enseignant->lister_enseignant();
} else {
    $res = $enseignant->chercher_enseignant($_POST['search_term']);}

if ($res->num_rows > 0) {
    while ($lig = $res->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $lig['CodeEnseignant']; ?></td>
            <td><?php echo $lig['nom']; ?></td>
            <td><?php echo $lig['prenom']; ?></td>
            <td><?php echo $lig['dateRecrutement']; ?></td>
            <td><?php echo $lig['adress']; ?></td>
            <td><?php echo $lig['mail']; ?></td>
            <td><?php echo $lig['tel']; ?></td>
            <td> <?php 
                require_once '../departement/C_departement.php';
                $departement = new Departement();
                $res1 = $departement->get_departements($lig['CodeDepartement']);
                $row1 = $res1->fetch_assoc();
                echo $row1['NomDepartement'];
            ?>
            </td>
            <td><?php 
                require_once '../grade/C_grade.php';
                $grade = new Grade();
                $res2 = $grade->get_grade($lig['CodeGrade']);
                $row2 = $res2->fetch_assoc();
                echo $row2['NomGrade'];
            ?>
            </td>
            <td><a href="update_enseignant.php?CodeEnseignant=<?php echo $lig['CodeEnseignant']; ?>">Modifier</a></td>
            <td><a href="enseignant.php?CodeEnseignant=<?php echo $lig['CodeEnseignant']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant ?')">Supprimer</a></td>
        </tr>
    <?php }}?>
</tbody>
</table>
</div>

</body>
</html>