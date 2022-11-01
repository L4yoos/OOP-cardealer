<?php

session_start();
include "../includes/admin.inc.php";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis Samochodowy - DalunCAR</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button"  data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <i class="fas fa-bars"></i>
        </button>
        <a href="index.php"><span class="navbar-brand mb-0 h1">DalunCAR</span></a>
    <div class="d-flex align-items-center">
      <?php if(isset($_SESSION["userid"]) and $_SESSION["is_admin"] == 1) { ?>
        <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="../images/patrick.jpg" class="rounded-circle" height="40" alt="daluni chad" loading="lazy"/>
            </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="todolist/index.php">Todolist</a>
          </li>
          <li>
            <a class="dropdown-item" href="index.php">Panel Administracyjny</a>
          </li>
          <li>
            <a class="dropdown-item" href="car.php">Dodaj samochód!</a>
          </li>
          <li>
            <a class="logout dropdown-item" href="../includes/logout.inc.php">Wyloguj sie!</a>
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
</header>
<main>
	<div class="container pt-4">
        <section class="rows-section">
	        <div class="row">
	            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                            <div id="apollosixone">
                                <h3 class="text-success"><?php echo $countUsers; ?></h3>
                                <p class="mb-0">Ilość Użytkowników</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fa-solid fa-user text-success fa-3x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-primary"><?php $admin->countCars(); ?></h3>
                                <p class="mb-0">Ilość Samochodów</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fa-solid fa-car text-primary fa-3x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-danger"><?php echo $count; ?></h3>
                                <p class="mb-0">Wszystkie Wizyty</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-map-signs text-danger fa-3x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success"></h3>
                                    <p class="mb-0">Przychód</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa-solid fa-wallet text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>			
	        </div>
        </section>
<section class="table-section">
<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center"><strong><i class="fa-solid fa-user"></i> Tabela Użytkowników</strong></h5>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-sm table-hover text-nowrap">
            <thead>
    			<tr>
      				<th scope="col">ID</th>
      				<th scope="col">Username</th>
      				<th scope="col">Email</th>
      				<th scope="col">Is_admin</th>
      				<th scope="col">Opcje</th>
    			</tr>
  			</thead>
  			<tbody>
                <?php  foreach($users as $user) { ?>
    			<tr>
					<th scope="row"><?php echo $user[0]; ?></th>
					<td><?php echo $user[1]; ?></td>
					<td><?php echo $user[3]; ?></td>
					<td><?php echo $user[4]; ?></td>
      				<td> 
						<button type="button" id="<?php echo $user[0] ?>" class="del btn btn-link btn-sm px-3" data-ripple-color="dark">
						<i class="fas fa-times"></i>
                        </button>
                         
						<button type="button" id="<?php echo $user[0] ?>" class="edit btn btn-link btn-sm px-3" data-ripple-color="dark"> 
						<i class="fa-solid fa-user-pen"></i> </button>
        			
						<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        				<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edytuj Użytkownika</h5>
									<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
								</div>
					<form action="" method="POST">
						<div class="modal-body">
							<div class="form-outline mb-4">
							    <input type="text" name="username" id="form1" class="form-control" placeholder="Wpisz nazwe użytkownika">
                                <label class="form-label" for="form1">Username</label>
							</div>
							<div class="form-outline mb-4">
								<input type="text" name="email" id="form2" class="form-control" placeholder="Wpisz email">
                                <label class="form-label" for="form2"> Email </label>
							</div>
							<div class="form-outline mb-4">
								<input type="text" name="is_admin" id="form3" class="form-control" placeholder="(0 : 1)">
                                <label class="form-label" for="form3"> Is_admin </label>
							</div>
                    	</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Zamnkij</button>
							<button type="submit" name="updatedata" class="btn btn-primary">Aktualizuj Użytkownika</button>
						</div>
                	</form>
            				</div>
        				</div>
    					</div>
        			</td>
    			</tr>
                <?php } ?>
  			</tbody>
		</table>
	</div>
</div>
	</div>
</div>
</section>
    </div>
</main>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){
            $('.del').click(function(){         
            var liUsers = $('#apollosixone').find("h3").text();
            var liczbaUsers = $('#apollosixone').find("h3").text(liUsers - 1);
            var tr = $(this).closest('tr');
            const id = $(this).attr('id');
            $.post('../includes/admin.inc.php', {
                id: id
            }, (data) => {
                    if(data){
                        Swal.fire({
                              icon: 'success',
                              title: 'Usunales Użytkownika!',
                              timer: 1500
                        });
                        tr.remove();
                    }
                });
        });
    });
</script>
</body>
</html>