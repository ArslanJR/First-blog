<?php
    $name = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $pass = md5($pass);

    $sql = new mysqli("localhost", "admin", "admin", "my_db");
    $result = $sql->query("SELECT * FROM `users` WHERE `name` = '$name' OR `email` = '$email' AND `password` = '$pass'");
    $user = $result->fetch_assoc();
    if($user == 0){
        echo "Такой пользователь не найден! <br> Проверьте введенные логин и пароль";
        exit();
    }
    $sql->close();

    header('Location: aboutuser.php');
