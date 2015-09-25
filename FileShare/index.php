<?php
  include('login.php');
  // If the user is already logged in to his account then 
  // redirect him to his profile.
  if (isset($_SESSION['loginUser'])) {
    header('Location: http://localhost/FileShare/profile.php');
  }
?>

<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="scripts/jquery-2.1.4.min.js"> </script>
    <script type="text/javascript" src="script.js"> </script>
    <meta 
      name="author"
      content="Georgios Christoglou"
    /> 
    <meta 
      name="description"
      content="A site for people to upload and download their files"
    />
    <meta 
      name="keywords"
      content="files, login, upload, download" 
    />
  </head>

  <body>
    <h1 id="header">FileShare<img src="images/folder.png" width="60" height="50" id="folderImage"></h1>

    <div id="login">
      <h2>Login</h2>
      <form action="login.php" method="post"
        onsubmit="return checkUsername();">
        <p>Username: <input type="text" name="username"
        id="username"></p>
        <p>Password: <input type="password" name="password"
        id="password"></p>
        <input type="submit" value="Login" name="submit">
      </form>
    </div> 

    <div id="new_account">
      <h2>Create a new account</h2>
      <form action="newaccount.php" method="post"
      onsubmit="return checkNewAccountDetails();">
        <p>Username: <input type="text" name="username" 
        id="newUsername"></p>
        <p>Password: <input type="password" name="password"
        id="newPassword"></p>
        <p>Confirm password:
        <input type="password" name="confirmPassword"></p>
        <input type="submit" name="submit" value="New Account"
        id="submitNewAccount">
      <form>
    </div>

  </body>
</html>

