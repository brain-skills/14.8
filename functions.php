<?php
    session_start();
    require_once('users.php');
    function existsUser($login) {
        $users = getUsersList();
        return array_key_exists($login, $users);
    }
    function checkPassword($login, $password) {
        $users = getUsersList();
        return existsUser($login) && password_verify($password, $users[$login]);
    }
    function getCurrentUser() {
        return $_SESSION['user'] ?? null;
    }
    function displayUserDiscountTimer() {
        $timeNow = time();
        $loginTime = $_SESSION['login_time'] ?? $timeNow;
        $timeElapsed = $timeNow - $loginTime;
        $timeLeft = 86400 - $timeElapsed;
        if ($timeLeft > 0) {
            $hours = floor($timeLeft / 3600);
            $minutes = floor(($timeLeft % 3600) / 60);
            $seconds = $timeLeft % 60;
            echo "<p>Персональная акция закончится через: <span class='hours'>{$hours} часов</span>, <span class='minutes'>{$minutes} минут</span>, <span class='seconds'>{$seconds} секунд</span>.</p>";
        } else {
            echo "<p>Ваша персональная акция истекла.</p>";
        }
    }
    function displayDaysUntilBirthday($birthDate) {
        $currentDate = new DateTime();
        $birthday = DateTime::createFromFormat('m.d.Y', $birthDate);
        $birthday->setDate($currentDate->format('Y'), $birthday->format('m'), $birthday->format('d'));
        if ($currentDate->format('m-d') === $birthday->format('m-d')) {
            echo '<p>С Днём Рождения! Ваша персональная скидка 5% на все услуги салона!</p>';
        } else {
            if ($birthday < $currentDate) {
                $birthday->modify('+1 year');
            }
            $daysLeft = $currentDate->diff($birthday)->days;
            echo "<p>До вашего дня рождения осталось: {$daysLeft} дней.</p>";
        }
    }