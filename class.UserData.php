<?php

class UserData {
    //member variables
    private $database;
    private $username;
    private $array;

    //member functions
    function __construct($name, $db) {
        $this->database = $db;
        $this->username = $name;

        $sql = file_get_contents("SQL/getUserData.sql");
        $params = array(
            'username' => $name
        );
        $statement = $db->prepare($sql);
        $statement->execute($params);
        $this->array = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //getter functions
    function getDb() {
        return $this->database;
    }

    function getUsername() {
        return $this->username;
    }

    function getArray() {
        return $this->array;
    }
}