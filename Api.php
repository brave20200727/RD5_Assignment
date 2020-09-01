<?php
    session_start();
    $dbLink = mysqli_connect("localhost", "root", "root", "RD5_Assignment", 8889) or die(mysqli_connect_error());
    mysqli_query($dbLink, "set names utf8");

    if(isset($_POST["loginButton"])) {
        $userNameInput = $_POST["userNameInput"];
        // $userPasswordInput = $_POST["userPasswordInput"];
        $userPasswordInput = hash('sha256', $_POST["userPasswordInput"]);
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
    else if(isset($_POST["signUpButton"])) {
        $userName = $_POST["userName"];
        // $userPassword = $_POST["userPassword"];
        $userPassword = hash('sha256', $_POST["userPassword"]);
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $city = $_POST["city"];
        $address = $_POST["address"];
        $birthday = $_POST["birthday"];
        if($userName != "" && $userPassword != "" && $name != "" && $phone != ""
        && $city != "" && $address != "" && $birthday != "") {
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
                    VALUE ((SELECT userId FROM users WHERE userName = '$userName'), 0, 0, 0)
                multi;
                mysqli_query($dbLink, $sqlCommand);
                echo '{"errorCode": 666}';            
            }
            else{
                echo '{"errorCode": 2}';            
            }
        } else {
            echo '{"errorCode": 1}';
        }
    }
    else if(isset($_POST["logoutButton"])) {
        session_destroy();
    }
    else if(isset($_POST["loadMainPage"])) {
        $userName = $_SESSION["userName"];
        $sqlCommand = <<< multi
            SELECT * FROM transactions 
            WHERE userId = (SELECT userId FROM users WHERE userName = '$userName')
            ORDER BY transactionTime DESC
        multi;
        $result = mysqli_query($dbLink, $sqlCommand);
        while($oneRow = mysqli_fetch_assoc($result)) {
            $returnData[] = $oneRow;
        }
        echo json_encode($returnData);
    }
    else if(isset($_POST["depositButton"]) || isset($_POST["withdrawalButton"])) {
        $userName = $_SESSION["userName"];
        $sqlCommand = <<< multi
            SELECT totalMoney FROM transactions 
            WHERE userId = (SELECT userId FROM users WHERE userName = '$userName')
            ORDER BY transactionTime DESC
            Limit 0,1
        multi;
        $result = mysqli_query($dbLink, $sqlCommand);
        $row = mysqli_fetch_assoc($result);
        if(isset($_POST["depositButton"])) {
            $depositNum = $_POST["depositNum"];
            if($depositNum < 0) {
                echo '{"errorCode": 1}';
                return;
            }
            else if(strpos($depositNum, ".") !== false) {
                echo '{"errorCode": 2}';
                return;
            }
            else if($depositNum == "") {
                echo '{"errorCode": 3}';
                return;
            }
            else {
                $totalMoney = $row["totalMoney"] + intval($depositNum);
                $sqlCommand = <<< multi
                    INSERT INTO transactions(userId, deposit, withdrawal, totalMoney)
                    VALUE ((SELECT userId FROM users WHERE userName = '$userName'), $depositNum, 0, $totalMoney)
                multi;                
            }
        } else {
            $withdrawalNum = $_POST["withdrawalNum"];
            if($withdrawalNum < 0) {
                echo '{"errorCode": 1}';
                return;
            }
            else if(strpos($withdrawalNum, ".") !== false) {
                echo '{"errorCode": 2}';
                return;
            }
            else if($withdrawalNum == "") {
                echo '{"errorCode": 3}';
                return;
            }
            else {
                if($row["totalMoney"] < intval($withdrawalNum)) {
                    echo '{"errorCode": 4}';
                    return;
                }
                else {
                    $totalMoney = $row["totalMoney"] - intval($withdrawalNum);
                    $sqlCommand = <<< multi
                        INSERT INTO transactions(userId, deposit, withdrawal, totalMoney)
                        VALUE ((SELECT userId FROM users WHERE userName = '$userName'), 0, $withdrawalNum, $totalMoney)
                    multi;                     
                }
            }
        }
        mysqli_query($dbLink, $sqlCommand);
        echo '{"errorCode": 666}';
    }
    mysqli_close($dbLink);
?>