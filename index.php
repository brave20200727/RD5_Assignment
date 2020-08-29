<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入畫面</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap-validator/dist/validator.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>凡谷網路銀行</h1>
        <form>
            <div class="form-group">
                <label for="userNameInput">使用者名稱:</label>
                <input type="text" class="form-control" id="userNameInput" name="userNameInput" required>
            </div>
            <div class="form-group">
                <label for="userPasswordInput">密碼:</label>
                <input type="password" class="form-control" id="userPasswordInput" name="userPasswordInput" required>
            </div>
            <div class="form-check form-group">
                <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">記住我</label>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-outline-primary" id="loginButton" name="loginButton" value="1">登入</button>
                <button type="button" class="btn btn-outline-primary" onclick="location.href='signUp.php'">註冊</button>            
            </div>            
        </form>
    </div>
</body>
</html>