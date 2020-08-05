<nav class="navbar menu">
    <a class="navbar-brand" href="index.php">
        <figure id="padlogo">
            <img src="images/logo_small.png" alt="Class Logo">
        </figure>
    </a>
    <ul class="navbar-nav">
        <a class="nav-item nav-link" href="studentlist.php">Students</a>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
        <a class="nav-item nav-link" href="portal.php">Admin</a>
        <a class="nav-item nav-link" href="logout.php">Sign Out</a>
        <?php } ?>
    </ul>
</nav>