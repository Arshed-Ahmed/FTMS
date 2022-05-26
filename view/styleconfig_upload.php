<?php

if (isset($_FILES['my_image'])) {
    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $desc = $_POST['description'];
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 1000000) {
            $em = "Sorry, your file is too large.";
            header("Location: styleconfig.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'style/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO style(stlname, uploaded, stldesc ) 
                        VALUES('$new_img_name' , NOW(), '$desc')";
                mysqli_query($conn, $sql);
                $em = "File successfully uploaded";
                header("Location: styleconfig.php?success=$em");
            } else {
                $em = "You can't upload files of this type";
                header("Location: styleconfig.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: styleconfig.php?error=$em");
    }
} else {
    $em = "unknown error occurred!";
    header("Location: styleconfig.php?error=$em");
}
