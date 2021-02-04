<?php
include_once "models/Admin.php";

interface account{
    function account();
}

/* Класс-контроллер аккаунта администратора */
class AdminController implements account{

    // Метод отображения аккаунта администратора
    public function account(){

        require_once "views/admin.php";

        return true;
    }

    // Метод добавления статьи
    public function add(){
        if(isset($_POST['add'])){
            $articleData = $_POST;
            unset($articleData['add']); // Убираем название кнопки

            // Определение даты добавления статьи
            date_default_timezone_set('Europe/Minsk');
            $date = date('Y-m-d h:i:s', time());

            $articleData += ['date'=> $date];

            // Формируем путь к картинке статьи
            $articleImgPath = "templates/images/" . $_FILES['img']['name'];
            $articleData += ['img_path'=> $articleImgPath];

            $add = new Admin($articleData);
            $result = $add->add();
        }

        require_once "views/add.php";

        return true;
    }

    // Метод редактирования статьи
    public function editItem($id){
        /* Получаем содержимое необходимой статьи, чтобы записать в форму
        прежние данные */
        $getItem = new Admin($id);
        $itemForEdit = $getItem->getEditedItem($id); 

        if(isset($_POST['edit'])){
            // Получаем новые данные
            $editedItem = $_POST;
            $idAdd = ['id' => $id];
            $editedItem += $idAdd;
            unset($editedItem['edit']);

            $articleImgPath = "templates/images/" . $_FILES['img']['name'];
            $editedItem += ['img_path'=> $articleImgPath];

            $edit = new Admin($editedItem);
            $result = $edit->edit();
        }

        require_once "views/edit.php";
        
        return $result;
    }
}