<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  if(mb_strlen($login) < 5 || mb_strlen($login) > 90)
  {
      echo "Too long login";
      exit();
  } else if (mb_strlen($name) < 3 || mb_strlen($name) > 50)
  {
      echo "Too long name";
      exit();
  } else if (mb_strlen($pass) < 8 || mb_strlen($pass) > 12)
  {
      echo "Too long password";
      exit();
  }

  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  $duplicate = $mysql->query("SELECT `login` FROM `users` WHERE `login` = '$login'");
  $duplicate = $duplicate->fetch_assoc();

  if($duplicate['login'] != '')
  {
      echo "User with login {$duplicate['login']} already exists}";
      exit();
  }

  $pass = md5($pass."_sda^_*ghdsj");
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");
  
  $mysql->close();

  header('Location: ../');
  exit();

?>