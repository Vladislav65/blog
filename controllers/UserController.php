<?php
include_once "models/User.php";

/* Класс-контроллер пользовательских операций (авторизация-регистрация) */
class UserController{

    public function registration(){

        if(isset($_POST['reg'])){
            $regData = $_POST;
            unset($regData['reg']);

            // Вызываем объект класса-модели и метод регистрации
            // Данные передаются в модель для проверки на уникальность в БД  
            $registration = new User($regData);
            $regResult = $registration->registration();
        }
        
        require_once "views/registration.php";

        return true;
    }

    public function auth(){
        if(isset($_POST['auth'])){
            $authData = $_POST;
            unset($authData['auth']);
  
            $auth = new User($authData);
            $authResult = $auth->auth();

            /* Перенаправляем пользователя на соответствующую страницу
            в зависимости от статуса (админ-читатель) */
            if($authResult == "admin"){
                header('Location: admin');
                exit();
            }elseif($authResult == "reader"){
                header('Location: reader');
                exit();
            }
        }
        
        require_once "views/auth.php";

        return true;
    }

    public static function isAuthorized(){

        // Вызов метода проверки пользователя на авторизованность
        $result = User::isAuthorized();  

        return $result;
    }

    // Метод, реализующий выход из аккаунта
    public function logout(){
        
        $result = User::logout();
        if($result == true){
            header('Location: /');
        }
    }
}