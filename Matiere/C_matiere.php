<?php
class matiere 
{
public $CodeMatiere;
public $NomMatiere;
public $NbreHeureCoursParSemaine;
public $NbreHeureTDParSemaine;
public $NbreHeureTPParSemaine;

function __construct($codeMatiere,$NomMatiere,$NbreHeureCoursParSemaine,$NbreHeureTDParSemaine,$NbreHeureTPParSemaine)
{
$this->CodeMatiere=$codeMatiere;
$this->NomMatiere=$NomMatiere;
$this->NbreHeureCoursParSemaine=$NbreHeureCoursParSemaine;
$this->NbreHeureTDParSemaine=$NbreHeureTDParSemaine;
$this->NbreHeureTPParSemaine=$NbreHeureTPParSemaine;
}
function editer_matiere ($CodeMatiere, $NomMatiere, $NbreHeureCoursParSemaine,$NbreHeureTDParSemaine, $NbreHeureTPParSemaine)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "UPDATE t_matiere SET CodeMatiere='$CodeMatiere', NomMatiere='$NomMatiere',
        NbreHeureCoursParSemaine='$NbreHeureCoursParSemaine', NbreHeureTDParSemaine='$NbreHeureTDParSemaine',
        NbreHeureTPParSemaine='$NbreHeureTPParSemaine' WHERE CodeMatiere='$CodeMatiere'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}

function ajouter_matiere ()
{
    require_once '../config.php';
    $mysqli=new mysqli(db_host,db_user,db_password,db_database);
    $req="INSERT into t_matiere  VALUES ('','".$this->NomMatiere."','".$this->NbreHeureCoursParSemaine."',
    '".$this->NbreHeureTDParSemaine."'
    ,'".$this->NbreHeureTPParSemaine."')";
   $mysqli->query($req);															
   $mysqli->close();
}
function chercher_matiere ($search_term)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_matiere WHERE CodeMatiere LIKE '%$search_term%' OR NomMatiere LIKE '%$search_term%'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}
function afficher_matiere_by_id($CodeMatiere)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_matiere  where CodeMatiere='$CodeMatiere'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;  

}
function lister_matiere ()
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_matiere";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}

function supprimer_matiere ($CodeMatiere)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "DELETE FROM t_matiere  where CodeMatiere='$CodeMatiere'";
    $mysqli->query($sql);
    $mysqli->close();
}

}





?>