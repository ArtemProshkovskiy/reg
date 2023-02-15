<?php

session_start();


$connect = mysqli_connect('localhost', 'root', '', 'user');

if (!$connect) {
    die('Error connect to DataBase');
}
$register = [
    "status" => '',
];


$login = $_POST['login'];
$password = $_POST['password'];
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

$password = md5($_POST['password']);



$checkuser = $connect->query("SELECT * FROM users WHERE password = '$password' AND login = '$login' ");
if (mysqli_num_rows($checkuser) > 0) {
    $register = [
        "status" => true,
    ];

    echo json_encode($register);
    $checkuser = mysqli_fetch_assoc($checkuser);

    $_SESSION['user'] = [
        "id" => $checkuser['id'],
        "full_name" => $checkuser['full_name'],
        "avatar" => $checkuser['avatar'],
        "email" => $checkuser['email']
    ];

//    header('Location: ../profile.php');


} else {

    $register = [
        "status" => false,
        "mass" => 'что-то пошло не так проыерьте логин + пароль',
    ];

    echo json_encode($register);
}