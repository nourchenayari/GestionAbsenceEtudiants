<?php
class Grade{
    public $CodeGrade;
    public $NomGrade;
    function get_grade($id){
        require_once('../config.php');
        $mysqli = new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT  NomGrade FROM t_grade where CodeGrade=$id";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    function affiche_grade(){
        require_once('../config.php');
        $mysqli = new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT  * FROM t_grade";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

}
?>
	