<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
if (isset($_POST['send'])) {

    $email = $_SESSION['login'];
    $title = $_POST['title'];
    $due = $_POST['due'];
    $description = $_POST['description'];
    $st = "Open";
    $pdate = date('Y-m-d H:i:s');
    $a = mysqli_query($con, "insert into tasks(email,title,description,due,status,created)  values('$email','$title','$description','$due','$st','$pdate')");
    if ($a) {
        echo "<script>alert('Ticket Genrated'); location.replace(document.referrer)</script>";
    }
}

if (isset($_GET['/delete/id'])) {
    $id = $_GET['/delete/id'];
    $delete = mysqli_query($con, "DELETE FROM `tasks` WHERE `id`='$id'");
}
if (isset($_GET['/done/id'])) {
    $id = $_GET['/done/id'];
    $delete = mysqli_query($con, "UPDATE `tasks` SET `status`='Done' WHERE `id`='$id'");
}
if (isset($_GET['/inprocess/id'])) {
    $id = $_GET['/inprocess/id'];
    $delete = mysqli_query($con, "UPDATE `tasks` SET `status`='In Process' WHERE `id`='$id'");
}

$TodaysDate = date('Y-m-d');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Create task</title>
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
                <h3>Create Task</h3>
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="panel panel-default">
                                <div class="panel-body bg-white">
                                    <?php if (isset($_SESSION['msg1'])) : ?>
                                        <p text-align="center" style="color:#FF0000"><?= $_SESSION['msg1']; ?><?= $_SESSION['msg1'] = ""; ?></p>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="title" id="title" value="" required class="form-control" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="description" required class="form-control" rows="5"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Due </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <input type="date" name="due" id="due" value="<?php echo date('Y-m-d'); ?>" required class="form-control" />
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


                    <!-- START TABLE -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <?php echo $deleteMsg ?? ''; ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <caption>Monthly tasks</caption>
                                        <tr>
                                            <th>TO DO</th>
                                            <th>DESCRIPTION</th>
                                            <th>DUE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                            <th>REMOVE</th>
                                        </tr>
                                        <?php

                                        if ($result = mysqli_query($con, "select * from tasks where MONTH(created)=MONTH(NOW())")) {
                                            while ($row = $result->fetch_assoc()) {
                                                $field1name = $row["title"];
                                                $field2name = $row["description"];
                                                $field3name = $row["due"];
                                                $field4name = $row["status"];
                                                $field5name = $row["id"];

                                                echo "<tr>
                                                    <td>" . $field1name . "</td>
                                                    <td>" . $field2name . "</td>
                                                    <td>" . $field3name . "</td>
                                                    <td>" . $field4name . "</td>
                                                    <td>
                                                        <a href='tasks.php?/done/id=" . $field5name . "'class='btn'>Done</a>
                                                        <a href='tasks.php?/inprocess/id=" . $field5name . "'class='btn'>In process</a>
                                                    </td>
                                                    <td>
                                                        <a href='tasks.php?/delete/id=" . $field5name . "'class='btn'>Delete</a>
                                                    </td>
                                                </tr>";
                                            }
                                            $result->free();
                                        }
                                        ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TABLE -->


                    <!-- START TABLE -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <?php echo $deleteMsg ?? ''; ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <caption>Open tasks from previous months</caption>
                                        <tr>
                                            <th>TO DO</th>
                                            <th>DESCRIPTION</th>
                                            <th>DUE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                            <th>REMOVE</th>
                                        </tr>
                                        <?php

                                        if ($result = mysqli_query($con, "select * from tasks where status!='Done' and MONTH(created)!=MONTH(NOW())")) {
                                            while ($row = $result->fetch_assoc()) {
                                                $field1name = $row["title"];
                                                $field2name = $row["description"];
                                                $field3name = $row["due"];
                                                $field4name = $row["status"];
                                                $field5name = $row["id"];

                                                echo "<tr>
                                                    <td>" . $field1name . "</td>
                                                    <td>" . $field2name . "</td>
                                                    <td>" . $field3name . "</td>
                                                    <td>" . $field4name . "</td>
                                                    <td>
                                                        <a href='tasks.php?/done/id=" . $field5name . "'class='btn'>Done</a>
                                                        <a href='tasks.php?/inprocess/id=" . $field5name . "'class='btn'>In process</a>
                                                    </td>
                                                    <td>
                                                        <a href='tasks.php?/delete/id=" . $field5name . "'class='btn'>Delete</a>
                                                    </td>
                                                </tr>";
                                            }
                                            $result->free();
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TABLE -->
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

</body>

</html>
