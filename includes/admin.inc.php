<?php

include "../classes/dbh.classes.php";
include "../classes/adminpanel.classes.php";
include "../classes/count.classes.php";

$admin = new AdminPanel();

if(isset($_POST['submit'])) {
    $admin->addCar();
}

$count = new Count();
$count->counterVisit();

$countUsers = $admin->countUsers();
$users = $admin->usersAll();





