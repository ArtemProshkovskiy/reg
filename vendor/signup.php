<?php

session_start();


$connect = mysqli_connect('localhost', 'root', '', 'user');

if (!$connect) {
    die('Error connect to DataBase');
}
$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === '') {
    $eror[] = 'password';
}
if ($login === '') {
    $eror[] = 'login';
}

if (!empty($eror)) {
    $register = [
        "status" => false,
        'type' => 1,
        'mass' => 'check your fields',
        'field' => $eror
    ];

    echo json_encode($register);

    die();
}

if ($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['mass'] = 'Ошибка при загрузке сообщения';
        header('Location: ../register.php');
    }
    
    $register = [
        "status" => true,
    ];

    echo json_encode($register);

    $password = md5($password);
    $connect->query("INSERT INTO `users` ( `full_name`, `login`, `email`, `password`, `avatar`) VALUES ( '$full_name', '$login','$email', '$password', '$path')");


} else {
    $register = [
        "status" => false,
        "mass" => 'что-то пошло не так проыерьте логин + пароль',
    ];

    echo json_encode($register);
}