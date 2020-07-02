<?php
// NOTICE: this part of this HTML document is just one PHP tag
//  This script doesn't output anything to the user's browser
//  so there is no DOCTYPE or any of the usual HTML things
//  in this part

// **********************************
// SECTION ONE: set all the variables
// **********************************

// set some variables
$emailFrom = "aramir10@u.rochester.edu"; // use YOUR email for both lines 12 and 13
$emailTo = "aramir10@u.rochester.edu";
$subject = "Lab01";

// the following lines of code will grab the data being passed 
//   from the method="post" in the HTML form and hold it in a variable

// the words inside each $_POST[] must match a name="" attribute from the 
//   HTML form EXACTLY; then create a variable on the left side that
//   makes sense for the data it will hold

// these are from the text INPUT fields...
$name = Trim(stripslashes($_POST['name'])); 
$email = Trim(stripslashes($_POST['email'])); 
// $phone = Trim(stripslashes($_POST['phone'])); 
// ...used more input fields? Then copy these lines (above)
//   and make more

// this is from the TEXTAREA field...
$comments = Trim(stripslashes($_POST['comments'])); 

// **********************************
// SECTION TWO: build the email body
// **********************************

$body = ""; // initialize the variable, then start concatenating
			// backslash-n means new-line in emails

$body .= "User's name: \n"; //...a label
$body .= $name;	  //...a variable
$body .= "\n\n";			  //...a new line

$body .= "User's email: \n"; //...a label
$body .= $email;	  //...a variable
$body .= "\n\n";			  //...a new line

// $body .= "User's phone: \n"; //...a label
// $body .= $phone;	  //...a variable
// $body .= "\n\n";			  //...a new line
// ...used more input fields? Then copy these lines (above)
//   and make more

// This is for your TEXTAREA
$body .= "Questions or Comments: \n";		// a heading for your text area
$body .= $comments;			// the variable for your text area
$body .= "\n";

// **********************************
// SECTION THREE: send the email
// **********************************
// You won't need to edit anything here...

// send email 
mail($emailTo, $subject, $body, "From: <$emailFrom>");


//end the PHP block here...
?>

<!-- **********************************
	 SECTION FOUR: thank the user in HTML;
	 Below, there needs to be an HTML 
	 webpage with a customized message 
	 for the user
     ********************************** -->
<?php $customCSS=""; ?>

<?php include "inc/top.php";?>

    <body class = "container">

        <?php include "inc/nav.php";?>

        <header>

            <h1><a href = "index.php">Alejandro Ramirez</a></h1>
            <p class = "subtitle">CS Student</p>

        </header>

        <?php include "inc/header_pic.php";?>

        <main class = "full-width">

            <h2>Thank You, <?php echo $name;?></h2>
            <p>Go back to <a href="index.php">the home page</a>.</p>

        </main>

    </body>

</html>
