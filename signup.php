<?php
$showalert= false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $gender = $_POST["gender"];
    //$exists = false;
    //Cheaking weather exists or not 
    $existsql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn,$existsql);
    $numexistrow = mysqli_num_rows($result);


    if($numexistrow > 0)
    {
     // $exists = true;
      $showerror = "User already exists";
    }
    else 
    {
      //$exists==false;
    if(($password == $cpassword))
    {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`username`, `password`, `gender`, `time`) VALUES ( '$username', '$hash', '$gender', current_timestamp())";
      $result = mysqli_query($conn,$sql);
      if($result)
      {
          $showalert= true;
          header("location: login.php");
      }
    }
    else 
    {
      $showerror = "Password do not match ";
    }
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
       <?php
     if($showalert)
          {  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> Account Created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if ($showerror)
        {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong>'.$showerror.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
?>
     <div class="container">
    <h2 class = "text-center">Sign Up to our Website</h2>
    <form action="/login system/signup.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">UserName</label>
    <input type="text" class="form-control" maxlength = "11" id="username" name = "username" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Password</label>
    <input type="password" maxlength = "20"class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" maxlength = "20" class="form-control" id="cpassword" name = "cpassword">
    <div id="emailHelp" class="form-text">Make Sure to type the same Password as Above.</div>
  </div>
  <div class="container my-2">
  <label for="gender"> Select you gender</label>
<select name="gender">
	<option value="none" selected>Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
	<option value="other">other</option>
</select>
</div>

  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>