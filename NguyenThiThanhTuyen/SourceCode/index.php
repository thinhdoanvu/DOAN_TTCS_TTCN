<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./layout/sidebar.css">
</head>

<body id="body-pd" style="padding-left: 65px;">

    <?php
                     include('./layout/sidebar.php');
                ?>
    <div class="height-100 bg-light">
        <div class="main-panel mt-4 d-flex justify-content-center m-0 w-100">
            <div class="content-wrapper" style="padding-left: 100px;">
                <div class="">
                    <center>
                        <h3 class="page-title mt-5 mb-4" style="font-size:30px;"> BIỂU ĐỒ HIỂN THỊ THÔNG SỐ CẢM BIẾN
                        </h3>
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Độ ẩm 1</h4>
                                <canvas id="areaChartDA1" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Độ ẩm 2</h4>
                                <canvas id="areaChartDA2" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Độ ẩm 3</h4>
                                <canvas id="areaChartDA3" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nhiệt độ 1</h4>
                                <canvas id="areaChartND1" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nhiệt độ 2</h4>
                                <canvas id="areaChartND2" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nhiệt độ 3</h4>
                                <canvas id="areaChartND3" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ánh sáng 1</h4>
                                <canvas id="areaChartAS1" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ánh sáng 2</h4>
                                <canvas id="areaChartAS2" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ánh sáng 3</h4>
                                <canvas id="areaChartAS3" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                     include('./layout/footer.php');
                ?>
            </div>

        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

        <!-- partial -->

        <!-- main-panel ends -->

        <?php
        $myfile = fopen("data.txt", "r") or die("Unable to open file!");
        $control = fread($myfile,filesize("data.txt"));
        fclose($myfile);
    ?>



        <script>
        var control = <?= "$control" ?>]
        </script>
        <script src="index.js"></script>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/chart.js"></script>
        <!-- End custom js for this page -->
</body>

</html>
