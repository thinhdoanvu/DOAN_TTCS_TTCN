<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
   $_SESSION['route'] = "setting.php";
	header('Location: login.php');
}else{

}
?>
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
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="setting.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./layout/sidebar.css">
</head>

<body id="body-pd" style="padding-left: 65px;">
    <!-- partial:../../partials/_sidebar.html -->
    <?php
                include('./layout/sidebar.php');
            ?>

    <!-- partial -->
    <div class=" main-panel mt-5 w-100">
        <div class="content-wrapper " style="padding-left:170px">
            <div class="mb-5">
                <center>
                    <h1 class="page-title mt-5" style="font-size:30px;"> BIỂU ĐỒ HIỂN THỊ THÔNG SỐ CẢM BIẾN</h1>
                </center>

            </div>
            <form action="edit.php" method="POST" class="login-container">
                <div class="row">

                    <div class="col-lg-6 grid-margin stretch-card">

                        <table class="table_setting">
                            <tr>
                                <td>
                                </td>
                                <th class="center">
                                    <center>
                                        <h5>Ngưỡng thấp</h5>
                                    </center>
                                </th>
                                <th class="">
                                    <center>
                                        <h5>Ngưỡng cao</h5>
                                    </center>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Nhiệt độ 1</h5>
                                </th>
                                <td class="center">
                                    <center>
                                        <input type="text" min="0" max="100" step="0.01" name="SetND1Min"
                                            id="SetND1Min" />
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetND1Max"
                                            id="SetND1Max">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Nhiệt độ 2</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetND2Min"
                                            id="SetND2Min" />
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetND2Max"
                                            id="SetND2Max" />
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Nhiệt độ 3</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetND3Min"
                                            id="SetND3Min">
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetND3Max"
                                            id="SetND3Max">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Ánh sáng 1</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetAS1Min"
                                            id="SetAS1Min">
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetAS1Max"
                                            id="SetAS1Max">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Ánh sáng 2</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetAS2Min"
                                            id="SetAS2Min">
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetAS2Max"
                                            id="SetAS2Max" />
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Ánh sáng 3</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetAS3Min"
                                            id="SetAS3Min" />
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetAS3Max"
                                            id="SetAS3Max" />
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Độ ẩm 1</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetDA1Min"
                                            id="SetDA1Min" />
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetDA1Max"
                                            id="SetDA1Max" />
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Độ ẩm 2</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetDA2Min"
                                            id="SetDA2Min" />
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetDA2Max"
                                            id="SetDA2Max" />
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Độ ẩm 3</h5>
                                </th>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetDA3Min"
                                            id="SetDA3Min">
                                    </center>
                                </td>
                                <td class="">
                                    <center><input type="text" min="0" max="100" step="0.01" value="2" name="SetDA3Max"
                                            id="SetDA3Max">
                                    </center>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-lg-6 grid-margin ">
                        <div>

                        </div>
                        <div style="width:100%">
                            <table>
                                <tr>
                                    <th class="primary">
                                        <center>
                                            <h5>Bơm Nước 1</h5>
                                        </center>
                                    </th>
                                    <th class="primary">
                                        <center>
                                            <h5>Bơm Nước 2</h5>
                                        </center>
                                    </th>
                                    <th class="primary">
                                        <center>
                                            <h5>Bơm Nước 3</h5>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_BN1"
                                                    style="width: 20px; height: 20px" name="TIME_BN1" checked>
                                                <label class="custom-control-label" for="TIME_BN1"></label>
                                            </center>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_BN2"
                                                    style="width: 20px; height: 20px" name="TIME_BN2" checked>
                                                <label class="custom-control-label" for="TIME_BN2"></label>
                                            </center>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_BN3"
                                                    style="width: 20px; height: 20px" name="TIME_BN3" checked>
                                                <label class="custom-control-label" for="TIME_BN3"></label>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="width:100%" class="mt-3">
                            <table>
                                <tr>
                                    <th class="red">
                                        <center>
                                            <h5>Phun sương 1</h5>
                                        </center>
                                    </th>
                                    <th class="red">
                                        <center>
                                            <h5>Phun sương 2</h5>
                                        </center>
                                    </th>
                                    <th class="red">
                                        <center>
                                            <h5>Phun sương 3</h5>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_PS1"
                                                    style="width: 20px; height: 20px" name="TIME_PS1" checked>
                                                <label class="custom-control-label" for="TIME_PS1"></label>
                                            </center>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_PS2"
                                                    style="width: 20px; height: 20px" name="TIME_PS2" checked>
                                                <label class="custom-control-label" for="TIME_PS2"></label>
                                            </center>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_PS3"
                                                    style="width: 20px; height: 20px" name="TIME_PS3">
                                                <label class="custom-control-label" for="TIME_PS3"></label>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>


                        <div style="width:100%" class="mt-3">
                            <table>
                                <tr>
                                    <th class="green">
                                        <center>
                                            <h5>Bóng đèn 1</h5>
                                        </center>
                                    </th>
                                    <th class="green">
                                        <center>
                                            <h5>Bóng đèn 2</h5>
                                        </center>
                                    </th>
                                    <th class="green">
                                        <center>
                                            <h5>Bóng đèn 3</h5>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_AS1"
                                                    style="width: 20px; height: 20px" name="TIME_AS1" checked>
                                                <label class="custom-control-label" for="TIME_AS1"></label>
                                            </center>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_AS2"
                                                    style="width: 20px; height: 20px" name="TIME_AS2" checked>
                                                <label class="custom-control-label" for="TIME_AS2"></label>
                                            </center>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <center><input type="checkbox" class="custom-control-input" id="TIME_AS3"
                                                    style="width: 20px; height: 20px" name="TIME_AS3" checked>
                                                <label class="custom-control-label" for="TIME_AS3"></label>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="mt-4 row" style="width: 100%;">
                            <div class="col-6" style="width: 100%;">
                                <center>
                                    <h4>Thời gian bắt đầu</h4>
                                </center>
                                <div class="input-group" style="justify-content: center;">
                                    <input type="button" value="-" class="button-minus" id="button-minus-min"
                                        data-field="quantity">
                                    <input type="number" step="1" max="24" value="1" name="TimeOn"
                                        class="quantity-field" id="TimeOn">
                                    <input type="button" value="+" class="button-plus" id="button-plus-min"
                                        data-field="quantity">
                                </div>
                            </div>
                            <div class="col-6" style="width: 100%;">
                                <center>
                                    <h4>Thời gian kết thúc</h4>
                                </center>
                                <div class="input-group" style="justify-content: center;">
                                    <input type="button" value="-" class="button-minus" id="button-minus-max"
                                        data-field="quantity">
                                    <input type="number" step="1" max="24" value="1" name="TimeOff"
                                        class="quantity-field" id="TimeOff">
                                    <input type="button" value="+" class="button-plus" id="button-plus-max"
                                        data-field="quantity">
                                </div>
                            </div>
                        </div>


                        <div class="mt-6" style="width: 100%;">
                            <center><button type="submit" name="submit" class="btn btn-success btn-lg" id="submit">Gửi
                                    dữ
                                    liệu</button>

                            </center>
                        </div>
                    </div>
            </form>
        </div>
        <?php
                include('./layout/footer.php');
            ?>
    </div>
    <!-- end partial -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->

    <!-- main-panel ends -->

    <!-- page-body-wrapper ends -->
    <?php
        $myfile = fopen("control.txt", "r") or die("Unable to open file!");
        $control = fread($myfile,filesize("control.txt"));
 
        fclose($myfile);
        $myfile1 = fopen("data.txt", "r") or die("Unable to open file!");
        $data = fread($myfile1,filesize("data.txt"));
        
        fclose($myfile1);
    ?>

    </div>
    <script>
 
        var control = <?= $control ?>

        console.log(control)

        document.getElementById("SetND1Min").value = (parseFloat(control.ND_A1_MIN / 10)
            .toString())

        document.getElementById("SetND1Max").value = (parseFloat(control.ND_A1_MAX / 10).toString())

        document.getElementById("SetND2Min").value = (parseFloat(control.ND_A2_MIN / 10).toString())

        document.getElementById("SetND2Max").value = (parseFloat(control.ND_A2_MAX / 10).toString())

        document.getElementById("SetND3Min").value = (parseFloat(control.ND_A3_MIN / 10).toString())

        document.getElementById("SetND3Max").value = (parseFloat(control.ND_A3_MAX / 10).toString())

        document.getElementById("SetDA1Min").value = (parseFloat(control.DA_A1_MIN / 10).toString())

        document.getElementById("SetDA1Max").value = (parseFloat(control.DA_A1_MAX / 10).toString())

        document.getElementById("SetDA2Min").value = (parseFloat(control.DA_A2_MIN / 10).toString())

        document.getElementById("SetDA2Max").value = (parseFloat(control.DA_A2_MAX / 10).toString())

        document.getElementById("SetDA3Min").value = (parseFloat(control.DA_A3_MIN / 10).toString())

        document.getElementById("SetDA3Max").value = (parseFloat(control.DA_A3_MAX / 10).toString())

        document.getElementById("SetAS1Min").value = (parseFloat(control.AS_A1_MIN / 10).toString())

        document.getElementById("SetAS1Max").value = (parseFloat(control.AS_A1_MAX / 10).toString())

        document.getElementById("SetAS2Min").value = (parseFloat(control.AS_A2_MAX / 10).toString())

        document.getElementById("SetAS2Max").value = (parseFloat(control.AS_A2_MIN / 10).toString())

        document.getElementById("SetAS3Min").value = (parseFloat(control.AS_A3_MIN / 10).toString())

        document.getElementById("SetAS3Max").value = (parseFloat(control.AS_A3_MIN / 10).toString())


        if (control.TIME_BN1 == 1) {
            $("#TIME_BN1").prop('checked', true);
        } else {
            $("#TIME_BN1").prop('checked', false);
        }

        if (control.TIME_BN2 == 1) {
            $("#TIME_BN2").prop('checked', true);
        } else {
            $("#TIME_BN2").prop('checked', false);
        }

        if (control.TIME_BN3 == 1) {
            $("#TIME_BN3").prop('checked', true);
        } else {
            $("#TIME_BN3").prop('checked', false);
        }


        if (control.TIME_PS1 == 1) {
            $("#TIME_PS1").prop('checked', true);
        } else {
            $("#TIME_PS1").prop('checked', false);
        }

        if (control.TIME_PS2 == 1) {
            $("#TIME_PS2").prop('checked', true);
        } else {
            $("#TIME_PS2").prop('checked', false);
        }

        if (control.TIME_PS3 == 1) {
            $("#TIME_PS3").prop('checked', true);
        } else {
            $("#TIME_PS3").prop('checked', false);
        }


        if (control.TIME_AS1 == 1) {
            $("#TIME_AS1").prop('checked', true);
        } else {
            $("#TIME_AS1").prop('checked', false);
        }

        if (control.TIME_AS2 == 1) {
            $("#TIME_AS2").prop('checked', true);
        } else {
            $("#TIME_AS2").prop('checked', false);
        }

        if (control.TIME_AS3 == 1) {
            $("#TIME_AS3").prop('checked', true);
        } else {
            $("#TIME_AS3").prop('checked', false);
        }

        document.getElementById("TimeOn").value = control.TIME_ON 
        document.getElementById("TimeOff").value = control.TIME_OFF

        var timeon = $("#TimeOn").val();
        var timeoff = $("#TimeOff").val();





        function incrementValueMin(e) {

            e.preventDefault();

            var currentVal = parseInt(
                $("#TimeOn").val(),
                10
            );


            if (!isNaN(currentVal) && currentVal < timeoff) {
                $("#TimeOn").val(currentVal + 1);
                console.log("+1")
            } else {
                $("#TimeOn").val(0);
            }
        }

        function decrementValueMin(e) {
            e.preventDefault();

            var currentVal = parseInt(
                $("#TimeOn").val(),
                10
            );

            if (!isNaN(currentVal) && currentVal > 0 || currentVal > timeoff) {
                $("#TimeOn").val(currentVal - 1);
                console.log("-1")
            } else {
                $("#TimeOn").val(timeoff);
            }
        }

        function incrementValueMax(e) {
            e.preventDefault();

            var currentVal = parseInt(
                $("#TimeOff").val(),
                10
            );

            if (!isNaN(currentVal) && currentVal < 23) {
                $("#TimeOff").val(currentVal + 1);

            } else {
                $("#TimeOff").val(timeon);
            }
        }

        function decrementValueMax(e) {
            e.preventDefault();

            var currentVal = parseInt(
                $("#TimeOff").val(),
                10
            );

            if (!isNaN(currentVal) && currentVal > timeon) {
                $("#TimeOff").val(currentVal - 1);
                console.log("-1")
            } else {
                $("#TimeOff").val(23);
                console.log(23)
            }



        }



        $("#button-plus-min").on("click", function(e) {
            incrementValueMin(e);
            timeon = $("#TimeOn").val();
            timeoff = $("#TimeOff").val();

        });

        $("#button-minus-min").on("click", function(e) {
            decrementValueMin(e);
            timeon = $("#TimeOn").val();
            timeoff = $("#TimeOff").val();

        });

        $("#button-plus-max").on("click", function(e) {
            incrementValueMax(e);
            timeon = $("#TimeOn").val();
            timeoff = $("#TimeOff").val();

        });

        $("#button-minus-max").on("click", function(e) {
            decrementValueMax(e);
            timeon = $("#TimeOn").val();
            timeoff = $("#TimeOff").val();

        });

        function readTextFile(file) {
            return new Promise(resole => {
                var rawFile = new XMLHttpRequest();
                rawFile.open("GET", file, false);
                rawFile.onreadystatechange = function() {
                    if (rawFile.readyState === 4) {
                        if (rawFile.status === 200 || rawFile.status == 0) {
                            var allText = rawFile.responseText;
                            resole(allText)
                        }
                    }
                }
                rawFile.send(null);
            })

        }

        var f = readTextFile("control.txt").then(item => console.log(JSON.parse(item)));


        (function() {
            var textFile = "control.txt";

            function makeTextFile(text) {
                var data = new Blob([text], {
                    type: 'text/plain'
                });

                // If we are replacing a previously generated file we need to
                // manually revoke the object URL to avoid memory leaks.
                if (textFile !== null) {
                    window.URL.revokeObjectURL(textFile);
                }

                textFile = window.URL.createObjectURL(data);

                return textFile;
            }


            var create = document.getElementById('submit');

            //create a click event listener
            create.addEventListener('click', function() {


            }, false);
        })();


        
   
    

    </script>
    <script src="setting.js"></script>
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

    <!-- "DA_A1_MIN":"110",
    "DA_A1_MAX":"150",
    "DA_A2_MIN":"127",
    "DA_A2_MAX":"150",
    "DA_A3_MIN":"105",
    "DA_A3_MAX":"180",
    "ND_A1_MIN":"300",
    "ND_A1_MAX":"400",
    "ND_A2_MIN":"280",
    "ND_A2_MAX":"285",
    "ND_A3_MIN":"280",
    "ND_A3_MAX":"300",
    "AS_A1_MIN":"300",
    "AS_A1_MAX":"800",
    "AS_A2_MIN":"450",
    "AS_A2_MAX":"500",
    "AS_A3_MIN":"278",
    "AS_A3_MAX":"278",
    "TIME_ON":"4",
    "TIME_OFF":"17",
    "TIME_AS1": "0",
    "TIME_AS2": "0",
    "TIME_AS3": "1",
    "TIME_PS1": "0",
    "TIME_PS2": "0",
    "TIME_PS3": "1",
    "TIME_BN1": "0",
    "TIME_BN2": "0",
    "TIME_BN3": "1" -->


</body>

</html>
