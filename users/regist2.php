<?php
	$name = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if(trim($name) == "" && trim($email) == "" && trim($pass) == "")
        echo "Enter all data";
    else if(trim($name) == "")
		echo "You did not enter a username!";
	else if(strlen(trim($name)) < 3)
		echo "Username must have at least 3 (three) characters!";
	else if(trim($email) == "")
        echo "You did not enter your email!";
    else if(trim($pass) == "")
        echo "You did not enter a password!";
    else if(strlen(trim($pass)) < 8) {
        echo "The password must consist of at least 8 (eight) characters!";
    } else{
        $pass = md5($pass);

        $sql = new mysqli("localhost", "admin", "admin", "my_db");
        $sql->query("SET NAMES 'utf8'");
        /*if($sql->connect_error){
            echo "Error: ".$sql->connect_error;
        }else{
            echo "successful connection: ".$sql->host_info;
        }*/
        $sql->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES('$name', '$email', '$pass')");
        $sql->close();

        header('Location: aboutuser.php');
    }
