<?php

/* Класс взаимодействия с базой данных */
class Db{

    protected $db;

    public function __construct(){
        // Параметры соединения с БД
        $host = "localhost";
        $username = "mysql";
        $password = "mysql";
        $dbName = "blog";
        $port = 3307;

        $this->db = new PDO("mysql:host=$host;dbname=$dbName;port=$port", $username, $password);    
    }

    // Основной метод выполнения запросов к БД
    public function query($sql, $params = []){
        $stmt = $this->db->prepare($sql);
    
        if(!empty($params)){
            // Связывание значений из параметров
            foreach($params as $key => $value){
                $stmt->bindValue(':'.$key, $value);
            }
        }

        $stmt->execute();
        return $stmt;
    }

    // Метод выполнения запросов к полной строке в БД
    public function row($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Метод выполнения запросов к одной ячейке в БД
    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}