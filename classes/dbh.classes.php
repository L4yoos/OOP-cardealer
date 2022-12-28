<?php

class Dbh {

    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $conn = new PDO("mysql:host=localhost;dbname=cardealer", $username, $password);
            return $conn;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}