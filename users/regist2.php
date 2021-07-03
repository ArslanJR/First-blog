<?php
	$name = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

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
    }
    else{
        $sql = new mysqli("localhost", "admin", "admin", "my_db");
        $sql->query("SET NAMES 'utf8'");

        $sql->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES('$name', '$email', md5'$pass') )");

        $sql->close();
        header('Location: aboutuser.php');
        exit;
    }

