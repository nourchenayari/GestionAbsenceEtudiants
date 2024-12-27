<?php
include '../home/navbar.html';
require_once 'C_matiere.php';

// Supprimer
if(isset($_GET['CodeMatiere'])){
    $id = $_GET['CodeMatiere'];
    $matiere = new Matiere($id, '', '', '', '');
    $matiere->supprimer_matiere($id);
    echo "<script>alert('Matière supprimée avec succès !');</script>";
    echo "<script>window.location.href='matiere.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>Liste des Matiere</title>
    </head>
<body>
    <br>
    <div id="menu">      
        <a class="btn btn-primary"  href="ajouter_matiere.php"><b>+</b> Ajouter matière </a> <br> 
    </div>
    <form action="#" method="post">
       <label class="form-label fw-bold" for="chercher">Rechercher par Code ou nom  matière 
        <input type="text" name="search_term" > <input   type="submit" name="submit" value="OK" class="btn btn-primary">
        </label> 
    </form>
    <br>
    <div class="tabscroll">
        <table id="tabusser" border="1" class="table table-hover  my-4  table-bordered text-center container">
        <thead class="tbl-header">
    <tr>
        <th>Code matière</th>
        <th>Nom matière</th>
        <th>Nombre d'heures de cours</th>
        <th>Nombre d'heures de TD</th>
        <th>Nombre d'heures de TP</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
</thead>
<tbody class="tbl-content">
    <?php
 $matiere = new matiere('', '', '', '', '');
 if (empty($_POST['search_term'])) {
     $res = $matiere->lister_matiere();
 } else {
     $res = $matiere->chercher_matiere($_POST['search_term']);
 }
 if ($res->num_rows > 0) {
     while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
 ?>
 <tr>
                        <td><?php echo $row['CodeMatiere']; ?></td>
                        <td><?php echo $row['NomMatiere']; ?></td>
                        <td><?php echo $row['NbreHeureCoursParSemaine']; ?></td>
                        <td><?php echo $row['NbreHeureTDParSemaine']; ?></td>
                        <td><?php echo $row['NbreHeureTPParSemaine']; ?></td>
                        <td><a href="update_matiere.php?CodeMatiere=<?php echo $row['CodeMatiere']; ?>">Modifier</a></td>
                        <td><a href="matiere.php?CodeMatiere=<?php echo $row['CodeMatiere']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Matiere ?')">Supprimer</a></td>
                            </tr>
<?php }}?>
</tbody>
</table>
</div>

</body>
</html>


