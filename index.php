<?php
require_once('functions.php');
$currentUser = getCurrentUser();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($currentUser === null): ?>
        <title>Главная страница SPA BEAUTY</title>
    <?php else: ?>
        <title>Профиль <?php echo $currentUser; ?> - SPA BEAUTY</title>
    <?php endif; ?>
	<link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <p><img src="img/logo.png" class="logo" alt="Наш салон"></p>
    <?php if ($currentUser === null): ?>
        <h1>Добро пожаловать на наш сайт SPA BEAUTY!</h1>
        <?php require_once 'login.php'; ?>
    <?php else: ?>
        <h1>Добро пожаловать, <?php echo $currentUser; ?>!</h1>
        <?php displayUserDiscountTimer(); ?>
        <?php
            $birthDate = '05.09.1990'; 
            displayDaysUntilBirthday($birthDate); 
        ?>
        <p><a href="logout.php">Выйти</a></p>
    <?php endif; ?>

    <!-- Основной контент главной страницы -->
    <h4>Наши услуги</h4>
    <ul>
        <li>Массаж</li>
        <li>Маникюр и педикюр</li>
        <li>Уход за лицом</li>
    </ul>

    <h4>Наши фото</h4>
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="img/1.jpg" alt="">
        </div>
        <div class="col-12 col-md-3">
            <img src="img/2.jpg" alt="">
        </div>
        <div class="col-12 col-md-3">
            <img src="img/3.jpg" alt="">
        </div>
        <div class="col-12 col-md-3">
            <img src="img/4.jpg" alt="">
        </div>
    </div>
</body>
</html>