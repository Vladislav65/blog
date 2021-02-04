<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/css/style.css">
    <link rel="stylesheet" href="/templates/css/registration.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <title>Страница регистрации</title>
</head>
<body>

<?php include "includes/header.php" ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 reg_class">
                <form class="reg_form" method="POST" >
                    <label>Введите имя:</label> <br>
                    <input type="text" name="first_name" class="reg_first_name" required> <br>
                    <label>Введите фамилию:</label> <br>
                    <input type="text" name="surname" class="reg_surname" required> <br>
                    <label>Введите e-mail:</label> <br>
                    <input type="email" name="email" class="reg_email" required> <br>
                    <label>Введите пароль:</label> <br>
                    <input type="password" name="password" class="reg_password" required> <br>
                    <label>Подтвердите пароль:</label> <br>
                    <input type="password" name="confirm_password" class="reg_confirm_password" required> <br>
                    <input type="submit" name="reg" value="Зарегистрироваться" class="reg_btn">
                </form>
                <p class="incorrect"><?php echo $regResult; ?></p>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>