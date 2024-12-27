
<?php
include '../home/navbar.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <form  class="container bg-light text p-2 my-3 col-md-4" action="liste3.php" method="post">
    <h2 class="text-center fw-bold">Entrer Les Informations</h2>
    <label  class="form-label fw-bold"for="">Jour
    <input class="form-control" type="date" name="jour" >
    </label>
    <button class="btn btn-primary" type="submit" name="submit">Chercher</button>
      <button  class="btn btn-primary" type="reset" name="submit" onclick="window.location.href ='../home/home.php';">Reset</button>     
    </form>
</body>
</html>