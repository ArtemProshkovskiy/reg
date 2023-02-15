<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: ../profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->
<div class="mass act">

</div>
<form >
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button class="button" type="submit">Войти</button>
    <p>
        У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
    </p>
    <a href="new_pass.php">Забыл пароль</a>
</form>
<script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</body>
</html>