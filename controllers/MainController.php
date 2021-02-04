<?php

/* Класс-контроллер главной страницы */
class MainController{
    
    public function index(){
        
        require_once "views/index.php";
        
        return true;
    }
}