<?php

include "classes/dbh.classes.php";
include "classes/index.classes.php";
include "classes/count.classes.php";
$index = new Index();
$count = new Count();

$countQuantity = $index->countQuantity();
$countUsers = $index->countUsers();
$countCars = $index->countCars();
$cars = $index->carsForPage();