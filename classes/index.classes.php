<?php

class Index extends Dbh {

    public function countUsers() {
        $stmt = $this->connect()->prepare("SELECT COUNT(users_id) as 'liczba' FROM USERS;");
        $stmt->execute();

        $countUsers = $stmt->fetch();

        return $countUsers['liczba'];
    }

    public function countCars() {
        $stmt = $this->connect()->prepare("SELECT COUNT(id) as 'liczba' FROM cars;");
        $stmt->execute();

        $cars = $stmt->fetch();
        
        return $cars['liczba'];
    }

    public function countQuantity() {
        $stmt = $this->connect()->prepare("SELECT count as 'liczba' FROM count;");
        $stmt->execute();

        $cars = $stmt->fetch();
        
        return $cars['liczba'];
    }

    public function carsForPage() {
        $stmt = $this->connect()->prepare("SELECT * FROM CARS ORDER BY ID ASC;");
        $stmt->execute();

        $cars = $stmt->fetchAll();

        return $cars;
    }

    public function allCars() {
        
    }
}