<?php
include_once "models/News.php";

/* Класс-контроллер новостей */
class NewsController{

    /* Метод отображения статей в каталоге (вместе с сортировками). 
    catalog - по умолчанию, date, views - параметры для сортировки (приходят из URI) */
    public function catalog($parameter){

        $news = new News();
        $newsList = $news->getNews($parameter);

        require_once "views/catalog.php";
        
        return true;
    }

    /* Метод получения конкретной статьи по id */
    public function getNewsItem($id){
        
        $news = new News();
        $newsItem = $news->getNewsItem($id);
        
        require_once "views/news_item.php";

        return true;
    }
}