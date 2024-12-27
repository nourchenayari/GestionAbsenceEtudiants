<?php
include '../home/navbar.html';
require_once 'C_stat.php';

$stat = new C_stat();

if(isset($_POST['submit'])){
    $jour = $_POST['jour'];
    $res = $stat->Liste_absence_par_jour($jour);

    if ($res->num_rows > 0) {
?>
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
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>JOUR</th>
                    </tr>
                </thead>
                <tbody class='tbl-content'>
<?php
                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr>
                            <td>".$row['CodeEtudiant']."</td>
                            <td>".$row['nom']."</td>
                            <td>".$row['prenom']."</td>  
                            <td>".$row['DateJour']."</td>  
                        </tr>";
                }
?>
                </tbody>
            </table>
        </body>
        </html>
<?php
    } else {
        echo "Aucun résultat trouvé.";
    }
}
?>
