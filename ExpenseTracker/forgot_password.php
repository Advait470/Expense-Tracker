

    <?php 
        $page_title = "Expense Tracker - Password Reset";
        include_once 'partials/header.php';
        include_once 'partials/parsePasswordReset.php';
    ?>
    
    <div class="container" style="margin-top: 5%;">
        <section class="col col-lg-7">
        <h2>Password Reset Form</h2>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>



<form action="" method="POST">
    <div class="mb-3">
        <label for="emailField" class="form-label">Email </label>
        <input type="email" class="form-control" id="emailField" name="email" placeholder="Email" aria-describedby="emailHelp">
    
</div>

<div class="mb-3">
    <label for="PasswordField" class="form-label">New Password</label>
    <input type="password" placeholder="Password" name="new_password" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
    <label for="PasswordField" class="form-label">Confirm Password</label>
    <input type="password" placeholder="Password" name="confirm_password" class="form-control" id="exampleInputPassword1">
</div>

<button type="submit" name="passwordResetBtn" class="btn btn-primary pull-right">Reset Password</button>
</form>
</section>

</div>
<p><a href="index.php">back</a></p>

    <?php include_once 'partials/footer.php' ?>
</body>
</html>