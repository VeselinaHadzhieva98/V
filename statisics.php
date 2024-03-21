<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
if (isset($_POST['send'])) {
    $count_my_page = ("hitcounter.txt");
    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp);
    $tid = $hits[0];
    $email = $_SESSION['login'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $st = "Open";
    $pdate = date('Y-m-d H:i:s');
    $a = mysqli_query($con, "insert into tasks(id,email,title,description,due,status,created)  values('$tid','$email','$title','$description','$due','$st','$pdate')");
    if ($a) {
        echo "<script>alert('Ticket Genrated'); location.replace(document.referrer)</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/shape-hover/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/shape-hover/css/component.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.theme.css" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
    <link rel="stylesheet" href="assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen">
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/magic_space.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>

<body class="">
    <?php include("header.php"); ?>
    <div class="page-container row">

        <?php include("leftbar.php"); ?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
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
        <div class="content sm-gutter">
            <div class="page-title">
            </div>


            <!-- START MONTHLY DASHBOARD CHART FOR CY -->

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],
                        ['2014', 1000, 400],
                        ['2015', 1170, 460],
                        ['2016', 660, 1120],
                        ['2017', 1030, 540]
                    ]);

                    var options = {
                        chart: {
                            title: 'Montly report for current year',
                            subtitle: 'Sales and Expenses',
                        },
                        bars: 'vertical' // Required for Material Bar Charts.
                    };

                    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>

            <div id="barchart_material" style="width: 900px; height: 500px;"></div>

            <!-- END DASHBOARD CHART -->


            <!-- START MONTHLY DASHBOARD CHART FOR LY -->
            <div class="content sm-gutter">
                <?php

                $dataPoints1 = array(
                    array("label" => "January", "y" => 36.12),
                    array("label" => "February", "y" => 34.87),
                    array("label" => "March", "y" => 40.30),
                    array("label" => "April", "y" => 35.30),
                    array("label" => "May", "y" => 39.50),
                    array("label" => "June", "y" => 50.82),
                    array("label" => "July", "y" => 74.70),
                    array("label" => "August", "y" => 50.82),
                    array("label" => "September", "y" => 50.82),
                    array("label" => "October", "y" => 50.82),
                    array("label" => "November", "y" => 50.82),
                    array("label" => "December", "y" => 50.82)
                );
                $dataPoints2 = array(
                    array("label" => "January", "y" => 64.61),
                    array("label" => "February", "y" => 70.55),
                    array("label" => "March", "y" => 72.50),
                    array("label" => "April", "y" => 81.30),
                    array("label" => "May", "y" => 63.60),
                    array("label" => "June", "y" => 69.38),
                    array("label" => "July", "y" => 98.70),
                    array("label" => "August", "y" => 50.82),
                    array("label" => "September", "y" => 50.82),
                    array("label" => "Octomber", "y" => 50.82),
                    array("label" => "November", "y" => 50.82),
                    array("label" => "December", "y" => 50.82)
                );

                ?>
                <script>
                    window.onload = function() {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2",
                            title: {
                                text: "Montly report for last year"
                            },
                            axisY: {
                                includeZero: true
                            },
                            legend: {
                                cursor: "pointer",
                                verticalAlign: "center",
                                horizontalAlign: "right",
                                itemclick: toggleDataSeries
                            },
                            data: [{
                                type: "column",
                                name: "Incomes",
                                indexLabel: "{y}",
                                yValueFormatString: "$#0.##",
                                showInLegend: true,
                                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                            }, {
                                type: "column",
                                name: "Expenditures",
                                indexLabel: "{y}",
                                yValueFormatString: "$#0.##",
                                showInLegend: true,
                                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();

                        function toggleDataSeries(e) {
                            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                e.dataSeries.visible = false;
                            } else {
                                e.dataSeries.visible = true;
                            }
                            chart.render();
                        }

                    }
                </script>

                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


            </div>
            <!-- END DASHBOARD CHART -->



        </div>
    </div>
    <!-- BEGIN CHAT -->

    </div>
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <!-- END CORE JS FRAMEWORK -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
    <script src="assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
    <script src="assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
    <script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="assets/plugins/skycons/skycons.js"></script>
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>
    <script src="assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
    <script src="assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
    <script src="assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
    <script src="assets/js/core.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <script src="assets/js/demo.js" type="text/javascript"></script>
    <script src="assets/js/dashboard_v2.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/exporting.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".live-tile,.flip-list").liveTile();
        });
    </script>
</body>

</html>