<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Class Info</title>
  <link rel="stylesheet" type="text/css" href="css/renderform.css">

</head>
<body>
<?php
// connect to the database
include('connect-db.php');

// get results from database
$result = mysqli_query($connection, "SELECT * FROM classinfo");
?>

<a href="new.php" class="plus_new">New Record</a>


<table border>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Blurb</th>
    <th>Quote</th>
    <th>Link</th>
    <th colspan="2"><em>functions</em></th>
  </tr>
<?php
// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {
?>
  <tr>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['info']; ?></td>
    <td><?php echo $row['quote']; ?></td>
    <td><?php echo $row['link']; ?></td>
    <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
    <td><a onclick="return confirm('Are you sure you want to delete: <?php echo $row["firstname"] . " " . $row["lastname"]; ?>?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
  </tr>
<?php
// close the loop
}
?>
</table>

<div>
  <br>
  <a href="index.php">Cancel</a>
</div>
</body>
</html>
<?php
  mysqli_free_result($result);
  mysqli_close($connection);
?>