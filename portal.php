<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<?php include "inc/html_top.php"; ?>

<body class="container-slist">

<div class="container">
    <div class="row">
        <div class="col">
            <a href="new.php" class="option">Add New Profile</a>
        </div>

        <div class="col">
            <a href="db.php" class="option">Modify Existing Profiles</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="register.php" class="option">Create New User</a>
        </div>

        <div class="col">
            <a href="reset.php" class="option">Reset Password</a>
        </div>
    </div>
</div>

<?php include "inc/scripts.php" ?>
</body>
</html>