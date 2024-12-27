<?php
include '../home/navbar.html';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title></title>
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <br />
    <form class="container bg-light text p-2 my-3 col-md-4" method="post" action="liste2.php">
    <h2 class="text-center fw-bold">Entrer Les Informations</h2>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label class="form-label fw-bold" for="CodeEtudiant">Code Etudiant</label>
            <input class="form-control" type="text" name="CodeEtudiant" id="CodeEtudiant" />
            <i class="fa fa-university"></i>
          </div>
          <div class="groupe">
            <label  class="form-label fw-bold" for="CodeMatiere">Matiere</label>
            <select class="form-control"  name="CodeMatiere" id="CodeMatiere">
              <?php 
              mysql_connect("localhost","root","") or die("Erreur connexion");
              mysql_select_db("projet") or die("Erreur sélection");
               $req = "SELECT * FROM t_matiere";
               $res = mysql_query($req);          
               while($row =mysql_fetch_array($res)) {
              ?>
<option value="<?php echo $row['CodeMatiere']; ?>" style="color: black;"><?php echo $row['NomMatiere']; ?></option>
        <?php }?>
            </select>
            <i class="fa fa-university"></i>
          </div>
          <div class="groupe">
            <label  class="form-label fw-bold" for="debut">Date de Debut</label>
            <input class="form-control"  type="date" autocomplete="off" name="debut" id="debut" />
            <i class="fa fa-calendar"></i>
          </div>
          <div class="groupe">
            <label class="form-label fw-bold" for="fin">Date de Fin</label>
            <input class="form-control" type="date" autocomplete="off" name="fin" id="fin" />
            <i class="fa fa-calendar"></i>
          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="submit">Chercher</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='../home/home.php';">Reset</button>      
    </form>
  </body>
</html>
