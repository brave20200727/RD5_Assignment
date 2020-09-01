<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入畫面</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="modal fade" id="loginMsg" tabindex="-1" role="dialog" aria-labelledby="modalTitleOfloginMsg" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTitleOfloginMsg"></h5>
            </div>
            <div class="modal-body" id="modalBodyOfloginMsg">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="loginMsgCloseButton" data-dismiss="modal" onclick="$(location).prop('href', 'mainPage.php');">Close</button>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <h1>凡谷網路銀行</h1>
        <form>
            <div class="form-group">
                <label for="userNameInput">使用者名稱:</label>
                <input type="text" class="form-control" id="userNameInput" required>
            </div>
            <div class="form-group">
                <label for="userPasswordInput">密碼:</label>
                <input type="password" class="form-control" id="userPasswordInput" required>
            </div>
            <div class="form-check form-group">
                <input class="form-check-input" type="checkbox" id="rememberMe" disabled>
                <label class="form-check-label" for="rememberMe">記住我</label>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-outline-primary" id="loginButton">登入</button>
                <button type="button" class="btn btn-outline-primary" onclick="location.href='signUp.php'">註冊</button>            
            </div>            
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#loginButton").on("click", function() {
                let data2Server = {
                    userNameInput: $("#userNameInput").prop("value"),
                    userPasswordInput: $("#userPasswordInput").prop("value"), 
                    loginButton: true            
                }
                // console.log(data2Server);
                $.ajax({
                    type: "POST",
                    url: "Api.php",
                    data: data2Server,
                    dataType: "json"
                }).then(function(dataFromServer) {
                    // console.log(dataFromServer);
                    if(dataFromServer["success"]) {
                        $("#modalTitleOfloginMsg").append("登入成功");
                        $("#modalBodyOfloginMsg").append(dataFromServer["name"] + "&nbsp;歡迎光臨凡谷網頁銀行！");
                        $("#loginMsgCloseButton").on("click", function() {
                            $(location).prop('href', 'mainPage.php');
                        });
                        $("#loginMsg").modal("show");
                    } else {
                        $("#modalTitleOfloginMsg").append("登入失敗");
                        $("#modalBodyOfloginMsg").append("帳號或密碼錯誤！");
                        $("#loginMsg").modal("show");
                    }
                }).catch(function(e) {
                    console.log(e);
                });
            })
        });
    </script>
</body>
</html>