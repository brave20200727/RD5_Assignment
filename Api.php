<?php
    if(isset($_POST["loginButton"])) {
        header("Location: mainPage.html");
    }
    if(isset($_POST["signUpButton"])) {
        header("Location: index.html");
    }
?>