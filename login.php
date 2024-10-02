<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (checkPassword($login, $password)) {
        $_SESSION['user'] = $login;
        $_SESSION['login_time'] = time();
        header('Location: index.php');
        exit();
    } else {
        $error = 'Неверный логин или пароль.';
    }
}
?>

<!-- Форма входа -->
<h2>Вход в личный кабинет</h2>
<?php if (!empty($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST">
    <label for="login">Логин:</label>
    <input type="text" name="login" required><br><br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Войти</button>
</form>