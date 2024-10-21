<?php
  if(isset($_POST["submit"])){
    $targetdir = "uploaded/";
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtension = array("txt","pdf","doc","docx");
    $maxsize = 3*1024*1024;
    if(in_array($fileType, $allowedExtension) && $_FILES["myfile"]["size"] <= $maxsize) {
     if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$targetfile)) {
     echo"File uploaded successfully";
    } else {
      echo "File type not allowed";
    }
  } else {
    echo "file not valid or melebihi mxsize";
  }
}