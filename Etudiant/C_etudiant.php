<?php
class etudiant {
public $CodeEtudiant;
public $nom;
public $prenom;
public $DateNaissance;
public $CodeClasse;
public $NumInscription;
public $Adress;
public $mail;
public $Tel;
function __construct($CodeEtudiant,$nom,$prenom,$DateNaissance,$CodeClass,$NumInscription,$Adress,$mail,$Tel)
{
$this->CodeEtudiant=$CodeEtudiant;
$this->nom=$nom;
$this->prenom=$prenom;
$this->DateNaissance=$DateNaissance;
$this->CodeClasse=$CodeClass;
$this->NumInscription=$NumInscription;
$this->Adress=$Adress;
$this->mail=$mail;
$this->Tel=$Tel;

}
function editer_etudiant($CodeEtudiant, $nom, $prenom,$DateNaissance, $CodeClasse, $NumInscription,$Adress,$mail,$Tel)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "UPDATE t_etudiant SET nom='$nom', prenom='$prenom', DateNaissance='$DateNaissance', CodeClasse='$CodeClasse',NumInscription='$NumInscription',Adress='$Adress',
     mail='$mail', Tel='$Tel' WHERE CodeEtudiant='$CodeEtudiant'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}

function ajouter_etudiant()
{
    require_once '../config.php';
    $mysqli=new mysqli(db_host,db_user,db_password,db_database);
    $req="INSERT into t_etudiant  VALUES ('','".$this->nom."','".$this->prenom."','".$this->DateNaissance."'
    ,'".$this->CodeClasse."','".$this->NumInscription."','".$this->Adress."','".$this->mail."','".$this->Tel."')";
   $mysqli->query($req);															
   $mysqli->close();
}
function chercher_etudiant($search_term)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_etudiant WHERE nom LIKE '%$search_term%' OR prenom LIKE '%$search_term%'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}
function afficher_etudiant_by_id($CodeEtudiant)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_etudiant  where CodeEtudiant='$CodeEtudiant'";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;  

}
function lister_etudiant()
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "SELECT * FROM t_etudiant";
    $result = $mysqli->query($sql);
    $mysqli->close();
    return $result;
}

function supprimer_etudiant($CodeEtudiant)
{
    require_once '../config.php';
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $sql = "DELETE FROM t_etudiant  where CodeEtudiant='$CodeEtudiant'";
    $mysqli->query($sql);
    $mysqli->close();
}








}



?>
