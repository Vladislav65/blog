<?php
include_once 'services/Db.php';

/* Модель пользователя */
class User{
    private $userData;

    public function __construct($userData){
        $this->userData = $userData;
    }

    public function registration(){
        $regResult = '';

        /* Проверка на уникальность email в БД */
        $db = new Db();
        $params = [
            'email' => $this->userData['email'],
        ];
        $res = $db->row('SELECT * FROM users WHERE email = :email', $params);

        if(empty($res)){
            // Хэширование пароля
            $hash = password_hash($this->userData['password'], PASSWORD_BCRYPT);
                 
            $params = [
                'first_name' => $this->userData['first_name'],
                'surname' => $this->userData['surname'],
                'email' => $this->userData['email'],
                'password' => $hash
            ];
            
            $save = $db->row('INSERT INTO users(first_name, surname, email, password)
            VALUES(:first_name, :surname, :email, :password)', $params);
            
            $regResult = "Вы были успешно зарегистрированы";
        }else{
            $regResult = "Пользователь с таким email уже зарегистрирован";
        }    

        return $regResult;
    }

    public function auth(){
        $authResult = '';
        
        $db = new Db();
        $params = [
            'email' => $this->userData['email'],
        ];

        $res = $db->row('SELECT * FROM users WHERE email = :email', $params);
        if(!empty($res)){
            $hash = $res[0]['password']; // Получаем хэш пароля из БД
        
            // Сравнение хэша из БД с хэшем входящего пароля
            if(!(password_verify($this->userData['password'], $hash))){
                $authResult = "Неверный логин или (и) пароль";
            }else{
                // Формируем сессию для пользователя и записываем его данные
                $_SESSION['user'] = [
                    'id' => $res[0]['id'],
                    'first_name' => $res[0]['first_name'],
                    'surname' => $res[0]['surname'],
                    'email' => $res[0]['email'],
                    //'password' => $this->userData['password'],
                    'status' => $res[0]['status'],
                ];

                // Формируем куки. Их запись происходит в БД и для пользователя
                /* Чтобы пользователю не приходилось каждый день авторизовываться
                (после того, как закончится сессия) */
                $key = $this->generateSalt(); // Генерация "соли"
                setcookie('email', $res[0]['email'], time()+60*60*24);
                setcookie('key', $key, time()+60*60*24);

                $params = [
                    'email' => $res[0]['email']
                ];

                // Запись куки 
                $db->column("UPDATE users SET cookie='$key' WHERE email = :email", $params);

                if($_SESSION['user']['status'] == "reader"){
                    $authResult = "reader";
                }else{
                    $authResult = "admin";
                }
            }
        }else{
            $authResult = "Неверный логин или (и) пароль";
        }

        return $authResult;
    }

    // Метод проверки, авторизован ли пользователь
    public static function isAuthorized(){
        $authFlag = 'notAuthorized';

        // Если сессия существует, пользователь авторизован и определяется его статус
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['status'] == "admin"){
                $authFlag = "admin";
            }else{
                $authFlag = "reader";
            }
            // Если сессия отсутствует
        }else{
            // Авторизация через куки
            if(!empty($_COOKIE['email']) && !empty($_COOKIE['key'])){
                $email = $_COOKIE['email'];

                $params = [
                    'cookie' => $_COOKIE['key']
                ];

                /* Проверяем, присутствуют ли в БД куки у пользователя со значением email,
                которое установлено в браузере */
                $db = new Db();
                $res = $db->row("SELECT * FROM users WHERE email = '$email' AND cookie = :cookie",
                $params);
                
                if(!empty($res)){
                    $_SESSION['user'] = [
                        'id' => $res[0]['id'],
                        'first_name' => $res[0]['first_name'],
                        'surname' => $res[0]['surname'],
                        'email' => $res[0]['email'],
                        'status' => $res[0]['status'],
                    ];

                    // Можно также добавить перезапись куки
                    if($_SESSION['user']['status'] == "admin"){
                        $authFlag = "admin";
                    }else{
                        $authFlag = "reader";
                    }
                }
            }
        }

        return $authFlag;
    }

    // Метод выхода из аккаунта
    public static function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            setcookie('email', '', time());
            setcookie('key', '', time());
        }        

        return true;
    }

    private function generateSalt(){
		$salt = '';
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $salt = substr(str_shuffle($permitted_chars), 0, 10);

		return $salt;
	}
}