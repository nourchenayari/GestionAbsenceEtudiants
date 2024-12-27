<?php
class user {

    public $code_connexion;
    public $login;
    public $mot_de_passe;


    function __construct($code, $login, $password) {
        $this->code_connexion = $code;
        $this->login = $login;
        $this->mot_de_passe = $password;
    }

function authentication($login, $password) {
    require_once 'config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $escaped_login = $mysqli->real_escape_string($login);
    $escaped_password = $mysqli->real_escape_string($password);
    $query = "SELECT * FROM user WHERE iduser = '$escaped_login' AND passe = '$escaped_password'";
    $result = $mysqli->query($query);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo '<script language="javascript">';
        echo 'alert("Veuillez vérifier vos informations")';
        echo '</script>';
        echo "<script>window.location = 'login.php';</script>";
    } else {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['iduser'] = $login;
        header('Location:home.php');
        exit();
    }
}

}
?>