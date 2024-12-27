<?php
include '../home/navbar.html';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Liste absence</title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>

<br>
<form class="container bg-light text p-2 my-3 col-md-4" method="post" action="liste1.php">
<h2 class="text-center fw-bold">Entrer Les Informations</h2>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label class="form-label fw-bold" >Date de Debut</label>
            <input class="form-control" type="date" autocomplete="off" name="debut" />
            <i class="fa fa-calendar"></i>
          </div>
          <div class="groupe">
            <label class="form-label fw-bold">Date de Fin </label>
            <input class="form-control" type="date" autocomplete="off" name="fin" />           
             <i class="fa fa-calendar"></i>
          </div>
          <div class="groupe">
            <label class="form-label fw-bold">Classe</label>
            <select class="form-control" name="classe" id="">
              <?php 
              mysql_connect("localhost","root","") or die("Erreur connexion");
              mysql_select_db("projet") or die("Erreur sélection");
               $req = "SELECT NomClasse FROM t_classe";
               $res = mysql_query($req);          
               while($row =mysql_fetch_array($res)) {
              ?>
<option value="<?php echo $row['NomClasse']; ?>" style="color: black;"><?php echo $row['NomClasse']; ?></option>
        <?php }?>

            </select>


            <i class="fa fa-university"></i>
          </div>


          
          <div class="groupe">
            <label class="form-label fw-bold" >Nom Etudiant</label>
            <select class="form-control"  name="nom" id="">
              <?php 
              mysql_connect("localhost","root","") or die("Erreur connexion");
              mysql_select_db("projet") or die("Erreur sélection");
               $req = "SELECT nom FROM t_etudiant";
               $res = mysql_query($req);          
               while($row =mysql_fetch_array($res)) {
              ?>
<option value="<?php echo $row['nom']; ?>" style="color: black;"><?php echo $row['nom']; ?></option>
        <?php }?>
            </select>
            <i class="fa fa-list"></i>
          </div>
          <div class="groupe">
            <label class="form-label fw-bold">Prenom Etudiant</label>
            <select class="form-control" name="prenom" id="">
              <?php 
              mysql_connect("localhost","root","") or die("Erreur connexion");
              mysql_select_db("projet") or die("Erreur sélection");
               $req = "SELECT prenom FROM t_etudiant";
               $res = mysql_query($req);          
               while($row =mysql_fetch_array($res)) {
              ?>
<option value="<?php echo $row['prenom']; ?>" style="color: black;"><?php echo $row['prenom']; ?></option>
        <?php }?>
            </select>
            <i class="fa fa-list"></i>
          </div>
        </div>
       <div>
      <button class="btn btn-primary" type="submit" name="submit">Chercher</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='../home/home.php';">Reset</button></div>
    </form>
  </body>
</html>







