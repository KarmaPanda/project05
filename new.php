<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

include('renderform.php');

// connect to the database
include('connect-db.php');

$errors = array(
    "firstname" => false,
    "lastname" => false,
    "quote" => false,
    "info" => false,
    "link" => false,
    "img" => false,
);

if (isset($_POST['submit'])) {
    $filename = '';

    if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["img"]["name"];
        $filetype = $_FILES["img"]["type"];
        $filesize = $_FILES["img"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            do{
                $filename = uniqid() . '.' . array_keys($allowed, $filetype)[0];
            } while (file_exists("upload/" . $filename));

            move_uploaded_file($_FILES["img"]["tmp_name"], "images/upload/" . $filename);
        } else{
            $errors["img"] = true;
        }
    }
    else if($_FILES["img"]["name"] == '') {
        $errors["img"] = false;
    }
    else{
        $errors["img"] = true;
    }

    $img = '';

    if ($_FILES["img"]["name"] != '') {
        $img = mysqli_real_escape_string($connection, htmlspecialchars($filename));
    }

	$firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
	$lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
	$quote = mysqli_real_escape_string($connection, htmlspecialchars($_POST['quote']));
	$info = mysqli_real_escape_string($connection, htmlspecialchars($_POST['info']));
	$link = mysqli_real_escape_string($connection, htmlspecialchars($_POST['link']));

	if ($firstname == '') {
	    $errors['firstname'] = true;
    }

    if ($firstname == '') {
        $errors['lastname'] = true;
    }

    if ($firstname == '') {
        $errors['quote'] = true;
    }

    if ($firstname == '') {
        $errors['info'] = true;
    }

    if ($firstname == '') {
        $errors['link'] = true;
    }

    $errorGenerated = false;

    foreach ($errors as $error) {
        if ($error) {
            renderForm('', $firstname, $lastname, $info, $link, $quote, $img, $errors);
            $errorGenerated = true;
            break;
        }
    }

    if (!$errorGenerated) {
		$result = mysqli_query($connection, "INSERT INTO classinfo (firstname, lastname, info, link, quote, img) VALUES ('$firstname', '$lastname', '$info', '$link', '$quote', '$img')");
		header("Location: db.php");
	}
} else {
	renderForm('','','','','','','', $errors);
}
?>