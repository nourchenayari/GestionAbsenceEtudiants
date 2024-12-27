<?php

class enseignant {
public $CodeEnseignant;
public $nom;
public $prenom;
public $dateRecrutement;
public $adress;
public $mail;
public $tel;
public $CodeDepartement;
public $CodeGrade;
function __construct($CodeEnseignant,$nom,$prenom,$dateRecrutement,$adress,$mail,$tel,$CodeDepartement,$CodeGrade)
{
$this-> CodeEnseignant=$CodeEnseignant;
$this->nom=$nom;
$this->prenom=$prenom;
$this->dateRecrutement=$dateRecrutement;
$this->adress=$adress;
$this->mail=$mail;
$this->tel=$tel;
$this->CodeDepartement=$CodeDepartement;
$this->CodeGrade=$CodeGrade;
}
function ajouter_enseignant()
{
    require_once '../config.php';
    $mysqli=new mysqli(db_host,db_user,db_password,db_database);
    $req="INSERT into t_enseignant  VALUES ('','".$this->nom."','".$this->prenom."','".$this->dateRecrutement."'
    ,'".$this->adress."','".$this->mail."','".$this->tel."','".$this->CodeDepartement."','".$this->CodeGrade."')";
   $mysqli->query($req);															
   $mysqli->close();
}
function editer_enseignant($CodeEnseignant, $nom, $prenom, $dateRecrutement, $adress,$mail,$tel,$CodeDepartement,$CodeGrade)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "UPDATE t_enseignant SET nom='$nom', prenom='$prenom', dateRecrutement='$dateRecrutement', adress='$adress',mail='$mail',tel='$tel',
     CodeDepartement='$CodeDepartement', CodeGrade='$CodeGrade' WHERE CodeEnseignant='$CodeEnseignant'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}
function lister_enseignant()
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_enseignant";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}

function supprimer_enseignant($CodeEnseignant)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "DELETE FROM t_enseignant WHERE CodeEnseignant='$CodeEnseignant'";
    $mysqli->query($sql);
    $mysqli->close();
}
function chercher_enseignant($search_term)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_enseignant WHERE nom LIKE '%$search_term%' OR prenom LIKE '%$search_term%'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}
function afficher_enseignant_by_id($CodeEnseignant)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_enseignant where codeEnseignant='$CodeEnseignant'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;  

}

}
?>



