<?php
session_start();

include "connect-db.php";

$query = "SELECT * FROM classinfo";
$result = mysqli_query($connection, $query);
?>

<?php include "inc/html_top.php"; ?>

<body class="container-slist">
<nav class="navbar menu">
    <a class="navbar-brand" href="index.php">
        <figure id="padlogo">
            <img src="images/logo_small.png" alt="Class Logo">
        </figure>
    </a>

    <ul class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link" href="studentlist.php">Our Class</a>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
        <a class="nav-item nav-link" href="logout.php">Logout</a>
        <?php } else {?>
        <a class="nav-item nav-link" href="login.php">Login</a>
        <?php }?>
    </ul>
</nav>

<section class="fgrid">
    <header class="spans">
        <h1>Our Class</h1>
        <p>Below is a list of the students that participated in CSC 174 during Summer 2020. While an interest in web
            development brings the students together, you'll find that each has unique passions that take them
            outside the realm of computer science.</p>
    </header>

    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
        <div>
            <a href="new.php">Add Student</a>
        </div>
    <?php }?>

    <div id="f-page-div" class="f-page">
        <?php
        // 3. Use returned data (if any)
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <section>
                <?php if (empty($data["img"])) { ?>
                    <?php if (empty($data["quote"])) { ?>
                        <img src="images/profile.png">
                    <?php } else { ?>
                        <p><?php echo $data["quote"]; ?></p>
                    <?php } ?>
                <?php } else { ?>
                    <figure>
                        <img class="img-fluid" src="images/upload/<?php echo $data["img"]; ?>" alt="<?php echo $data["quote"]; ?>">
                    </figure>
                <?php } ?>
            </section>

            <article>
                <h2><?php echo $data["firstname"], " ", $data["lastname"]; ?></h2>
                <p><?php echo $data["info"]; ?></p>
                <?php if (!empty($data["img"])) { ?>
                    <p><?php echo $data["quote"]; ?></p>
                <?php } ?>
            </article>

            <a href="<?php echo $data["link"]; ?>" target="_blank"><img src="images/stars_resized.png" alt="view page stars">
                <div>Read More</div>
            </a>

            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
                <div>
                    <a href="edit.php?id=<?php echo $data['id'];?>">Edit</a>
                    <a href="delete.php">Delete</a>
                </div>
            <?php }?>

        <?php } ?>
    </div>
</section>

<?php include "inc/scripts.php"; ?>

</body>

</html>