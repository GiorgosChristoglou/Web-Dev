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

      include('databaseLogin/loginDatabase.php');

      // To protect MySQL injection for Security purpose.
      $username = stripslashes($username);
      $username = mysql_real_escape_string($username);

      // Data validation
      $usernameLen = strlen($username);
      $passwordLen = strlen($password);

      if ($passwordLen < 8 || $passwordLen > 16) {
        $error = 'Password must have 8 to 16 size';
      }
      if ($usernameLen < 4 || $usernameLen > 16) {
        $error = 'Username must have 8 to 16 size';
      }

      // Check whether there is another user with the same username
      // in the database.
      $res = mysql_query("select username from login where username = '$username'");
      $rows = mysql_num_rows($res);

      if ($rows != 0) {
        $error = 'There is already a user with that username';
      }
      else if ($error != '') {
         mysql_query("insert into login (username, password) values 
      ('$username', '$password')");
      }
    }
    mysql_close($connection);
  }
  if ($error !== '') {
    die($error);
  }
?> 
