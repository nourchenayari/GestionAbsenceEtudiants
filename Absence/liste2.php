<?php
include '../home/navbar.html';
require_once 'C_stat.php';
$stat = new C_stat();

if(isset($_GET['CodeEtudiant']) && isset($_GET['CodeMatiere']) && isset($_GET['debut']) && isset($_GET['fin'])){
    $CodeEtudiant = $_GET['CodeEtudiant'];
    $CodeMatiere = $_GET['CodeMatiere'];
    $debut = $_GET['debut'];
    $fin = $_GET['fin'];
} else if(isset($_POST['CodeEtudiant']) && isset($_POST['CodeMatiere']) && isset($_POST['debut']) && isset($_POST['fin'])){
    $CodeEtudiant = $_POST['CodeEtudiant'];
    $CodeMatiere = $_POST['CodeMatiere'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
}

if(isset($CodeEtudiant) && isset($CodeMatiere) && isset($debut) && isset($fin)){
    $res = $stat->Liste_absence_etudiant_parMatiere($CodeEtudiant, $CodeMatiere, $debut, $fin);
    if ($res->num_rows>0) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='../css/bootstrap.min.css'>
            <script src='https://kit.fontawesome.com/b99e675b6e.js'></script>
            <title>Document</title>
        </head>
        <body>
            <table id='tabusser' border='1' class='table table-hover my-4 table-bordered text-center container'>
                <thead class='tbl-header'>
                    <tr>
                        <th>Date jour</th>
                        <th>Enseignant</th>
                        <th>Seance</th>
                    </tr>
                </thead>
                <tbody class='tbl-content'>";
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>
                            <td>".$row['DateJour']."</td>
                            <td>".$row['prenom'].$row['nom']."</td>
                            <td>".$row['NomSeance']."</td>
                        </tr>";
                    }
            echo "</tbody>
            </table>
            
        </body>
        </html>";
        echo"le nombre totale des absences est ".$res->num_rows;
    } else {
        echo "Aucun resultat trouve.";
    }
}
?>
