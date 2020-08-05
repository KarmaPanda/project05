<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
if(isset($_SERVER['HTTP_REFERER'])){
    header("location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("location: index.php");
}
exit;
?>