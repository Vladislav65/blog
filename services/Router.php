<?php

/* Класс-маршрутизатор приложения */

class Router{

    private $routes;

    public function __construct(){
        $this->routes = include('Routes.php');
    }

    public function routeStart(){
        
        $uri = $this->getURI();      
               
        foreach($this->routes as $uriPattern => $path){
            // Проверка на соответствие регулярному выражению
            if(preg_match("~$uriPattern~", $uri)){
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
            
                $segments = explode('/', $internalRoute); // Разбиваем путь по символу "/"

                // 1 элемент - имя контроллера, 2 - имя метода, 3 - параметры
                $controllerName = array_shift($segments)."Controller";
                $actionName = array_shift($segments);
                $parameters = $segments;

                //Подключение файла класса контроллера
                $controllerFile = "controllers/" .$controllerName. ".php";

                if(file_exists($controllerFile)){
                    include_once $controllerFile;
                }

                //Создать объект нужного класса контроллера и вызвать метод
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,
                                                     $actionName),
                                                     $parameters);

                if($result != null){
                    break;
                }
            }
        }
    }

    // Метод определения текущего URI
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){

            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }
}