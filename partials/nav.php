<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  $loggedin = true;

}
else
{
  $loggedin = false;
}



echo '<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/login system">Isecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login system/welcome.php">Home</a>
        </li>';


        if(!$loggedin)
        { 
        echo '<li class="nav-item">
          <a class="nav-link" href="/login system/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login system/signup.php">Signup</a>
        </li>';
        }

          if($loggedin)
          { 
       echo '<li class="nav-item">
          <a class="nav-link" href="/login system/logout.php">Log out</a>
        </li>';
          }
        echo '<!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
?>