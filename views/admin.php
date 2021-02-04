<?php
    include_once "controllers/UserController.php";
    if(UserController::isAuthorized() != "admin"){ 
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/css/style.css">
    <link rel="stylesheet" href="/templates/css/admin.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <title>Аккаунт администратора</title>
</head>
<body>
    <?php include "includes/header.php" ?>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 admin_data">
                    <h2>Добро пожаловать, <?php echo $_SESSION['user']['first_name'] . " " . $_SESSION['user']['surname'] ?></h2>
                    <h5>Информация аккаунта:</h5>
                    <span class="param">Имя: </span><span class="value"><?php echo $_SESSION['user']['first_name'] ?></span> <br>
                    <span class="param">Фамилия: </span><span class="value"><?php echo $_SESSION['user']['surname'] ?></span> <br>
                    <span class="param">Email: </span><span class="value"><?php echo $_SESSION['user']['email'] ?></span> <br>
                    <span class="param">Статус: </span><span class="value"><?php echo $_SESSION['user']['status'] ?></span> <br>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php" ?>
</body>
</html>