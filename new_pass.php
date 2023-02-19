

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
<div style="display: flex; flex-direction: column; justify-content: center">
    <form>
        <label>Логин</label>
        <input type="email" name="email" placeholder="Введите свою почту">
        <label>Пароль</label>
        <button class="new pass" type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
        </p>
    </form>

    <form class="form_cod">
        <input class="none" name="cod" placeholder="Введите код котрый пришел">
        <button class="cod_button">проверить код</button>
    </form>

    <form class="form_pass">
        <input class="none" name="passw" placeholder="НОВИЙ ПАРОЛЬ">
        <button class="pass_button">ПОМЕНЯТЬ ПАРОЛЬ</button>
    </form>
</div>


<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</body>
</html>