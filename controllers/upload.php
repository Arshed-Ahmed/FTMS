<?php
include_once("../incl/links.php");
$target_file = "style/" . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        new PNotify({
            title: 'Sorry',
            text: "File is not an image.",
            type: 'warning',
            styling: 'bootstrap3'
        });
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Style already exists.";
    new PNotify({
        title: 'Sorry',
        text: "Style already exists.",
        type: 'warning',
        styling: 'bootstrap3'
    });
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    // echo "Sorry, your file is too large.";
    new PNotify({
        title: 'Sorry',
        text: "Sorry, your file is too large.",
        type: 'warning',
        styling: 'bootstrap3'
    });
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    new PNotify({
        title: 'Sorry',
        text: "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
        type: 'warning',
        styling: 'bootstrap3'
    });
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    new PNotify({
        title: 'Sorry',
        text: "Sorry, your file was not uploaded.",
        type: 'warning',
        styling: 'bootstrap3'
    });
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        new PNotify({
            title: 'Uploaded',
            text: "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.",
            type: 'success',
            styling: 'bootstrap3'
        });
    } else {
        //echo "Sorry, there was an error uploading your file.";
        new PNotify({
            title: 'Sorry',
            text: "Sorry, there was an error uploading your file.",
            type: 'warning',
            styling: 'bootstrap3'
        });
    }
}

include_once("../incl/scripts.php");
?>
