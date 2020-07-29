<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Team Chicago</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>

<body class="container">

    <?php include "inc/nav.php"; ?>

    <header>
        <h1>Team Chicago</h1>
        <p>Team Chicago is a trio comprised of University
            of Rochester students all majoring in Computer Science. Although all three major
            in Computer Science, you'll find they each have their own charms and interests.
            Read their profiles below to find out more about them.
    </header>


    <?php
    // 1. Create a database connection
    $dbhost = "66.147.242.186";
    $dbuser = "urcscon3_chicago";
    $dbpass = "project4chicago";
    $dbname = "urcscon3_chicago";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


    // 2. Perform database query
    $query  = "SELECT * FROM classinfo";
    $result = mysqli_query($connection, $query);
?>

    <article>
        <ul>
        <?php
            // 3. Use returned data (if any)
            while($data = mysqli_fetch_assoc($result)) {
        ?>
        <li>
            <figure><img src=<?php echo $data["photo"];?>></figure>
            <h2><?php echo 
                $data["firstName"], " ", $data["lastName"]; 
            ?></h2>
            <p><?php echo $data["info"];?></p>
            <a href=<?php echo $data["link"];?>>Read More!</a>
        </li>
        <?php } ?>
    </ul>
    </article>

    <!-- <article>
        <h2>Adira Blumenthal</h2>
        <p> Adira Blumenthal (she/her) is from Silver Spring, Maryland and is a member of the University of Rochester class of 2023 majoring in Computer Science. She was a dancer for many years but in 2018, she switched over from being on stage to behind the scenes, doing lighting, sound, and stage management for her dance studio. Now, she continues her interest in technical theater at the University of Rochester by her involvement in Roc Players and Todd Productions. </p>
        <a href="adira.php" target="_self" class="link"> Read more about Adira</a>
    </article>

    <article>
        <h2>Jason Katzner</h2>
        <p>Jason Katzner (he/him) is a member of the University of Rochester class of 2021 majoring in Computer Science. He is also in the GRADE program, studying Online Teaching & Learning. He also studies Linguistics and Technical Theater. Outside of his studies, he lives on the Computer Interest Floor, plays tabletop roleplaying games, and LARPs.</p>
        <a href="jason.php" target="_self" class="link"> Read more about Jason</a>
    </article>

    <article>
        <h2>Yilin Luo</h2>
        <p>Yilin Luo is a member of the University of Rochester, class of 2021. She double majored in Computer Science and Studio Arts. Her focus is Human Computer Interaction. With the passion to improve technology UX, she interned at Open Letter Books in summer 2021 as a Website Developer and Marketing Intern. Yilin is keen on bringing enjoyment in arts, she has also volunteered as an art workshop leader at Huther Doyle.</p>
        <a href="yilin.php" target="_self" class="link"> Read more about Yilin</a>
    </article> -->

    <?php include "inc/scripts.php"; ?>

</body>

</html>