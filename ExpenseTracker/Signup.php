



    <?php 
        $page_title = "Expense Tracker - Register Page";
        include_once 'partials/header.php';
        include_once 'partials/parseSignup.php';

    ?>
    
    <div class="container" style="margin-top: 5%;">
        <section class="col col-lg-7">
        <h2>Register Form</h2>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>



<form action="" method="POST">
    <div class="mb-3">
        <label for="emailField" class="form-label">Email </label>
        <input type="email" class="form-control" id="emailField" name="email" placeholder="Email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>

<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="usernameField" name="username" placeholder="Username">
</div>

<div class="mb-3">
    <label for="PasswordField" class="form-label">Password</label>
    <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
</div>

<button type="submit" name="signupButton" class="btn btn-primary pull-right">Sign Up</button>
</form>
</section>

</div>
<p><a href="index.php">back</a></p>

    <?php include_once 'partials/footer.php' ?>
</body>
</html>