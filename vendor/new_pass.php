<?php

$connect = mysqli_connect('localhost', 'root', '', 'user');

if (!$connect) {
    die('Error connect to DataBase');
}
$register = [
    "status" => '',
];


$email = $_POST['email'];
if ($email === '') {
    $eror[] = 'email';
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



$checkuser = $connect->query("SELECT * FROM users WHERE email = '$email' ");
if (mysqli_num_rows($checkuser) > 0) {


    $checkuser = mysqli_fetch_assoc($checkuser);



    $register = [
        "status" => true,
        "mass" => 'на почту відправив'
    ];

//    header('Location: ../profile.php');


} else {

    $register = [
        "status" => false,
        "mass" => 'что-то пошло не так проыерьте логин + пароль',
    ];

    echo json_encode($register);
}