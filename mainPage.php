<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>凡谷網路銀行</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form>
            <div class="row">
                <div class="col-4">
                    <h1>帳務總覽</h1>    
                </div>
                <div class="col-8">
                    <button class="btn btn-outline-primary float-right">登出</button>                
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
                            <a class="nav-link" href="#detail" data-toggle="tab">查詢明細</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content card-body">
                    <div class="tab-pane active" id="money">
                        <h3 class="card-title" id="moneyCardTitle">帳戶餘額</h5>
                        <div class="card-text" id="moneyCardText">$5487</div>
                    </div>
                    <div class="tab-pane" id="deposit">
                        <div class="card-text" id="depositCardText1">
                            <p>儲存金額</p>
                            <input type="text" name="depositNum" id="depositNum" required>
                            <button class="btn btn-outline-primary" type="submit" id="depositButton" name="depositButton" value="1">確定</button>                            
                        </div>
                        <div class="card-text" id="depositCardText2">
                            <p>快速存款</p>
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit1" onclick='$("#depositNum").prop("value", "1000");'>$1000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit2" onclick='$("#depositNum").prop("value", "3000");'>$3000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit3" onclick='$("#depositNum").prop("value", "5000");'>$5000</button>
                            <button class="btn btn-outline-primary" type="button" id="fastdeposit4" onclick='$("#depositNum").prop("value", "10000");'>$10000</button>
                        </div> 
                    </div>
                    <div class="tab-pane" id="withdrawal">
                        <div class="card-text" id="withdrawalCardText1">
                            <p>提取金額</p>
                            <input type="text" name="withdrawalNum" id="withdrawalNum" required>
                            <button class="btn btn-outline-primary" type="submit" id="withdrawalButton" name="withdrawalButton" value="1">確定</button>                            
                        </div>
                        <div class="card-text" id="withdrawalCardText2">
                            <p>快速提款</p>
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal1" onclick='$("#withdrawalNum").prop("value", "1000");'>$1000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal2" onclick='$("#withdrawalNum").prop("value", "3000");'>$3000</button> 
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal3" onclick='$("#withdrawalNum").prop("value", "5000");'>$5000</button>
                            <button class="btn btn-outline-primary" type="button" id="fastwithdrawal4" onclick='$("#withdrawalNum").prop("value", "10000");'>$10000</button>
                        </div> 
                    </div>
                    <div class="tab-pane" id="detail">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>存款</th>
                                    <th>提款</th>
                                    <th>餘額</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01/04/2012</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>5487</td>
                                </tr>
                                <tr>
                                    <td>02/04/2012</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>5487</td>
                                </tr>
                                <tr>
                                    <td>03/04/2012</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>5487</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </form>

    </div>

    <script>
    </script>
</body>
</html>