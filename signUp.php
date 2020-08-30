<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>會員註冊</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="node_modules/bootstrap-validator/dist/validator.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>註冊資料</h1>
    <form>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="userName">使用者名稱</label>
          <input type="text" class="form-control" id="userName" name="userName" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="userPassword">密碼</label>
          <input type="password" class="form-control" id="userPassword" name="userPassword" onblur="check2Password();" required>
        </div>
        <div class="form-group col-md-6">
          <label for="userPasswordCheck">密碼確認</label>
          <input type="password" class="form-control" id="userPasswordCheck" name="userPasswordCheck" onblur="check2Password();" required>
          <div class="invalid-feedback">兩次輸入密碼不一致</div>
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
  function check2Password() {
    let password1 = $("#userPassword").prop("value");
    let password2 = $("#userPasswordCheck").prop("value");
    if(password1 != password2) {
      $("#userPasswordCheck").removeClass("is-valid");
      $("#userPasswordCheck").addClass("is-invalid");
      $("#signUpButton").prop("disabled", true);
    }
    else {
      $("#userPasswordCheck").removeClass("is-invalid");
      $("#userPasswordCheck").addClass("is-valid");
      $("#signUpButton").prop("disabled", false);
    }
  }

  $(document).ready(function() {
  });
</script>

</html>