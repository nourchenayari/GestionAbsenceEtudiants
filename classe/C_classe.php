<?php
class classe{
    public $CodeDepartement;
    public $CodeClasse;
    public $NomClasse;	
    public $CodeGroupe;	
    function get_classe($id){
        require_once('../config.php');
        $mysqli = new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT * FROM t_classe where CodeClasse='$id'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    function affiche_classe(){
        require_once('../config.php');
        $mysqli = new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT * FROM t_classe";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

}
?>