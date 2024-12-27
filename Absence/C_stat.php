<?php
class C_stat {
    
function Liste_absence_etudiant_parMatiere($code_etudiant, $code_matiere, $date_d, $date_f){
    require_once('../config.php');
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    $date_d = date('Y-m-d', strtotime($date_d));
    $date_f = date('Y-m-d', strtotime($date_f));

    $req = "SELECT en.nom, en.prenom, DateJour, s.* 
            FROM t_ficheabsence fa, t_etudiant e, t_ligneabsence lfa, t_enseignant en, t_seance s, t_ficheabsenceseance fas 
            WHERE lfa.CodeEtudiant = $code_etudiant 
            AND e.CodeEtudiant = $code_etudiant
            AND lfa.CodeFicheAbsence = fa.CodeFicheAbsence
            AND fa.CodeMatiere = $code_matiere
            AND STR_TO_DATE(DateJour, '%Y-%m-%d') BETWEEN '$date_d' AND '$date_f'

            AND en.CodeEnseignant = fa.CodeEnseignant
            AND s.CodeSeance = fas.CodeSeance
            AND fas.CodeFicheAbsence = fa.CodeFicheAbsence ";

    $res = $mysqli->query($req);
    $mysqli->close();
    return $res;
}

function Liste_absence_etudiant($nom,$prenom, $date_d, $date_f, $nom_classe){
    require_once('../config.php');
    $mysqli = new mysqli(db_host,db_user,db_password,db_database);
    $date_d = date('Y-m-d', strtotime($date_d));
    $date_f = date('Y-m-d', strtotime($date_f));
    $req = "SELECT m.NomMatiere AS nom_matiere , m.CodeMatiere as  CodeMatiere, COUNT(*) AS nombre_absences,lfa.CodeEtudiant as CodeEtudiant
        FROM t_ficheabsence fa, t_etudiant e, t_ligneabsence lfa, t_matiere m, t_classe c
        WHERE e.nom = '$nom' 
        AND e.prenom = '$prenom'
        AND lfa.CodeEtudiant = e.CodeEtudiant
        AND lfa.CodeFicheAbsence = fa.CodeFicheAbsence
        AND fa.CodeMatiere = m.CodeMatiere
        AND e.CodeClasse = c.CodeClasse
        AND c.NomClasse = '$nom_classe'
        AND STR_TO_DATE(DateJour, '%Y-%m-%d') BETWEEN '$date_d' AND '$date_f'
        GROUP BY m.NomMatiere, e.CodeEtudiant";

    $res = $mysqli->query($req);
    $mysqli->close();
    return $res;
}
function Liste_absence_par_jour($jour) {
    require_once('../config.php');
    $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    $jour = date('Y-m-d', strtotime($jour));
    $req = "SELECT e.CodeEtudiant, e.nom, e.prenom ,DateJour
            FROM t_ficheabsence fa 
            JOIN t_ligneabsence lfa ON lfa.CodeFicheAbsence = fa.CodeFicheAbsence 
            JOIN t_etudiant e ON lfa.CodeEtudiant = e.CodeEtudiant 
            WHERE STR_TO_DATE(DateJour, '%Y-%m-%d') = '$jour'";
    $res = $mysqli->query($req);
    $mysqli->close();
    return $res;
}
}

?>