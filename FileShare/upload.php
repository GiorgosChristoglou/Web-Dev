<?php
  $destination = "/var/www/html/uploads/";
  $sizeLimit = 8 * 1024 * 1024; // 8 megabytes.

  if ( count($_FILES) > 0 && $_FILES['fileName']['name'] !== '') {
    if ( $_FILES['fileName']['size'] < $sizeLimit) { 
      $destination .= $_FILES ['fileName']['name'];
      $tmp_addr = $_FILES['fileName']['tmp_name'];
      move_uploaded_file( $tmp_addr, $destination );
      header( 'Location: http://localhost/FileShare/profile.php');
    }
    else {
      // Redirect to a page with an error.
      die("The size of the file is very large.");
    }
  }
  else {
    // File not found!
    die ("File not found!");
  }
?>
