<?php

$target_dir = "img/uploads";
$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
  # code...
  $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
  if ($check !== false) {
    # code...
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  }else{
    echo "File is not an image";
    $uploadOk = 0;
  }


  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }

  if ($_FILES["uploadFile"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }


    if (isset($_REQUEST['destination'])) {
        header("Location: {$_REQUEST['destination']}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
          header("Location: {$_SERVER["HTTP_REFERER"]}");
      }else{
           /* some fallback, maybe redirect to index.php */
      }


}


?>
