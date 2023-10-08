<?php
    if(isset($_POST['signUp'])){
        // Grabbing the data
        $userName = $_POST['newUserName'];
        $regNo = $_POST['newUserId'];
        $email = $_POST['newUserEmail'];
        $psd = $_POST['newUserPsd'];
        $psd_repeat = $_POST['newUserRPsd'];

        // Instantiate signupControl Class
        include('../config/db.php');
        include("../classes/signup.classes.php");
        include("../classes/singup-contr.classes.php");

        $signup = new SignUpContr($userName, $regNo, $psd, $psd_repeat, $email);
        
        // Running error handlers and user signUp
        $signup->signupUser();

        // Going back to Login/SignUp Page
        header("location: ../index.php?error=none");
    }
?>