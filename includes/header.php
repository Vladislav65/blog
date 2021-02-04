<?php
    include_once "controllers/UserController.php";
?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-7 title">
                <h1>
                <!-- В зависимости от того, авторизован ли пользователь 
                и каков его статус (админ-читатель) ему демонстрируются
                соответствующие пункты шапки сайта с нужными URL -->
                    <?php if(UserController::isAuthorized() == "notAuthorized"){ ?>
                        <a href="/">Блог о програмировании</a>
                    <?php }elseif(UserController::isAuthorized() == "admin"){ ?>
                        <a href="admin">Блог о програмировании</a>
                    <?php }else{ ?>  
                        <a href="reader">Блог о програмировании</a>
                    <?php } ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 navigation">
                <ul type="none" class="navigation d-flex justify-content-center">
                    <?php if(UserController::isAuthorized() == "notAuthorized"): ?>
                        <li><a href="catalog">Каталог</a></li>
                        <li><a href="registration">Регистрация</a></li>
                        <li><a href="auth">Авторизация</a></li>
                    <?php elseif(UserController::isAuthorized() == "admin"): ?>
                        <li><a href="catalog">Каталог</a></li>
                        <li><a href="add">Добавить статью</a></li>
                        <li><a href="logout">Выйти из аккаунта</a></li>
                    <?php else: ?>
                        <li><a href="catalog">Каталог</a></li>
                        <li><a href="logout">Выйти из аккаунта</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>