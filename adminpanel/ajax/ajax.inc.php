<?php

require 'dbh.classes.php';
require 'ajax.classes.php';
include "../../classes/adminpanel.classes.php";

$ajax = new Ajax;

if(isset($_POST['id'])) {
    $ajax->deleteUser();
}

?>