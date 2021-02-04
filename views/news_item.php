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
    <link rel="stylesheet" href="/templates/css/news_item.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <title>Страница новости</title>
</head>
<body>

<?php include "includes/header.php" ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-11 ml-auto">
                <div class="article">
                    <img src="<?php echo $newsItem[0]['img'] ?>" class="article_img" alt="Фото новости">
                    <div class="article_content">
                        <h3><?php echo $newsItem[0]['title']; ?></h3>
                        <span class="text"><?php echo $newsItem[0]['content']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>