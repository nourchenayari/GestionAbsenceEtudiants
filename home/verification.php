<?php

if(isset($_POST['iduser']) && isset($_POST['passe'])) {
    $db_username = 'root';
    $db_password = '';
    $db_name = 'projet';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('could not connect to database');

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['iduser']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['passe']));

    if($username !== "" && $password !== "") {
        $requete = "SELECT count(*) FROM user where  iduser= '".$username."' and passe = '".$password."'  ";
        $exec_requete = mysqli_query($db, $requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count==0) {
            echo '<script language="javascript">';
            echo 'alert("Veuillez vérifier vos informations")';
            echo '</script>';
            echo"<script> window.location = 'login.php';</script>";
        } else {
            session_start();
            $_SESSION['iduser'] = $username;
            header('Location: home.php');
            exit(); // arrêter l'exécution du script
        }
    }
}

// si les identifiants ne sont pas valides ou si la session est déjà détruite,
// rediriger l'utilisateur vers la page de connexion
header('Location: login.php');
exit();
?>
