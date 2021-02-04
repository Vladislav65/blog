<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/css/style.css">
    <link rel="stylesheet" href="/templates/css/auth.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <title>Страница авторизации</title>
</head>
<body>

<?php include "includes/header.php" ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12  auth_class">
                <form class="auth_form" method="POST" >
                    <label>Введите e-mail:</label> <br>
                    <input type="email" name="email" class="auth_email" required> <br>
                    <label>Введите пароль:</label> <br>
                    <input type="password" name="password" class="auth_password" required> <br>
                    <input type="submit" name="auth" class="auth_btn" value="Войти в аккаунт"> <br>
                </form>
                <?php if($authResult == "Неверный логин или (и) пароль"){ ?>
                    <p class="incorrect"><?php echo $authResult; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>