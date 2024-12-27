<?php
include '../home/navbar.html';

require_once 'C_stat.php';
$stat = new C_stat();

if(isset($_POST['submit'])){
    $date_d = $_POST['debut'];
    $date_f= $_POST['fin'];
    $nom_etudiant = $_POST['nom'];
    $prenom_etudiant = $_POST['prenom'];
    $nom_classe = $_POST['classe'];
    $res = $stat->Liste_absence_etudiant($nom_etudiant, $prenom_etudiant, $date_d, $date_f, $nom_classe);
    if ($res->num_rows > 0) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
            <title>Document</title>
        </head>
        <body>';
        echo '<table id="tabusser" border="1" class="table table-hover my-4 table-bordered text-center container">
            <thead class="tbl-header">
                <tr>
                    <th>Matiere</th>
                    <th>Nombre d\'absence</th>
                </tr>
            </thead>
            <tbody class="tbl-content">';
            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                $id_etudiant = $row['CodeEtudiant']; 
                $code_matiere = $row['CodeMatiere'];
                $link = "liste2.php?CodeEtudiant=$id_etudiant&CodeMatiere=$code_matiere&debut=$date_d&fin=$date_f";
                echo '<tr>
                    <td>'.$row['nom_matiere'].'</td>
                    <td><a href="'.$link.'">'.$row['nombre_absences'].'</a></td>
                </tr>';
            }
            echo '</tbody></table></div></body></html>';
    } else {
        echo 'Aucun résultat trouvé.';
    }

}
?>
