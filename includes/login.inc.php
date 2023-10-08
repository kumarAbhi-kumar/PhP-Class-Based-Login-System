<?php 
    if(isset($_POST['login'])){
        //Grabbing The data
        $uid = $_POST["uid"];
        $psd = $_POST["psd"];

        session_start();
        $userId = $_SESSION['userId'];
        // Instances SignupController class
        include('../config/db.php');
        include("../classes/login.classes.php");
        include("../classes/login-contr.classes.php");

        $login = new loginContr($uid, $psd);
        $login->signinUser();

        // Going  to Home Page

        header("location: ../homePage.php?UserLogedInSuccessfully");

    }
?>