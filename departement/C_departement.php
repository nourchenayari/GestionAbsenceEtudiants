<?php
class Departement{
    public $CodeDepartement;
    public $NomDepartement;
    function get_departements($id){
        require_once('../config.php');
        $mysqli = new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT * FROM t_departement where CodeDepartement=$id";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    function affiche_departements(){
        require_once('../config.php');
        $mysqli = new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT * FROM t_departement ";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

}
?>