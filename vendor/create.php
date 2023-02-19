<?php

$connect = mysqli_connect('localhost', 'root', '', 'user');

if (!$connect) {
    die('Error connect to DataBase');
}


$register = [
    "status" => '',
];


$pass = $_POST['passw'];
$mail = $_POST['mail'];



if ($pass === '') {
    $eror[] = 'passw';
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
}else {
    $checkuser = $connect->query("UPDATE `users` SET `password` = '$pass' WHERE `users`.`email` = '$mail';
");

    $register = [
        "status" => true,
        "mass" => 'можешь минять пароль'
    ];

    echo json_encode($register);

}


