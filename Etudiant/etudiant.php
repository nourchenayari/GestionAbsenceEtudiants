<?php
include '../home/navbar.html';

require_once 'C_etudiant.php';
// Supprimer
if(isset($_GET['CodeEtudiant'])){
    $id = $_GET['CodeEtudiant'];
    $etudiant = new Etudiant($id, '', '', '', '', '', '', '', '');
    $etudiant->supprimer_etudiant($id);
    echo "<script>alert('Etudiant supprimé avec succès !');</script>";
    echo "<script>window.location.href='etudiant.php';</script>";
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

    <title>Liste des étudiants</title>
</head>
<body>
    <br> 
    <div id="menu">      
        <a class="btn btn-primary"  href="ajouter_etudiant.php"><b>+</b> Ajouter étudiant </a> 
    </div>
    <br>
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
                    <th>Code étudiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>classe</th>
                    <th>Numéro inscription</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody class="tbl-content">
                <?php
                    $etudiant = new Etudiant('', '', '', '', '', '', '', '', '');

                    if (empty($_POST['search_term'])) {
                        $res = $etudiant->lister_etudiant();
                    } else {
                        $res = $etudiant->chercher_etudiant($_POST['search_term']);}
                    if ($res->num_rows > 0) {
                        while ($row= $res->fetch_array(MYSQLI_ASSOC)) {
                            ?>
                        <tr>
                            <td><?php echo $row['CodeEtudiant']; ?></td>
                            <td><?php echo $row['nom']; ?></td>
                            <td><?php echo $row['prenom']; ?></td>
                            <td><?php echo $row['DateNaissance']; ?></td>
                            <td>  <?php 
                  require_once '../classe/C_classe.php';
                $classe = new classe('','');
             $res1 = $classe->get_classe($row['CodeClasse']);
            $row1 = $res1->fetch_assoc();
           echo $row1['NomClasse'];
           ?> </td>
                            <td><?php echo $row['NumInscription']; ?></td>
                            <td><?php echo $row['Adress']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td><?php echo $row['Tel']; ?></td>
                            <td><a href="update_etudiant.php?CodeEtudiant=<?php echo $row['CodeEtudiant']; ?>">Modifier</a></td>
                            <td><a href="etudiant.php?CodeEtudiant=<?php echo $row['CodeEtudiant']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette etudiant ?')">Supprimer</a></td></tr>
<?php } }?>
</tbody>
</table>
</div>

</body>
</html>