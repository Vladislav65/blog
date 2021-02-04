<?php
include_once "services/Db.php";

/* Модель администратор */
class Admin{
    private $data;

    public function __construct($data){
        $this->data = $data;
    }

    // Метод добавления статьи
    public function add(){

        $result = true;

        /* Проверка на существование статьи с таким же названием в БД */
        $res = $this->checkTitleExistance();

        /* Если возвращённый массив пуст - статьи с таким названием нет, 
        запись продолжается */
        if(empty($res)){
            // Массив параметров prepared statement для защиты от SQL-инъекций
            $params = [
                'img' => $this->data['img_path'],
                'title' => $this->data['title'],
                'content' => $this->data['content'],
                'date' => $this->data['date'],
            ];
    
            $db = new Db(); // Вызов объекта класса для работы с БД
            $db->row('INSERT INTO news(img, title, content, date)
            VALUES(:img, :title, :content, :date)', $params);        
    
            move_uploaded_file($_FILES['img']['tmp_name'], $this->data['img_path']);

            $result = "Статья была успешно добавлена";
        }else{
            $result = "Статья с таким названием уже существует";
        }

        return $result;
    }

    // Метод получения редактируемой статьи
    public function getEditedItem($id){
        
        $params = [
            'id' => $id
        ];

        $db = new Db();
        $itemForEdit = $db->row('SELECT * FROM news WHERE id = :id', $params);
        
        return $itemForEdit;
    }

    // Метод редактирования статьи
    public function edit(){
        
        /* Проверка на существование статьи с таким же названием в БД */
        $res = $this->checkTitleExistance();
        
        if(empty($res)){
            $params = [
                'img' => $this->data['img_path'],
                'title' => $this->data['title'],
                'content' => $this->data['content'],
                'id' => $this->data['id']
            ];
    
            $db = new Db();
            $db->column('UPDATE news SET img = :img, title = :title, content = :content WHERE id = :id', $params);        
    
            move_uploaded_file($_FILES['img']['tmp_name'], $this->data['img_path']);

            $result = "Статья была успешно отредактирована";
        }else{
            $result = "Статья с таким названием уже существует";
        }

        return $result;
    }

    private function checkTitleExistance(){

        $db = new Db();
        $params = [
            'title' => $this->data['title'],
        ];
        $res = $db->row('SELECT * FROM news WHERE title = :title', $params);

        return $res;
    }
}