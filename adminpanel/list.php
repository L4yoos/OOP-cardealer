<?php

session_start();
include "../includes/todolist.inc.php";
// if(($_SESSION["loggedIn"] != true) || ($_SESSION['is_admin'] != true)){
//   header("Location: ../komis.php");
//   exit;
// }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DalunCar - TodoList</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../css/list.css"/>
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="../komis.php"><h2>Dalun<span>CAR</span></h2></a>
        </div>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="../../images/patrick.jpg" class="rounded-circle" height="35" alt="daluni chad" loading="lazy"/>
            </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="list.php">Todolist</a>
          </li>
          <li>
            <a class="dropdown-item" href="../admin.php">Panel Administracyjny</a>
          </li>
          <li>
            <a class="dropdown-item" href="../car.php">Dodaj samochód!</a>
          </li>
          <li>
            <a class="dropdown-item" href="../logout.php">Wyloguj sie!</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <div class="main-section">
        <div class="add-section">
        <?php echo "<h2 style='color:#000; text-align:center;'>Witaj " . $_SESSION["useruid"]. "</h2>"; ?>
            <form action="../includes/todolist.inc.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="title" placeholder="Tytul" style="border-color: red;">
                    <button type="submit">Dodaj Zadanie!</button>
                <?php } else{ ?>
                <input type="text" name="title" placeholder="Tytul">
                    <button type="submit">Dodaj Zadanie!</button>
                <?php } ?>
            </form>
        </div>
        <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0) { ?>
            <div class="todo-item">
                <div class="empty">
                    <h2>Add your First Item!</h2>
                </div>
            </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="todo-item">
                <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>
                <?php if($todo['checked']) { ?>
                    <input type="checkbox" data-todo-id="<?php echo $todo['id']; ?>" class="check-box" value="0" checked>
                    <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <br>
                    <small>Created: <?php echo $todo['date_time'] ?></small>
                <?php } else { ?>
                    <input type="checkbox" data-todo-id="<?php echo $todo['id']; ?>" class="check-box" value="0">
                    <h2><?php echo $todo['title'] ?></h2>
                    <br>
                    <small>Created: <?php echo $todo['date_time'] ?></small>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                $.post("../includes/todolist.inc.php", 
                {
                    id: id
                },
                (data) => {
                    if(data){
                        $(this).parent().hide(600);
                    }
                }
                );
            });

            $('.check-box').click(function(){
                const id = $(this).attr('data-todo-id');
                const value = $(this).attr('value');
                $.post('../includes/todolist.inc.php',
                {
                    id: id,
                    value: value
                },
                (data) => {
                    if(data != "error"){
                        const h2 = $(this).next();
                        if(data === '1'){
                            h2.removeClass('checked');
                        } else {
                            h2.addClass('checked');
                        }
                    }
                } 
                );
            });
        });
    </script>
</body>
</html>