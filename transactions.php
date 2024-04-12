<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();

if (isset($_POST['send'])) {

    $email = $_SESSION['login'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $tdate = $_POST['tdate'];
    $amount = $_POST['amount'];
    $account = $_POST['account'];
    $pdate = date('Y-m-d H:i:s');
    $a = mysqli_query($con, "insert into transactions(email,type,category,description,date,amount,account,created)  values('$email','$type','$category','$description','$tdate','$amount','$account','$pdate')");
   
}
if (isset($_POST['add'])) {

   
    $typecategory = $_POST['typecategory'];
    $newcategory = $_POST['newcategory'];

    $b = mysqli_query($con, "insert into category(type,name)  values('$typecategory','$newcategory')");
  
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Incomes and Payments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

    <style>
        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
            opacity: 0.4;
            position: fixed;
            right: 28px;
            width: 200px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Full-width input fields */
        .form-container select[name=typecategory],
        .form-container input[type=newcategory] {
            padding: 10px;
            margin: 10px 0 32px 0;
            border: none;
            background: #f1f1f1;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 350px;
            padding: 15px;
            background-color: white;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    </style>
</head>

<body class="">
    <?php include("header.php"); ?>
    <div class="page-container row-fluid">
        <?php include("leftbar.php"); ?>
        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <div class="page-title">
                <h3>Create transaction</h3>

                <!-- Popup form -->

                <!-- A button to open the popup form -->
                <button class="open-button" onclick="openForm()">Add new category</button>

                <!-- The form -->
                <div class="form-popup" id="myForm">
                    <form class="form-container" method="post" action="" onSubmit="return valid();">
                        <h1>Add new category</h1>
                       
                        <label>Type</label>
                        
                            <select name="typecategory" class="form-control select">
                                <option value="Income">Income</option>
                                <option value="Expenditure">Expenditure</option>
                            </select>
                        
                       
                        <label>Category</label>
                        
                            <input type="newcategory" name="newcategory" id="newcategory" value="" required class="form-control" />
                         

                        <input type="submit" name="add" value="Add" class="btn btn-primary pull-right">
                        <button type="button" class="btn btn-default" onclick="closeForm()">Close</button>
                    </form>
                </div>

                <!-- End Popup form -->



                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="panel panel-default">

                                <div class="panel-body bg-white">
                                    <?php if (isset($_SESSION['msg1'])): ?>
                                        <p text-align="center" style="color:#FF0000">
                                            <?= $_SESSION['msg1']; ?>
                                            <?= $_SESSION['msg1'] = ""; ?>
                                        </p>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Type</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-money"></span></span>

                                                <select name="type" class="form-control select">
                                                    <option value="">Choose your Type</option>
                                                    <option value="Income">Income</option>
                                                    <option value="Expenditure">Expenditure</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select name="category" class="form-control select" required>
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <option>Option
                                                        <?= $i ?>
                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="description" required class="form-control"
                                                rows="5"></textarea>

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Date </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <input type="date" name="tdate" id="tdate" value="" required
                                                    class="form-control" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Amount</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-pencil"></span></span>
                                                <input type="text" name="amount" id="amount" value="" required
                                                    class="form-control" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Payment type</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>

                                                <select name="account" class="form-control select">
                                                    <option value="">Choose your Type</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Credit">Credit</option>
                                                    <option value="Bank account">Bank account</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>

                                </div>









                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-default">Clear Form</button>
                                <input type="submit" value="Create" name="send" class="btn btn-primary pull-right">
                            </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>

    </div>
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/js/core.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <script src="assets/js/demo.js" type="text/javascript"></script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
</body>

</html>
