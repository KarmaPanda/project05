<?php
session_start();

include "connect-db.php";

$query = "SELECT * FROM classinfo";
$result = mysqli_query($connection, $query);
?>

<?php include "inc/html_top.php"; ?>

<body class="container-slist">
<?php include "inc/nav.php" ?>

<section class="fgrid">
    <header class="spans">
        <h1>CSC 174</h1>
        <p>Advanced Front End Web Development is a class on front-end web design. The second in a series after CSC 170:
            Intro to Web Development, CSC 174 explores web page design technically through Hypertext Markup Language
            (HTML),
            databases edited locally and remotely in MySQL, code in PHP, and more. Our focus on visual design and
            organization is backed up by studies in how the eye moves and in brain & cognitive science. It's great to
            meet
            you!</p>
    </header>

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

            <a href="<?php echo $data["link"]; ?>"><img src="images/stars_resized.png" alt="view page stars">
                <div>Read More!</div>
            </a>

        <?php } ?>
    </div>
</section>

<?php include "inc/scripts.php"; ?>

</body>

</html>