<?php
    include_once 'resource/database.php';
    include_once 'resource/utilities.php';

    if(isset($_POST['loginButton'])){
        $form_errors = array();

        $required_fields = array('username', 'password');
    
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    
        if(empty($form_errors)){
            
            // collect form data
            $user = $_POST['username'];
            $password = $_POST['password'];

            // check if user exist in database
            $sqlQuery = "select * from users where username = :username";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':username' => $user)); 

            while($row = $statement->fetch()){
                $id = $row['id'];
                $hashed_password = $row['password'];
                $username = $row['username'];

                if(password_verify($password, $hashed_password)){
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;

                    echo $welcome = "<script type=\"text/javascript\">
                        swal({
                            title: \"Welcome Back $username\",
                            text: \"You're being logged in.\",
                            type: 'success',
                            timer: 6000,
                            showConfirmButton: false });

                            setTimeout(function(){
                                window.location.href = 'index.php';
                            }, 5000);
                    </script>";

                    // header("location: index.php");
                } else {
                    
                    $result = "<p style='padding: 20px; color: red; vorder: 1px solid grey;'> Invalid username or password</p>";
                }
            }

        }else {
            if(count($form_errors) == 1 ){
                $result = "<p style='color: red'> There was 1 error in the form</p>";
            }else {
                $result = "<p style='color:red;'> There were" .count($form_errors). " error in the form</p>";
            }
        }
    }

    
?>