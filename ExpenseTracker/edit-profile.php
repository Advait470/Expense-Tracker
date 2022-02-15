<?php 
    $page_title = "Expense Tracker - Edit profile";
    include_once 'partials/header.php';
    include_once 'partials/parseProfile.php';

?>


<div class="container" style="margin-top: 5%;">
    <section class="col col-lg-7">
        <h2>Edit Profile</h2><hr>
        <div>
            <?php if(isset($result)) echo $result; ?>
            <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>
        <div class="clearfix"></div>

        <?php if(!isset($_SESSION['username'])): ?>
            <p class="lead">You are not authorized to view this page <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a></p>
        <?php else: ?>
        <form method="POST" action="">
            <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" value="<?php if(isset($email)) echo $email; ?>" id="emailField" aria-describedby="emailHelp">
              </div>
            <div class="mb-3">
                <label for="usernameField" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php if(isset($username)) echo $username; ?>" id="usernameField">
            </div>

            <input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id; ?>">
            <button type="submit" name="updateProfileBtn" class="btn btn-primary">Update Profile</button>
        </form>   
            <?php endif ?>
    </section>
    <p><a href="index.php">Back</a></p>
</div>

<?php include_once 'partials/footer.php'; ?>