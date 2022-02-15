<?php
    //add our database connection script
    include_once 'resource/database.php';
    include_once 'resource/utilities.php';

    // process the form
    if(isset($_POST['signupButton'])){

        $form_errors = array();

        $require_fields = array('email','username','password');

        $form_errors = array_merge($form_errors, check_empty_fields($require_fields));

        $fields_to_check_length = array('username' => 4, 'password' => 6);

        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

        $form_errors = array_merge($form_errors, check_email($_POST));

    
    if(empty($form_errors)){
        
        $email = $_POST['email'];
        $username =$_POST['username'];
        $password = $_POST['password'];

        //hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try{
            //create SQL insert statement
            $sqlinsert = "INSERT INTO users(username,email,password,join_date) 
            VALUES(:username, :email,:password, now())";

            // use PDO prepared to sanitize data
            $statement = $db->prepare($sqlinsert);
            
            // add data into database
            $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

            // check if one new row was create
            if($statement->rowCount() == 1){

                echo $result = "<script type=\"text/javascript\">
                        swal({
                            title: \"Congratulations $username\",
                            text: \"Registration completed Successfully.\",
                            type: 'success',                          
                            confirmButtonText: \"Thank You!\" });
                        </script>";
            }
        } catch(PDOException $ex){
            $result ="<p style='color: red'> An Error occured: ".$ex->getMessage()."</p>";
        }
        
    } else {
        if(count($form_errors) == 1){

            $result = "<p style='color: red;'> There was 1 error in the formbox <br>";

        }else {

            $result = "<p style='color: red;'>There were " .count($form_errors). " errors in the form <br>"; 

        }
        
    }
}

?>