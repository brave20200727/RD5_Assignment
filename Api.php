<?php
    if(isset($_POST["loginButton"])) {
        header("Location: mainPage.html");
    }
    if(isset($_POST["signUpButton"])) {
        header("Location: index.html");
    }
    if(isset($_POST["withdrawalButton"])) {
        var_dump($_POST);
        header("Location: mainPage.html");
    }
?>