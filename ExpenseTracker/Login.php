

    <?php 
        $page_title = "Expense Tracker - Login Page";
        include_once 'partials/header.php';
        include_once 'partials/parselogin.php'

    ?>
    
    <div class="container" style="margin-top: 5%">
        <section class="col col-lg-7">
        <h2>Login Form</h2>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>



<form action="" method="POST">
    <div class="mb-3">
        <label for="usernameField" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>
<div class="mb-3">
    <label for="PasswordField" class="form-label">Password</label>
    <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" name="remember">Remember Me</label>
</div>
<a href="forgot_password.php" style="padding-right: 10px;">Forgot Password?</a>
<button type="submit" name="loginButton" class="btn btn-primary pull-right">Sign In</button>
</form>
</section>

</div>
<p><a href="index.php">back</a></p>

    <?php include_once 'partials/footer.php' ?>
</body>
</html>
