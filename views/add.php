<?php
    include_once "controllers/UserController.php";
    if(UserController::isAuthorized() == "notAuthorized"){ 
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
    <link rel="stylesheet" href="/templates/css/article_forms.css">
    <!--<link rel="stylesheet" href="/templates/css/news_item.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <title>Добавление статьи</title>
</head>
<body>

<?php include "includes/header.php" ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-11 ml-auto add_article">
            <h3>Добавьте новую статью</h3>
                <form method="POST" enctype="multipart/form-data" class="add_form">
                    <label>Название:</label> <br>
                    <input type="text" name="title" class="add_title" required> <br>
                    <label>Добавьте изображение:</label> <br>
                    <input type="file" name="img" required> <br>
                    <label>Содержимое:</label> <br>
                    <textarea name="content" cols="70" rows="20" class="add_content" required></textarea> <br>
                    <input type="submit" name="add" class="add_btn" value="Добавить статью">
                </form>
                <p style="text-align: center; font-size: 18px; color: firebrick"><?php echo $result; ?></p>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>