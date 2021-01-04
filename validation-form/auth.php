<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $hashed_pass = md5($pass."_sda^_*ghdsj");
  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  
  $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$hashed_pass'");
  $user = $result->fetch_assoc();

  $user_pass = $mysql->query("SELECT `pass` FROM `users` WHERE `login` = '$login'");
  if(count($user) == 0)
  {
      echo "The user was not found";
      exit();
  }

  setcookie('user', $user['name'], time() + 3600, "/");
  setcookie('id', $user['id'], time() + 3600, "/");
  
  $mysql->close();
  
  header('Location: ../');
?>