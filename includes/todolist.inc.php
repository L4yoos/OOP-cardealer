<?php

include "../classes/dbh.classes.php";
require "../classes/ajax.classes.php";
include "../classes/todolist.classes.php";

$todosClass = new Todolist();

$todos = $todosClass->todoCount();

if(isset($_POST['title'])) {
    $todosClass->todoAdd();
}

if(isset($_POST['id'])) {
    if(isset($_POST['value'])) {
        $todosClass->todoCheck();
    }
    else {
        $todosClass->todoRemove();
    } 
}