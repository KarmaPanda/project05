<?php
session_start();
include "inc/html_top.php";
?>

<body class="z-pattern">

<header class="persistent">
    <div class="containerz">
        <div class="primary">
            <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
        </div>
        <div class="middle">CSC 174 - Advanced Front End Web Design and Development</div>
        <div class="strong">
            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
                <a href="logout.php" class="login-button">Logout</a>
            <?php } else { ?>
                <a href="login.php" class="login-button">Login</a>
            <?php } ?>
        </div>
    </div>
</header>

<main>
    <div class="big-message">
        <h1>Welcome to CSC 174</h1>
        <div class="subtitle">UR's Web Developers of Tomorrow</div>
    </div>
</main>

<footer class="persistent">
    <div class="containerz">
        <div class="weak">
            <div class="z-page">
                <h2>Course Description</h2>
                <p>"Front-end" is an industry term that refers to the focus on HTML, CSS and JavaScript, which
                    differentiates this course from the formal programming courses. Topics include information
                    architecture, visual design, use of client libraries (mostly JS), content
                    management systems, and web databases using PHP and MySQL.</p>
            </div>
        </div>
        <div class="terminal">
            <a href="studentlist.php" class="viewall">Meet the students</a>
        </div>
    </div>
</footer>

<?php include "inc/scripts.php" ?>
</body>
</html>