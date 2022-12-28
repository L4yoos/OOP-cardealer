<?php
    session_start();
    include "includes/index.inc.php";
    error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis Samochodowy - DalunCAR</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="index.php"><span class="navbar-brand mb-0 h1">DalunCAR</span></a>
    <div class="d-flex align-items-center">
      <?php if(isset($_SESSION["userid"]) and $_SESSION["is_admin"] == 1) { ?>
        <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="images/patrick.jpg" class="rounded-circle" height="40" alt="daluni chad" loading="lazy"/>
            </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="adminpanel/list.php">Todolist</a>
          </li>
          <li>
            <a class="dropdown-item" href="adminpanel/">Panel Administracyjny</a>
          </li>
          <li>
            <a class="dropdown-item" href="adminpanel/car.php">Dodaj samochód!</a>
          </li>
          <li>
            <a class="logout dropdown-item" href="includes/logout.inc.php">Wyloguj sie!</a>
          </li>
        </ul>
        <?php } 
        elseif (isset($_SESSION["userid"])) {?>
                  <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="images/patrick.jpg" class="rounded-circle" height="40" alt="daluni chad" loading="lazy"/>
            </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="logout dropdown-item" href="includes/logout.inc.php">Wyloguj sie!</a>
          </li>
        </ul>
        <?php } else {?>
          <a href="login.php"><button type="button" class="btn btn-danger px-3 me-2">
          Zaloguj sie!
        </button></a>
        <a href="signup.php"><button type="button" class="btn btn-success me-3">
          Zarejestruj sie!
        </button></a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
</header>
<main>
<section class="banner">
<div class="bg-image" id="myDIV">
  <div class="mask mask-custom">
    <div class="d-flex flex-column justify-content-center align-items-center h-100">
      <img src="images/daluncarprzezro.png" style="height: 50vh; top: 0;" >
      <h2 class="text-white texttest" style="text-transform: uppercase;">Kup już teraz u nas w <span style="color: blue;">Salonie!</span></h2>
    </div>
    </div>
  </div>
</div>
</section>
<section class="main">
<div class="p-5 text-center w-100">
    <h1 class="mb-3 texttest" style="color: black;">Na co masz ochote?</h1>
    <div class="d-flex justify-content-evenly">
        <a class="icon" href="#cars-cards"><i class="fas fa-car-alt fa-2x"></i></a>
        <a class="icon" href="#graph"><i class="fas fa-chart-line fa-2x"></i></a>
        <a class="icon" href="#contact"><i class="fas fa-envelope fa-2x"></i></a>
    </div>
  </div>
    <section id="cars-cards">
      <div class="container-fluid">
      <?php if(isset($_SESSION["userid"])) { ?>
        <h4 class="text-center mb-3 texttest1"> Aby zakupić samochód kliknij w zielony przycisk!</h4>
      <?php } else { ?>
        <h4 class="text-center mb-3 texttest1 "> Aby zakupić samochód zaloguj sie!</h4>
      <?php } ?>
      <div class="row justify-content-around">
      <?php  foreach($cars as $car) { ?>
          <div class="uppercard col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="dark">
              <img src="<?php echo $car[10]; ?>" class="img-fluid"/>
              <a href="#!">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.2);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $car[1]. " " .$car[2]; ?></h5>
              <p class="card-text text-truncate"><?php echo $car[3]; ?></p>
              <h5 class="text-center"><?php echo $car[4]; ?> PLN</h5>
              <div class="card-footer">                  
                  <i class="fas fa-car-alt"></i>&nbsp;<?php echo $car[5]; ?>
                  <i class="fas fa-filter"></i>&nbsp;<?php echo $car[6]; ?>
                  <i class="fas fa-horse"></i>&nbsp;<?php echo $car[7]; ?>
                  <i class="fas fa-calendar-alt"></i>&nbsp;<?php echo $car[8]; ?>
                  <i class="fas fa-sort-numeric-up"></i>&nbsp;<?php echo $car[9]; ?>
              </div>
              <?php if(isset($_SESSION["userid"])) { ?>
                <div class="text-center">
                  <a href="#" id="<?php echo $car[0]; ?>">
                  <button type="button" class="btn btn-success px-3 me-2">
                    Zakup Samochód!
                  </button>
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
		      </div>
        
        <?php } ?>
        </div>
      </div>
    </section>
    <section id="graph">
    <div class="p-5 text-center w-100">
      <h1 class="mb-3 texttest" style="color: black;">My w Liczbach</h1>
      <div class="d-flex flex-column px-6">
          <div class="mx-auto p-3">
            <div class="box darkblue rounded-6"><p class="textp">Suma sprzedanych samochodów</p><h2 class="text-light"><?php echo $countQuantity; ?></h2></div>
          </div>
          <div class="mx-auto p-3">
            <div class="box blue rounded-6"><p class="textp">Kwantum zadowolonych Klientów</p><h2 class="text-light"><?php echo $countUsers; ?></h2></div>
          </div>
          <div class="mx-auto p-3">
            <div class="box darkblue rounded-6"><p class="textp">Ilość samochodów w Salonie</p><h2 class="text-light"><?php echo $countCars; ?></h2></div>
          </div>
          <div class="mx-auto p-3">
            <div class="box blue rounded-6"><p class="textp">Liczba Odwiedzin</p><h2 class="text-light"><?php echo $count->allVisit();?></h2></div>
          </div>
      </div>
      </div>
    </div>
    </section>
    <section id="contact">
    <div class="row d-flex justify-content-center text-center p-5 w-100">
        <h1 class="mb-3 texttest" style="color: black;">Skontaktuj sie z nami!</h1>
      <div class="form-section">
        <form action="mail.php" method="post">
        <div class="form-outline mb-4 w-50 mx-auto">
            <input type="text" name="username" id="form1" class="form-control" placeholder="Wpisz nazwe użytkownika">
            <label class="form-label" for="form1">Imie i Nazwisko</label>
          </div>
          <div class="form-outline mb-4 w-50 mx-auto">
            <input type="text" name="email" id="form1" class="form-control" placeholder="Wpisz nazwe użytkownika">
            <label class="form-label" for="form1">Twój E-mail</label>
          </div>
          <div class="form-outline mb-4 w-50 mx-auto">
            <input type="text" name="phone" id="form1" class="form-control" placeholder="Wpisz nazwe użytkownika">
            <label class="form-label" for="form1">Numer Telefonu</label>
          </div>
          <div class="form-outline mb-4 w-50 mx-auto">
            <textarea name="text" id="form1" class="form-control" cols="30" rows="5" style="resize: none;"></textarea>
            <label class="form-label" for="form1">Treść</label>
          </div>
            <button type="submit" name="updatedata" class="btn btn-primary">Wyślij Wiadomość!</button>
        </form>
    </div>
    <div class="col-lg-6 my-4">
      <iframe
        src="https://maps.google.com/maps?q=Warszawa&t=&z=13&ie=UTF8&iwloc=&output=embed"
        class="w-100" height="400" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </div>
    </section>
    <footer id="footer">
        <div class="container-fluid">
               <p class="small text-center" style="color: #878a8f;">
                © 2022 Konrad Dalecki.
                <br>
                Made With <i class="fa-solid fa-heart"></i> Zduńska Wola, Poland
               </p>
            </div>
        </div>
    </footer>
</section>

</main>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<?php

if($_SESSION["loggedin"] == true) {
  echo "<script>
  $(document).ready(function(){
    Swal.fire({
      title: 'Udalo sie!',
      text: 'Zalogowales sie!',
    })
  });
</script>";
  $_SESSION["loggedin"] = false;
}

if($_SESSION["registered"] == true) {
  echo "<script>
  $(document).ready(function(){
    Swal.fire({
      title: 'Udalo sie!',
      text: 'Zarejestrowales sie, a teraz zaloguj sie!!',
    })
  });
</script>";
  $_SESSION["registered"] = false;
}

if($_SESSION["mail"] == true) {
  echo "<script>
  $(document).ready(function(){
    Swal.fire({
      icon: 'success',
      title: 'Udalo sie!',
    })
  });
</script>";
  $_SESSION["mail"] = false;
}

?>
<script>
    $(document).ready(function(){
        $('.logout').click(function(){
          Swal.fire({
           icon: 'success',
           title: 'Zostaniesz Wylogowany za sekunde!',
           timer: 500
          });
        })
        $('.btn').click(function(){
          var hiperlink = $(this).closest('a');
          var id = hiperlink.attr('id');
          var div = $(this).closest('.uppercard');
          console.log(id);
          $.post('includes/ajax.inc.php', {
                id: id
            }, (data) => {
                        Swal.fire({
                              icon: 'success',
                              title: 'Zakupiles Samochod!',
                              timer: 1500
                        });
                        div.remove();
                });
        })
    });
</script>
</body>
</html>