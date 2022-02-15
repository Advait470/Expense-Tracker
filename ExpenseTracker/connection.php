<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $query = "insert into form(name,password) values('$name','$password')";

        $run = mysqli_query($conn,$query) or die(mysqli_error());

        if($run) {
          echo "Form Submitted Successfully";
        } else {
          echo "Form not Submitted";
        }
    }
?>