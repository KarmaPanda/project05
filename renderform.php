<?php
// creates the edit record form
function renderForm($id, $firstname, $lastname, $error, $info, $photo, $link) {
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
	<fieldset>
		<legend>Tell us a little about yourself...</legend>
		<h1>We'll make you a magnificent profile -- </h1>
		<h2>Give us a little background information so that we can get started.</h2>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<strong>First Name or Nickname: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br>
		<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br>
		<h3>Upload a photo here! Drag or select your favorite profile shot of yourself- please use a portrait size and style (200px X 300px).</h3>
		<h4>(I love dog pictures as much as the next girl, but we really, really want people to look at the other pages too.)</h4>
		<strong>Photo: *</strong> <input type="file" name="photo" value="<?php echo $photo; ?>"/><br>
		<h3>Write a couple sentences about yourself.</h3>
		<h4>For the sake of brevity, pretty please keep it to 80 words or under.</h4>
		<strong>Blurb About You: *</strong> <input type="text" name="info" value="<?php echo $info; ?>"/><br>
		<h3>Throw us a link to your personal website page.</h3>
		<strong>Link to Personal Page: *</strong> <input type="text" name="link" value="<?php echo $link; ?>"/><br>
		<div>* required</div>
		<input type="submit" name="submit" value="Submit">
		</fieldset>
		<br><br><br><br>
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