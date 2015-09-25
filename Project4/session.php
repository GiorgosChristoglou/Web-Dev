<?php
include('databaseAccess/loginDatabase.php');
session_start();

// Initialize variables.
$user_check = $_SESSION['loginUser'];
$ses_sql = mysql_query("select username from login where username = '$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['username'];

if (!isset($login_session)) {
  mysql_close($connection); // Closing Connection.
  header("Location: index.php"); // Redirect to Home page.
}
?> 
