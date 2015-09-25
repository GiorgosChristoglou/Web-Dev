<?php
  session_start(); // start session
  $error = '';

  if (isset( $_POST['submit'])) {
    if (empty ($_POST['username'] || empty($_POST['password']))) {
      $error = 'Username of Password is invalid';
    }
    else {
      // Define username and password.
      $username = $_POST['username'];
      $password = $_POST['password'];

      include ('databaseAccess/loginDatabase.php');

      // To protect MySQL injection for Security purpose.
      $username = stripslashes($username);
      $password = stripslashes($password);
      $username = mysql_real_escape_string($username);
      $password = mysql_real_escape_string($password);

      // SQL query to fetch information of registered users.

      $query = mysql_query("select * from login where password = '$password' AND username = '$username'");

      $rows = mysql_num_rows($query);

      if ($rows == 1) {
        $_SESSION['loginUser'] = $username; // Initializing session.
        header("Location: profile.php");
      }
      else {
        $error = 'Username of Password invalid';
        header("Location: index.php");
      }
      mysql_close($connection);
    }
  }
?>
