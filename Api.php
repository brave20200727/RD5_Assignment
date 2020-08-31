<?php
    session_start();
    $dbLink = mysqli_connect("localhost", "root", "root", "RD5_Assignment", 8889) or die(mysqli_connect_error());
    mysqli_query($dbLink, "set names utf8");

    if(isset($_POST["loginButton"])) {
        $userNameInput = $_POST["userNameInput"];
        $userPasswordInput = $_POST["userPasswordInput"];
        $sqlCommand = <<< multi
            SELECT * FROM users WHERE userName = '$userNameInput'
        multi;
        $result = mysqli_query($dbLink, $sqlCommand);
        $rowNum = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($rowNum == 1) {
            if($row["userPassword"] == $userPasswordInput) {
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["userPassword"] = $row["userPassword"];
                $_SESSION["name"] = $row["name"];
                $returnValue["success"] = true;
                $returnValue["name"] = $row["name"];
                echo json_encode($returnValue);
            } else {
                echo '{"success": false}';
            }
        }
        else{
            echo '{"success": false}';            
        }
    }
    if(isset($_POST["signUpButton"])) {
        $userName = $_POST["userName"];
        $userPassword = $_POST["userPassword"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $city = $_POST["city"];
        $address = $_POST["address"];
        $birthday = $_POST["birthday"];
        $sqlCommand = <<< multi
            SELECT * FROM users WHERE userName = '$userName'
        multi;
        $result = mysqli_query($dbLink, $sqlCommand);
        $rowNum = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($rowNum == 0) {
            $sqlCommand = <<< multi
                INSERT INTO users(userName, userPassword, name, phone, city, address, birthday)
                VALUE ('$userName', '$userPassword', '$name', '$phone', '$city', '$address', '$birthday')
            multi;
            mysqli_query($dbLink, $sqlCommand);
            $sqlCommand = <<< multi
                INSERT INTO transactions(userId, deposit, withdrawal, totalMoney)
                VALUE ((SELECT userId FROM users WHERE userName = '$userName'), '0', '0', '0')
            multi;
            mysqli_query($dbLink, $sqlCommand);
            echo '{"success": true}';            
        }
        else{
            echo '{"success": false}';            
        }

    }
    if(isset($_POST["logoutButton"])) {
        session_destroy();
    }
    mysqli_close($dbLink);
?>