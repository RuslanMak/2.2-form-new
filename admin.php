<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>admin</title>
</head>
<body>
 
  <form action="" method="post" enctype="multipart/form-data">
    Select json test to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload json" name="submit">
  </form>
  
</body>
</html>


<?php
// Check if json file is a actual json or fake json
if(!empty($_POST["submit"])) {
    $target_dir = "test/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($fileType === "json") {
        echo "File is an json";
        $uploadOk = 1;
    } else {
        echo "File is not an json.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>
