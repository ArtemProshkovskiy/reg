<?php


$connect = mysqli_connect('localhost', 'root', '', 'user');

if (!$connect) {
    die('Error connect to DataBase');
}


$register = [
    "status" => '',
];


$cod = $_POST['cod'];

$checkuser = $connect->query("SELECT * FROM `recover` WHERE hash = '$cod' ");
$test = mysqli_fetch_assoc($checkuser);

if ($cod === '') {
    $eror[] = 'cod';
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


if ($test['hash'] === $cod) {
    $recordDate = $test['time'];
    $recordDateParsed = date('Y-m-d H:i:s', strtotime($recordDate));

    $newDate = date('Y-m-d H:i:s', strtotime('-1 hour'));

    if ($recordDate > $newDate) {
        $checkuser = mysqli_fetch_assoc($checkuser);


        $register = [
            "status" => true,
            "mass" => 'p+++++++'
        ];
        echo json_encode($register);


    } else {
        $register = [
            "status" => false,
            'type' => 1,
            'mass' => $test['hash'],
            'field' => $eror
        ];

        echo json_encode($register);

        die();
    }
}else {
    $register = [
        "status" => false,
        "mass" => 'что-то пошло не так проыерьте логин + пароль',
    ];

    echo json_encode($register);
}

