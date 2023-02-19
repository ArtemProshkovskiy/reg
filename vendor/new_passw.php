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



$checkuser = $connect->query("SELECT * FROM users WHERE email = '$email' ");
if (mysqli_num_rows($checkuser) > 0) {

//    INSERT INTO `recover` (`id`, `hash`, `expire`, `email`) VALUES ('', '2', '3', '2');
    $checkuser = mysqli_fetch_assoc($checkuser);

    $time = time() + 8000;
    $hash = mt_rand(1000, 9999);

    $checkuser = $connect->query("INSERT INTO `recover` ( `hash`, `expire`, `email`) VALUES ( '$hash', '$time', '$email');");

    $register = [
        "status" => true,
        "mass" => 'на почту відправив'
    ];
    echo json_encode($register);



//    header('Location: ../profile.php');


} else {

    $register = [
        "status" => false,
        "mass" => 'что-то пошло не так проыерьте логин + пароль',
    ];

    echo json_encode($register);
}