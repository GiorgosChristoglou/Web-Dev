<?php 
  include('session.php');
?>
<html>
  <head>
    <title>Home page</title> 
    <link rel="stylesheet" type="text/css" href="accountStyle.css">
    <script type="text/javascript" src="scripts/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <?php
      echo "<h1 id='header'>Hello $login_session <img src=images/user.jpg id='userImage' width='50' height='60'></h1>";
    ?>

    <div class="files">
      <h2>Upload a File:</h2>
      <form action="upload.php" method="post" 
        enctype="multipart/form-data" onsubmit="return checkFile();">
        <input type="file" name="fileName"/>
        <input type="submit" value="upload"/>
      </form>
    </div>

    <div id="listOfFiles">
      <h2>Uploaded files:</h2>
      <ul id="list">
      <?php
        $handle = opendir( '/var/www/html/uploads/' );
        $path = "/uploads/";
        while ( false !== ( $file = readdir($handle) ) ) {
          if ( $file != "." && $file != ".." ) {
            echo "<li><a href = $path$file> $file</a></li>";
          }
        }  
      ?>
      </ul>
    </div>

    <div class="files"> 
      <h2>Download a file:</h2>
      <form action="download.php" method="get" 
      enctype="multipart/form-data">
      <select name="uploadedFiles">
        <?php 
          $handle = opendir('/var/www/html/uploads/');
          while ( false !== ( $file = readdir($handle) ) ) { 
            if ( $file != "." && $file != ".." ) {
              echo "<option value=" . "$file" .">$file</option>";
            }
          }  
        ?>
      </select>
      <input type="submit" value="download"/>
      </form>
    </div>

    <form action="logout.php"> 
      <input type="submit" value="Logout" id="logoutButton">
    </form>

  <body>
</html>
