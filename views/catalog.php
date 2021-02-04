<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/css/style.css">
    <link rel="stylesheet" href="/templates/css/catalog.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="templates/js/Script.js"></script>
    <title>Каталог новостей</title>
</head>
<body>

<?php include "includes/header.php" ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9 ml-auto news">
            <div class="sort"><span><a href="dateSort">Сортировать по дате</a></span> <span><a href="viewsSort">Сортировать по просмотрам</a></span></div>
                <?php foreach($newsList as $item){ ?>
                    <div class="item">
                        <img src="<?php echo $item['img']; ?>" class="item_img" alt="Фото новости">
                        <div class="item_content">
                            <span class="item_title"><?php echo $item['title'] ?> </span>
                            <?php if(User::isAuthorized() == "admin"){ ?>
                                <a href="edit<?php echo $item['id']?>">Редактировать</a> <br>
                            <?php } ?>
                            <br> <span class="date">Дата добавления: </span><span><?php echo $item['date']; ?></span> <br>
                            <span class="views">Количество просмотров: </span><span><?php echo $item['views']; ?></span> <br>
                            <span class="preview">
                                <?php echo mb_substr($item['content'], 0, 140) . "..."; ?>
                            </span> <br>
                            <?php if(User::isAuthorized() != "notAuthorized"){ ?>
                                <a href="item<?php echo $item['id']; ?>">Читать полностью</a>
                            <?php }else{ ?>
                                <p class="auth_warning">Авторизуйтесь для прочтения</p>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php" ?>

</body>
</html>