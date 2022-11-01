<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/list.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button"  data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <i class="fas fa-bars"></i>
        </button>
        <a href="index.php"><span class="navbar-brand mb-0 h1">DalunCAR</span></a>
    <div class="d-flex align-items-center">
      <?php if(isset($_SESSION["userid"])) { ?>
        <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="images/patrick.jpg" class="rounded-circle" height="40" alt="daluni chad" loading="lazy"/>
            </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="todolist/list.php">Todolist</a>
          </li>
          <li>
            <a class="dropdown-item" href="admin.php">Panel Administracyjny</a>
          </li>
          <li>
            <a class="dropdown-item" href="car.php">Dodaj samochód!</a>
          </li>
          <li>
            <a class="dropdown-item" href="includes/logout.inc.php">Wyloguj sie!</a>
          </li>
        </ul>
        <?php } else { ?>
          <a href="login.php"><button type="button" class="btn btn-link px-3 me-2">
          Zaloguj sie!
        </button></a>
        <a href="signup.php"><button type="button" class="btn btn-primary me-3">
          Zarejestruj sie!
        </button></a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
    <div class="form-section">
    <form action="includes/login.inc.php" method="post">
            <h2 class="text" style="color:#000; font-size: 2rem; font-weight: 800;">Logowanie!</h2>
            <input type="text" placeholder="Username" name="uid" class="form-control">
            <input type="password" placeholder="Password" name="pwd" class="form-control">
            <button name="submit">Zaloguj się!</button>
        <p style="color: #000;">Nie masz konta? <a href="signup.php">Zarejestruj się!</a></p>
        </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
<?php

if($_SESSION["usernotfound"] == true) {
  echo "
  $(document).ready(function(){
    Swal.fire({
      title: 'Sweet Rudy!',
      text: 'Nie znaleziono takiego użytkownika!',
      imageUrl: 'images/rudy.png',
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: 'Custom image',
    })
  });";
  $_SESSION["usernotfound"] = false;
}

if($_SESSION["wrongpassword"] == true) {
  echo "
  $(document).ready(function(){
    Swal.fire({
      title: 'Sweet Rudy!',
      text: 'Złe hasło lub nazwa użytkownika!',
      imageUrl: 'images/rudy.png',
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: 'Custom image',
    })
  });";
  $_SESSION["wrongpassword"] = false;
}
?>
</script>
</body>
</html>