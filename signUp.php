<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>會員註冊</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>註冊資料</h1>
    <form data-toggle="validator" role="form">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="userName">使用者名稱</label>
          <input type="text" class="form-control" id="userName" name="userName" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="userPassword">密碼</label>
          <input type="password" class="form-control" id="userPassword" name="userPassword" required>
        </div>
        <div class="form-group col-md-6">
          <label for="userPasswordCheck">密碼確認</label>
          <input type="password" class="form-control" id="userPasswordCheck"  data-match="#userPassword" data-match-error="兩次密碼不一致" required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors" style="color: red;"></div>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label for="name">名字</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="userPhone">電話</label>
          <input type="text" class="form-control" name="userPhone" id="userPhone" required>
        </div>        
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label for="city">縣市</label>
          <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group col-md-8">
          <label for="address">地址</label>
          <input type="text" class="form-control" id="address" name="address" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="userBirthday">生日</label>
          <input type="date" class="form-control" name="userBirthday" id="userBirthday" required>
        </div>
      </div>
      <button type="button" class="btn btn-outline-primary" id="signUpButton" name="signUpButton" value="1" >送出</button>
      <button type="button" class="btn btn-outline-primary" onclick="location.href='index.php'">取消</button>      
    </form>
  </div>
</body>

<script>
  $(document).ready(function() {
  });
</script>

</html>