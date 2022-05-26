<?php

if (isset($_FILES['my_logo'])) {
    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['my_logo']);
    echo "</pre>";

    $desc = $_POST['description'];
    $img_name = $_FILES['my_logo']['name'];
    $img_size = $_FILES['my_logo']['size'];
    $tmp_name = $_FILES['my_logo']['tmp_name'];
    $error = $_FILES['my_logo']['error'];

    if ($error === 0) {
        if ($img_size > 1000000) {
            $em = "Sorry, your file is too large.";
            header("Location: company.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'logo/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "UPDATE `company` SET `comLogo` = ('$new_img_name') WHERE `company`.`comId` = 1;";
                mysqli_query($conn, $sql);
                $em = "File successfully uploaded";
                header("Location: company.php?success=$em");
            } else {
                $em = "You can't upload files of this type";
                header("Location: company.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: company.php?error=$em");
    }
} else {
    $em = "unknown error occurred!";
    header("Location: company.php?error=$em");
}
