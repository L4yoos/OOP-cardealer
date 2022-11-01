<?php

class AdminPanel extends Dbh {

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
        
        echo $cars["liczba"];
    }

    public function usersAll() {
        $stmt = $this->connect()->prepare("SELECT * FROM USERS ORDER BY users_id ASC;");
        $stmt->execute();

        $user = $stmt->fetchAll();

        return $user;
        
    }

}