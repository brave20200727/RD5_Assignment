<?php
    session_start();
    if(!isset($_SESSION["name"])) {
        header("Location: index.php");
    }
    else {
        $name = $_SESSION["name"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>凡谷網路銀行</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap-validator/dist/validator.min.js"></script>
</head>
<body>
    <div class="modal fade" id="transactionMsg" tabindex="-1" role="dialog" aria-labelledby="modalTitleOfTransactionMsg" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTitleOfTransactionMsg"></h5>
            </div>
            <div class="modal-body" id="modalBodyOfTransactionMsg">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <form>
            <div class="row">
                <div class="col-4">
                    <h1>帳務總覽</h1>    
                </div>
                <div class="col-8">
                    <button type="button" class="btn btn-outline-primary float-right" id="logoutButton">登出</button>                
                </div>
            </div>
            <div class="card text-center">
                <div class="card-header" >
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#money" data-toggle="tab">查詢餘額</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#deposit" data-toggle="tab">存款</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#withdrawal" data-toggle="tab">提款</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#userTransaction" data-toggle="tab">查詢明細</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content card-body">
                    <div class="tab-pane active" id="money">
                        <h3 class="card-title" id="moneyCardTitle"><?php echo $name?>&nbsp;您好～</h5>
                        <div class="card-text" id="card-text">帳戶餘額</div>
                        <div class="card-text" id="moneyCardText">$******</div>
                        <div class="card-text" id="moneyCardText2" style="display: none;">$</div>
                        <div class="card-text"><button type="button" class="btn btn-outline-primary" onclick="showMoney();">顯示餘額</button></div>
                    </div>
                    <div class="tab-pane" id="deposit">
                        <div class="card-text" id="depositCardText1">
                            <p>儲存金額</p>
                            <input type="number" id="depositNum" min="0" step="1000" required>
                            <button class="btn btn-outline-primary" type="button" id="depositButton">確定</button>                            
                        </div>
                        <div class="card-text" id="depositCardText2">
                            <p>快速存款</p>
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit1" onclick='$("#depositNum").prop("value", 1000);'>$1000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit2" onclick='$("#depositNum").prop("value", 3000);'>$3000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit3" onclick='$("#depositNum").prop("value", 5000);'>$5000</button>
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit4" onclick='$("#depositNum").prop("value", 10000);'>$10000</button>
                        </div> 
                    </div>
                    <div class="tab-pane" id="withdrawal">
                        <div class="card-text" id="withdrawalCardText1">
                            <p>提取金額</p>
                            <input type="number" id="withdrawalNum" min="0" step="1000" required>
                            <button class="btn btn-outline-primary" type="button" id="withdrawalButton">確定</button>                            
                        </div>
                        <div class="card-text" id="withdrawalCardText2">
                            <p>快速提款</p>
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal1" onclick='$("#withdrawalNum").prop("value", 1000);'>$1000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal2" onclick='$("#withdrawalNum").prop("value", 3000);'>$3000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal3" onclick='$("#withdrawalNum").prop("value", 5000);'>$5000</button>
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal4" onclick='$("#withdrawalNum").prop("value", 10000);'>$10000</button>
                        </div> 
                    </div>
                    <div class="tab-pane" id="userTransaction">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>存款</th>
                                    <th>提款</th>
                                    <th>餘額</th>
                                </tr>
                            </thead>
                            <tbody id="userTransactionBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </form>

    </div>

    <script>
        function showMoney() {
            $("#moneyCardText").toggle();
            $("#moneyCardText2").toggle();
        }

        $(document).ready(function() {
            let data2Server = {
                loadMainPage: true
            }
            $.ajax({
                type: "POST",
                url: "Api.php",
                data: data2Server,
                dataType: "json"
            }).then(function(dataFromServer) {
                // console.log(dataFromServer);
                for(let oneData of dataFromServer) {
                    let oneTransaction = $("<tr></tr>").append("<td>" + oneData.transactionTime + "</tr>");
                    oneTransaction.append("<td>" + oneData.deposit + "</tr>");
                    oneTransaction.append("<td>" + oneData.withdrawal + "</tr>");
                    oneTransaction.append("<td>" + oneData.totalMoney + "</tr>");
                    $("#userTransactionBody").append(oneTransaction);
                }
                $("#moneyCardText2").append(dataFromServer[0].totalMoney);

            }).catch(function(e) {
                console.log(e);
            });
            $("#logoutButton").on("click", function() {
                let data2Server = {
                    logoutButton: true,  
                };
                $.ajax({
                    type: "POST",
                    url: "Api.php",
                    data: data2Server
                }).then(function(dataFromServer) {
                    // console.log(dataFromServer);
                    $(location).prop('href', 'index.php');
                }).catch(function(e) {
                    console.log(e);
                });
            });
            $("#depositButton").on("click", function() {
                let data2Server = {
                    depositButton: true,
                    depositNum: $("#depositNum").prop("value")
                }
                $.ajax({
                    type: "POST",
                    url: "Api.php",
                    data: data2Server,
                    dataType: "json"
                }).then(function(dataFromServer) {
                    // console.log(dataFromServer);
                    if(dataFromServer["success"]) {
                        $(location).prop('href', 'mainPage.php');
                    }
                    else {
                        $("#modalTitleOfTransactionMsg").html("交易失敗");
                        $("#modalBodyOfTransactionMsg").html("儲存金額限制：<br>1.必須大於零<br>2.不可為小數<br>3.不可為單純小數點");
                        $("#transactionMsg").modal("show");
                    }
                }).catch(function(e) {
                    console.log(e);
                });
            });
            $("#withdrawalButton").on("click", function() {
                let data2Server = {
                    withdrawalButton: true,
                    withdrawalNum: $("#withdrawalNum").prop("value")
                }
                $.ajax({
                    type: "POST",
                    url: "Api.php",
                    data: data2Server,
                    dataType: "json"
                }).then(function(dataFromServer) {
                    // console.log(dataFromServer);
                    if(dataFromServer["success"]) {
                        $(location).prop('href', 'mainPage.php');
                    }
                    else {
                        $("#modalTitleOfTransactionMsg").html("交易失敗");
                        $("#modalBodyOfTransactionMsg").html("提取金額限制：<br>1.必須大於零<br>2.不可為小數<br>3.不可為單純小數點");
                        $("#transactionMsg").modal("show");
                    }
                }).catch(function(e) {
                    console.log(e);
                });
            });
        });
    </script>
</body>
</html>