<?php
// creates the edit record form
function renderForm($id, $firstname, $lastname, $quote, $info, $link, $img, $errors)
{
    ?>

    <?php include "inc/html_top.php"; ?>

    <body>

    <form action="<?php echo basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php" ?>" method="post" enctype="multipart/form-data">

        <fieldset>
            <legend>Tell us a little about yourself...</legend>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="firstname" class="bold">First Name or Nickname: *</label>
                        <input type="text" class="form-control <?php if ($errors['firstname']) {
                            echo 'is-invalid';
                        } ?>" name="firstname" id="firstname"
                               value="<?php echo $firstname; ?>" required>
                    </div>
                    <div class="col-3">
                        <label for="lastname" class="bold">Last Name: *</label>
                        <input type="text" class="form-control <?php if ($errors['lastname']) {
                            echo 'is-invalid';
                        } ?>" name="lastname" id="lastname"
                               value="<?php echo $lastname; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-10">
                        <label for="quote" class="bold">Quote: *</label>
                        <input type="text" class="form-control <?php if ($errors['quote']) {
                            echo 'is-invalid';
                        } ?>" name="quote" id="quote" value="<?php echo $quote; ?>" required>
                    </div>
                </div>
                <div>Max: 20 words</div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-11">
                        <label for="info" class="bold">About: *</label>
                        <input type="text" class="form-control  <?php if ($errors['info']) {
                            echo 'is-invalid';
                        } ?>" name="info" id="info" value="<?php echo $info; ?>" required>
                    </div>
                </div>
                <div>Max: 80 words</div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="link" class="bold">Link to Personal Page: *</label>
                        <input type="text" class="form-control  <?php if ($errors['link']) {
                            echo 'is-invalid';
                        } ?>" name="link" id="link" value="<?php echo $link; ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="img" class="bold">Profile Picture</label>
                <input type="file" class="form-control-file <?php if ($errors["img"]) {
                    echo "is-invalid";
                } ?>" id="img" name="img" accept="image/x-png,image/gif,image/jpeg">
            </div>
            <?php if ($img != '') { ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="removeImg" name="removeImg">
                    <label for="removeImg">Remove Old Profile Picture</label>
                </div>
            <?php } ?>
            <div class="text-danger shadow-text font-weight-bolder">* required</div>
            <div class="row">
                <div class="col mt-4">
                    <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit">
                </div>
            </div>
        </fieldset>
    </form>

    <div class="rf-buttons">
        <a class="btn btn-primary" href="studentlist.php">Cancel</a>
    </div>

    <?php include "inc/scripts.php" ?>

    </body>
    </html>
    <?php
}
?>