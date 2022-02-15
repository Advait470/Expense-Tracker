<?php 
    include_once 'resource/database.php';
    include_once 'resource/utilities.php';

    if(isset($_POST['passwordResetBtn'])){

        $form_errors = array();

        $required_fields = array('email','new_password','confirm_password');

        $form_error = array_merge($form_errors, check_empty_fields($required_fields));

        $fields_to_check_length = array('new_password' => 6, 'confirm_password' => 6);

        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        $form_errors = array_merge($form_errors, check_email($_POST));

        if(empty($form_errors)){
            $email = $_POST['email'];
            $password1 = $_POST['new_password'];
            $password2 = $_POST['confirm_password'];

            if($password1 != $password2){
                $result = "<p style='padding: 20px; border: 1px solid grey; color: red;'> New Password and confirm password does not match </p>";
            }else {
                try{
                    $sqlQuery = "select email from users where email =:email";

                    $statement = $db->prepare($sqlQuery);

                    $statement->execute(array(':email' => $email));

                    if($statement->rowCount() == 1){
                        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                        $sqlUpdate = "update users set password =:password where email=:email";

                        $statement = $db->prepare($sqlUpdate);

                        $statement->execute(array(':password' => $hashed_password, ':email' => $email));
                        
                        echo $result = "<script type=\"text/javascript\">
                        swal({
                            title: \"Updated!\",
                            text: \"Password Reset Successfully.\",
                            type: 'success',                          
                            confirmButtonText: \"Thank You!\" });
                        </script>";

                    }else {
                        echo $result = "<script type=\"text/javascript\">
                        swal({
                            title: \"OOPS!\",
                            text: \"The email address provided does not exist in the database, please try again\",
                            type: 'error',                          
                            confirmButtonText: \"Okay\" });
                        </script>";

                    }
                }catch (PDOException $ex){
                    $result = "<p style='style: padding: 20px; border: 1px solid grey; color: red;'> An error occured:".$ex->getMessage()." </p>";
                    }
                }

            }else {
                if(count($form_errors) == 1){
                    $result = "<p style:'color: red'> There was 1 error in the form <br></p>";
                }else {
                    $result = "<p style='color:red'> There were " .count($form_errors)." errors in the form <br></p>";
                }
            }
        }

?>