<?php
    if(isset($_POST["loginButton"])) {
        session_start();
        $_SESSION["userName"] = $_POST["userNameInput"];
        $_SESSION["userPassWord"] = $_POST["userPasswordInput"];
        header("Location: mainPage.php");
    }
    if(isset($_POST["signUpButton"])) {
        header("Location: index.php");
    }
    if(isset($_POST["withdrawalButton"])) {
        var_dump($_POST);
        header("Location: mainPage.php");
    }
?>

        <!--########  ##       ##     ## ######## 
            ##     ## ##       ##     ## ##       
            ##     ## ##       ##     ## ##       
            ########  ##       ##     ## ######   
            ##     ## ##       ##     ## ##       
            ##     ## ##       ##     ## ##       
            ########  ########  #######  ########  -->