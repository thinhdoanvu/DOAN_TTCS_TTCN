<?= 
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
//if (!isset($_SESSION['username'])) {
  //  $_SESSION['route'] = "setting.php";
	// header('Location: login.php');
//}else{
	if (isset($_POST["submit"])) {
	    if(!file_exists("control.txt")) {
            die("File not found");
        } else {
            $myfile = fopen("control.txt", "r") or die("Unable to open file!");
            $control = fread($myfile,filesize("control.txt"));
            fclose($myfile);
        }
        
        $myfilecotrol = fopen("control.ctrl", "w") or die("Unable to open file!");
        $date = date("Y-m-d");
        $house = date("H:i:s");
        $control = fwrite($myfilecotrol,"$date\t$house\tW");


        if(!file_exists("control.txt")) {
            die("File not found");
        } else {
            $myfilew = fopen("control.txt", "w") or die("Unable to open file!");
            $SetND1Min = $_POST["SetND1Min"]*10;
            $SetND1MAX = $_POST["SetND1Max"]*10;
            $SetND2Min = $_POST["SetND2Min"]*10;
            $SetND2MAX = $_POST["SetND2Max"]*10;
            $SetND3Min = $_POST["SetND3Min"]*10;
            $SetND3MAX = $_POST["SetND3Max"]*10;
            $SetDA1Min = $_POST["SetDA1Min"]*10;
            $SetDA1MAX = $_POST["SetDA1Max"]*10;
            $SetDA2Min = $_POST["SetDA2Min"]*10;
            $SetDA2MAX = $_POST["SetDA2Max"]*10;
            $SetDA3Min = $_POST["SetDA3Min"]*10;
            $SetDA3MAX = $_POST["SetDA3Max"]*10;
            $SetAS1Min = $_POST["SetAS1Min"]*10;
            $SetAS1MAX = $_POST["SetAS1Max"]*10;
            $SetAS2Min = $_POST["SetAS2Min"]*10;
            $SetAS2MAX = $_POST["SetAS2Max"]*10;
            $SetAS3Min = $_POST["SetAS3Min"]*10;
            $SetAS3MAX = $_POST["SetAS3Max"]*10;
            $timeon = $_POST["TimeOn"];
            $timeoff = $_POST["TimeOff"];
            
           if(!isset($_POST["TIME_PS1"])){
                $TIME_PS1 = "0";
           }else{
               $TIME_PS1 = "1";
           }
            
           if(!isset($_POST["TIME_PS2"])){
                $TIME_PS2 = "0";
           }else{
               $TIME_PS2 = "1";
           }
           if(!isset($_POST["TIME_PS3"])){
                $TIME_PS3 = "0";
           }else{
               $TIME_PS3 = "1";
           }

           if(!isset($_POST["TIME_AS1"])){
                $TIME_AS1 = "0";
           }else{
               $TIME_AS1 = "1";
           }

           if(!isset($_POST["TIME_AS2"])){
                $TIME_AS2 = "0";
           }else{
               $TIME_AS2 = "1";
           }

           if(!isset($_POST["TIME_AS3"])){
                $TIME_AS3 = "0";
           }else{
               $TIME_AS3 = "1";
           }

           if(!isset($_POST["TIME_BN1"])){
                $TIME_BN1 = "0";
           }else{
               $TIME_BN1 = "1";
           }

           if(!isset($_POST["TIME_BN2"])){
                $TIME_BN2 = "0";
           }else{
               $TIME_BN2 = "1";
           }

           if(!isset($_POST["TIME_BN3"])){
                $TIME_BN3 = "0";
           }else{
               $TIME_BN3 = "1";
           }
        
            $control = fwrite($myfilew,"{
 \"DA_A1_MIN\":\"$SetDA1Min\",
 \"DA_A1_MAX\":\"$SetDA1MAX\",
 \"DA_A2_MIN\":\"$SetDA2Min\",
 \"DA_A2_MAX\":\"$SetDA2MAX\",
 \"DA_A3_MIN\":\"$SetDA3Min\",
 \"DA_A3_MAX\":\"$SetDA3MAX\",
 \"ND_A1_MIN\":\"$SetND1Min\",
 \"ND_A1_MAX\":\"$SetND1MAX\",
 \"ND_A2_MIN\":\"$SetND2Min\",
 \"ND_A2_MAX\":\"$SetND2MAX\",
 \"ND_A3_MIN\":\"$SetND3Min\",
 \"ND_A3_MAX\":\"$SetND3MAX\",
 \"AS_A1_MIN\":\"$SetAS1Min\",
 \"AS_A1_MAX\":\"$SetAS1MAX\",
 \"AS_A2_MIN\":\"$SetAS2Min\",
 \"AS_A2_MAX\":\"$SetAS2MAX\",
 \"AS_A3_MIN\":\"$SetAS3Min\",
 \"AS_A3_MAX\":\"$SetAS3MAX\",
 \"TIME_OFF\":\"$timeoff\",
 \"TIME_ON\":\"$timeon\",
 \"TIME_BN1\": \"$TIME_BN1\",
 \"TIME_BN2\": \"$TIME_BN2\",
 \"TIME_BN3\": \"$TIME_BN3\",
 \"TIME_PS1\": \"$TIME_PS1\",
 \"TIME_PS2\": \"$TIME_PS2\",
 \"TIME_PS3\": \"$TIME_PS3\",
 \"TIME_AS1\": \"$TIME_AS1\",
 \"TIME_AS2\": \"$TIME_AS2\",
 \"TIME_AS3\": \"$TIME_AS3\"
}
");
            fclose($myfilew);


 

            header("Location: setting.php");
        die();
        }
	}else{
        echo "Aaa";
    }
//}
?>
