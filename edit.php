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
	// confirm that the 'id' value is a valid integer before getting the form data
	if (is_numeric($_POST['id'])) {
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

        $id = $_POST['id'];
        $img = '';
        $result = mysqli_query($connection, "SELECT * FROM classinfo WHERE id=$id");
        $row = mysqli_fetch_array( $result );

        if ($_FILES["img"]["name"] != '') {
            $img = mysqli_real_escape_string($connection, htmlspecialchars($filename));
        }
        else if (!$_POST['removeImg'] && $row['img'] != '')
        {
            $img = $row['img'];
        }

		$id = $_POST['id'];
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
                renderForm($id, $firstname, $lastname, $info, $link, $quote, $img, $errors);
                $errorGenerated = true;
                break;
            }
        }

        if (!$errorGenerated) {
			// save the data to the database
			$result = mysqli_query($connection, "UPDATE classinfo SET firstname='$firstname', lastname='$lastname', info='$info', link='$link', quote='$quote', img='$img' WHERE id='$id'");

			// once saved, redirect back to the homepage page to view the results
			header("Location: db.php");
		}
	} else {
		// if the 'id' isn't valid, display an error
		echo 'Error!';
	}
} else {
	// if the form (from renderform.php) hasn't been submitted yet, get the data from the db and display the form
	// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
		// query db
		$id = $_GET['id'];
		$result = mysqli_query($connection, "SELECT * FROM classinfo WHERE id=$id");
		$row = mysqli_fetch_array( $result );

		// check that the 'id' matches up with a row in the databse
		if($row) {
			// get data from db
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$quote = $row['quote'];
			$info = $row['info'];
			$link = $row['link'];
			$img = $row['img'];

			// show form
			renderForm($id, $firstname, $lastname, $quote, $info, $link, $img, $errors);
		} else {
			// if no match, display result
			echo "No results!";
		}
	} else {
		// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
		echo 'Error!';
	}
}
?>