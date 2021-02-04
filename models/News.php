<?php
include_once 'services/Db.php';

/* Модель сущность "новость" */
class News{

    // Метод получения списка статей (с сортировкой по входящему параметру или без)
    public function getNews($parameter){

        /* В зависимости от полученного параметра вывода статей
        ("catalog" - по умолчанию, "date" - сортировка по дате,
         "views" - сортировка по просмотрам) формируется запрос к БД */
        switch($parameter){
            case "catalog":{
                $params = [];
                $db = new Db();
                $newsList = $db->row('SELECT * FROM news', $params);
            }
            break;

            case "date":{
                $params = [];
                $db = new Db();
                $newsList = $db->row('SELECT * FROM news ORDER BY date DESC', $params);
            }
            break;

            case "views":{
                $params = [];
                $db = new Db();
                $newsList = $db->row('SELECT * FROM news ORDER BY views DESC', $params);
            }
            break;
        }

        return $newsList;
    }

    // Метод получения определённой статьи по id
    public function getNewsItem($id){

        /* Подсчёт и запись кол-ва просмотров */
        $this->countViews($id);

        $params = [
            'id' => $id
        ];

        $db = new Db();
        $newsItem = $db->row('SELECT * FROM news WHERE id = :id', $params);
        
        return $newsItem;
    }

    // Метод подсчёта просмотров каждой статьи
    private function countViews($id){

        $idS = [];
        $views = [];
        
        // Выбираем из БД id статей и исходное кол-во просмотров
        $db = new Db();
        $idAndViewAssoc = $db->row('SELECT id, views FROM news');
        
        // Запись id и просмотров в отдельные массивы
        foreach($idAndViewAssoc as $key => $value){
            $idS[] = $value['id'];
            $views[] = $value['views'];
        }

        $idViewResult = array_combine($idS, $views);

        // Увеличиваем на единицу счётчик просмотров текущей статьи и перезаписываем данные
        $idViewResult[$id]++;
        $params = [
            'view' => $idViewResult[$id],
            'id' => $id,
        ];

        $db->column('UPDATE news SET views = :view WHERE id = :id', $params);

        return true;
    }
}