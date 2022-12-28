<?php

include "../classes/dbh.classes.php";
require "../classes/ajax.classes.php";

$ajax = new Ajax();

if(isset($_POST['modalid'])) {
    $ajax->editUser();
}

if(isset($_POST['id'])) {
    $ajax->deleteUser();
}

