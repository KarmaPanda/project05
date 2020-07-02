<?php $customCSS = "<link rel = 'stylesheet' href = 'css/forms.css'>";?>

<?php include "inc/top.php";?>

    <body class = "container">

        <?php include "inc/nav.php";?>

        <header>

            <h1>Alejandro Ramirez</h1>
            <p class = "subtitle">CS Student</p>

        </header>

        <?php include "inc/header_pic.php";?>

        <section class = "contact">

            <p>You can send me an <a href = "mailto: aramir10@u.rochester.edu">email</a>, and you can find me on <a href = "https://www.linkedin.com/in/aleram">LinkedIn</a>. Alternatively, send me a message using the form below:</p>

            <form action = "form-processor.php" method = "post">


                <label for = "name">Name:</label> 
                <input class = "info-field" type = "text" id = "name" name = "name"> 
                
                <br><br>

                <label for = "email">Email:</label> 
                <input class = "info-field" type = "email" id = "email" name = "email"> 

                <br><br>

                <label for = "comments">Questions or Comments:</label>

                <br>
                
                <textarea name = "comments" id = "comments"></textarea>

                <br><br> 

                <input class = "submit-button" type = "submit" value = "Submit Form. Thanks!">

            </form>

        </section>

        <footer>

            <p>CSC 174: Advanced Frontend Design and Development</p>

        </footer>

        <?php include "inc/scripts.php";?>

    </body>

</html>