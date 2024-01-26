


<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("location: login.php");
  exit;
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $_SESSION['username']?></title>
</head>
<body>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <?php require'partials/nav.php'
     ?>
   
     <div class="container my-4">
     <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">  Welcome - <?php echo  $_SESSION['username']?></h4>
  <p>Hey! You Made it to Here! Welcome to OnRent.pk . Now you can borrow or lend things to your sorroundings. To upgrade your account to next level click on upgrade Account option displayed in Right Corner.</p>
  <hr>
  <p class="mb-0">Whenever you need to you can   <a href="/login system/logout.php">logout</a></p>
</div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>