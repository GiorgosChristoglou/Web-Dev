<?php
  $error = '';
  if (isset($_POST['submit'])) {
    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
      $error = 'Username of Password is invalid';
    }
    else if ($_POST['confirmPassword'] != $_POST['password']) {
      $error = "The two passwords given don't match";
    }
    else {
      $username = $_POST['username'];
      $password = $_POST['password'];

      include('databaseAccess/loginDatabase.php');

      mysql_query("select username from login where username = '$username'");
      $rows = mysql_num_rows();

      if ($rows != 0) {
        $error = 'There is already a user with that username';
      }
      else {
         mysql_query("insert into login (username, password) values 
      ('$username', '$password')");
      }
    }
    header("Location: index.php");
  }
?> 
