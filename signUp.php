<?php
  session_start();
?>
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
  <div class="modal fade" id="signUpSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">註冊成功</h5>
        </div>
        <div class="modal-body">
          恭喜您註冊成功！
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$(location).prop('href', 'index.php');">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="signUpFail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">註冊失敗</h5>
        </div>
        <div class="modal-body">
          此使用者名稱已經存在或是有資料為空
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>註冊資料</h1>
    <form>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="userName">使用者名稱</label>
          <input type="text" class="form-control" id="userName" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="userPassword">密碼</label>
          <input type="password" class="form-control" id="userPassword" onblur="check2Password();" required>
        </div>
        <div class="form-group col-md-6">
          <label for="userPasswordCheck">密碼確認</label>
          <input type="password" class="form-control" id="userPasswordCheck" onblur="check2Password();" required>
          <div class="invalid-feedback">兩次輸入密碼不一致</div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="name">名字</label>
          <input type="text" class="form-control" id="name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="phone">電話</label>
          <input type="text" class="form-control" id="phone" required>
        </div>        
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="city">縣市</label>
          <input type="text" class="form-control" id="city" required>
        </div>
        <div class="form-group col-md-8">
          <label for="address">地址</label>
          <input type="text" class="form-control" id="address" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="birthday">生日</label>
          <input type="date" class="form-control" id="birthday" required>
        </div>
      </div>
      <button type="button" class="btn btn-outline-primary" id="signUpButton" >送出</button>
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
    $("#signUpButton").on("click", function() {
      let data2Server = {
        signUpButton: true,
        userName: $("#userName").prop("value"),
        userPassword: $("#userPassword").prop("value"),
        name: $("#name").prop("value"),
        phone: $("#phone").prop("value"),
        city: $("#city").prop("value"),
        address: $("#address").prop("value"),
        birthday: $("#birthday").prop("value"),
      }
      $.ajax({
        type: "POST",
        url: "Api.php",
        data: data2Server,
        dataType: "json"
      }).then(function(dataFromServer) {
        // console.log(dataFromServer);
        if(dataFromServer["success"]) {
          $("#signUpSuccess").modal("show");
        } else {
          $("#signUpFail").modal("show");
        }
      }).catch(function(e) {
        console.log(e);
      });
    })
  });
</script>

</html>