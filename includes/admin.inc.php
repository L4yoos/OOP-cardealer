<?php

include "../classes/dbh.classes.php";
require "../classes/ajax.classes.php";
include "../classes/adminpanel.classes.php";
include "count.php";

$admin = new AdminPanel();
$ajax = new Ajax;

$countUsers = $admin->countUsers();
$users = $admin->usersAll();

if(isset($_POST['id'])) {
    $ajax->deleteUser();
}





