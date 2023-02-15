

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
<form>
    <label>Логин</label>
    <input type="email" name="email" placeholder="Введите свою почту">
    <label>Пароль</label>
    <input class="none" name="cod" placeholder="Введите код котрый пришел">
    <button class="new pass" type="submit">Войти</button>
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