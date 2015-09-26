<?php

  $path = '/var/www/html/uploads/';

  if (isset ($_GET['uploadedFiles'])) {
    $file = $_GET['uploadedFiles'];

    if (file_exists($path.$file)) {
      header("Content-type: application/force-download");
      header('Content-Disposition: inline; filename="' . $path . $file. '"');
      header("Content-Transfer-Encodigng: Binary");
      header("Content-length: " . filesize($path . $file));
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename ="' . $file . '"');
      readfile("$path$file");

      echo "$path" . "$file";
    }
    else {
      die("File not Found");
    }
  }
  else {
    die("No file selected!");
  }
?>
