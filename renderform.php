<?php
// creates the edit record form
function renderForm($id, $firstname, $lastname, $quote, $info, $link, $error) {
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Class Info</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Override CSS -->
	<link rel="stylesheet" type="text/css" href="css/override.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="css/renderform.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto+Mono&display=swap" rel="stylesheet">

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
		<div class="form-group">
			<h1>We'll make you a magnificent profile ~ </h1>
			<h2>Give us a little background information so that we can get started.</h2>
			<h3>Please write in your first and last name.</h3>
		</div>

		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group">
			<div class="row">
				<div class="col-3">
					<label for="firstname"><strong>First Name or Nickname: *</strong></label>
					<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname; ?>"/>
				</div>
				<div class="col-3">
					<label for="lastname"><strong>Last Name: *</strong></label>
					<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>"/>
				</div>
			</div>	
		</div>

		<h3>Upload a quote here! Select your favorite quote or short poem.</h3>
		<h4>20 words or under is ideal - this is the perfect place for a haiku, not so much a full-length poem.</h4>
		<div class="form-group">
			<div class="row">
				<div class="col-10">
					<label for="quote"><strong>quote: *</strong></label>
					<textarea class="form-control" name="quote" id="quote" value="<?php echo $quote; ?>"></textarea>
				</div>
			</div>
		</div>
		<h3>Write a couple sentences about yourself.</h3>
		<h4>(For the sake of brevity, pretty please keep it to 80 words or under.)</h4>
		<div class="form-group">
			<div class="row">
				<div class="col-11">
					<label for="info"><strong>Blurb About You: *</strong></label>
					<textarea class="form-control" name="info" id="info" value="<?php echo $info; ?>"></textarea>
				</div>
			</div>
		</div>
		<h3>Throw us a link to your personal website page.</h3>
		<div class="form-group">
			<div class="row">
				<div class="col-6">
					<label for="link"><strong>Link to Personal Page: *</strong></label>
					<input type="text" class="form-control" name="link" id="link" value="<?php echo $link; ?>"/>
				</div>
			</div>
		</div>
		<div>* required</div>
		
		<input type="submit" name="submit" id="submit" value="Submit">
	</fieldset>
		

</form>

<div>
	
	<a href="portal.php">Cancel</a>
</div>

<!-- Javascript for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
?>