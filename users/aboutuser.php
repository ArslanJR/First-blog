<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About user</title>
</head>
<body>
    <div class="info">
        <?php
            $sql = new mysqli("localhost", "admin", "admin", "my_db");
            $sql->query("SET NAMES 'utf8'");

            $info = $sql->query("SELECT `name`, `email` FROM `users`");
            $row = $info->fetch_assoc();
            echo '<b>'.$row['name'].'<br>'.'</b>';
            echo $row['email'].'<br>';

            $sql->close();
        ?>
    </div>
</body>
</html>
