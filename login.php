<?php
    $login = false;
    $showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];


    // $sql = "Select * from users where username = '$username' AND password  = '$password'";
    $sql = "Select * from users where username = '$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num == 1)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        if(password_verify($password, $row['password']))
        {
              $login = true;
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $username;
              header("location: welcome.php");
    
        }
        else{
          $showerror = "Invalid Credentials";
        }
      }
      
  



    }
    
  //   if ($num ==1)
  //   {
  //       $login = true;
  //   }
  //   else 
  //   {
  //        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  //           <strong>Alert!</strong>Invalid Credentials.
  //           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  //          </div>';
  //   }
  //   if($login)
  //   {  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  //     <strong>Sucess!</strong> You are logged in Successfully.
  //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  //     </div>';
  // }

    // if( $exists == false)
    // {
    //     if($password == $cpassword)
    //     {
    //         $sql = "INSERT INTO `users` (`username`, `password`, `gender`, `time`) VALUES ( '$username', '$password', '$gender', current_timestamp())";
    //        
    //         if($result)
    //         {
    //             $err = false;
    //         }
    //     }
    //     else
    //     {
    //         $errp = true;
    //     }
    // }
    // else
    // {
    //     echo "UserName is already Taken";
    // }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
          if($login)
          {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged In successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          
          if($showerror)
          {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> '.$showerror.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          }

        // else
        // {
        //     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        //     <strong>Alert!</strong> Account Not Created successfully.
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //     </div>';
        // }

?>
     <div class="container">
    <h2 class = "text-center">Login to our Website</h2>
    <form action="/login system/login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">UserName</label>
    <input type="text" maxlength = "11"class="form-control" id="username" name = "username" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Password</label>
    <input type="password" maxlength = "20" class="form-control" id="password" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Log in</button>
</form>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>