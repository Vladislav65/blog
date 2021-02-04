<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <link rel="stylesheet" href="/templates/css/style.css">
    <title>Главная страница блога</title>
</head>
<body>

<?php include "includes/header.php" ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 index">
                <h1>Добро пожаловать</h1>
                <span class="description">Вы находитесь в блоге о программировании.
                <a href="auth">Авторизуйтесь</a>, чтобы получить возможность читать статьи или
                <a href="registration">зарегистрируйтесь</a>, если у Вас ещё нет аккаунта.</span>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>