<?php

include "../classes/dbh.classes.php";
require "../classes/ajax.classes.php";

$ajax = new Ajax();

if(isset($_POST['id'])) {
    $ajax->carBuy();
}

