<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<?php include "inc/html_top.php" ?>

    <body class="container dbgrid">
    <?php
    // connect to the database
    include('connect-db.php');

    // get results from database
    $result = mysqli_query($connection, "SELECT * FROM classinfo");
    ?>

    <table class="table table-bordered table-secondary">
        <thead class="thead-dark">
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Blurb</th>
            <th scope="col">Quote</th>
            <th scope="col">Image</th>
            <th scope="col">Link</th>
            <th scope="col" colspan="2">Database Functions</th>
        </tr>
        </thead>
        <?php
        // loop through results of database query, displaying them in the table
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tbody>
            <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['info']; ?></td>
                <td><?php echo $row['quote']; ?></td>
                <?php if (empty($row['img'])) {
                    $imgSrc = "images/profile.png";
                } else {
                    $imgSrc = "images/upload/" . $row['img'];
                } ?>
                <td><img class="img-fluid img-thumbnail" src="<?php echo $imgSrc ?>"
                         alt="<?php echo $row['firstname'] ?>'s Image"></td>
                <td><?php echo $row['link']; ?></td>
                <td><a class="btn btn-warning ml-2" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a class="btn btn-danger ml-2"
                       onclick="return confirm('Are you sure you want to delete: <?php echo $row["firstname"] . " " . $row["lastname"]; ?>?')"
                       href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
            </tbody>
            <?php
// close the loop
        }
        ?>
    </table>

    <div class="db-buttons">
        <a class="btn btn-secondary" href="portal.php">Cancel</a>
        <a class="btn btn-primary" href="new.php">Add a new record</a>
    </div>

    <?php include "inc/scripts.php" ?>

    </body>
    </html>

<?php
mysqli_free_result($result);
mysqli_close($connection);
?>