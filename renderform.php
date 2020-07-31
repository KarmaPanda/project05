<?php
// creates the edit record form
function renderForm($id, $firstname, $lastname, $error, $info, $quote, $link) {
?>



<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Class Info</title>
</head>
<body>
<?php
	// if there are any errors, display them
	if ($error != '') {
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}
?>





<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br>
	<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br>
	<strong>Favorite Quote: *</strong> <input type="text" name="quote" value="<?php echo $quote; ?>"/><br>
	<strong>Blurb About You: *</strong> <input type="text" name="info" value="<?php echo $info; ?>"/><br>
	<strong>Link to Personal Page: *</strong> <input type="text" name="link" value="<?php echo $link; ?>"/><br>
	<div>* required</div>
	<input type="submit" name="submit" value="Submit">
</form>

<div>
	<br>
	<a href="db.php">Cancel</a>
</div>

</body>
</html>
<?php
}
?>