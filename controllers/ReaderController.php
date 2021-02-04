<?php
include_once "AdminController.php";

/* Класс-контроллер аккаунта читателя */
class ReaderController implements account{

    public function account(){

        require_once "views/reader.php";

        return true;
    }
}

