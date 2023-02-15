<?php

    $connect = mysqli_connect('localhost', 'root', '', 'user');

    if (!$connect) {
        die('Error connect to DataBase');
    }