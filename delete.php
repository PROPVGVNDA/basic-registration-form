<?php
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$user_id = $_COOKIE['id'];
$mysql->query("DELETE FROM `users` WHERE `users`.`id` = '$user_id'");
setcookie('user', $user['name'], time() - 3600, "/");
setcookie('id', $user['id'], time() - 3600, "/");
header('Location: /');
?>