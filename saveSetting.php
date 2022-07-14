<?php
    $data  = isset($_POST['data']) ? $_POST['data'] : "";

	    if(!file_exists("control.txt")) {
            die("File not found");
        } else {
            $myfile = fopen("control.txt", "r") or die("Unable to open file!");
            $control = fread($myfile,filesize("control.txt"));
            fclose($myfile);
        }
        
        if(!file_exists("control.txt")) {
            die("File not found");
        } else {
            $myfilew = fopen("control.txt", "w") or die("Unable to open file!");
            
            $control = fwrite($myfilew,"{
 \"DA_A1_MIN\":\"$data[DA_A1_MIN]\",
 \"DA_A1_MAX\":\"$data[DA_A1_MAX]\",
 \"DA_A2_MIN\":\"$data[DA_A2_MIN]\",
 \"DA_A2_MAX\":\"$data[DA_A2_MAX]\",
 \"DA_A3_MIN\":\"$data[DA_A3_MIN]\",
 \"DA_A3_MAX\":\"$data[DA_A3_MAX]\",
 \"ND_A1_MIN\":\"$data[ND_A1_MIN]:\",
 \"ND_A2_MIN\":\"$data[ND_A2_MIN]\",
 \"ND_A2_MAX\":\"$data[ND_A2_MAX]\",
 \"ND_A3_MIN\":\"$data[ND_A3_MIN]\",
 \"ND_A3_MAX\":\"$data[ND_A3_MAX]\",
 \"AS_A1_MIN\":\"$data[AS_A1_MIN]\",
 \"AS_A1_MAX\":\"$data[AS_A1_MAX]\",
 \"AS_A2_MIN\":\"$data[AS_A2_MIN]\",
 \"AS_A2_MAX\":\"$data[AS_A2_MAX]\",
 \"AS_A3_MIN\":\"$data[AS_A3_MIN]\",
 \"AS_A3_MAX\":\"$data[AS_A3_MAX]\",
 \"TIME_OFF\":\"$data[TIME_OFF]\",
 \"TIME_ON\":\"$data[TIME_ON]\",
 \"TIME_BN1\": \"$data[TIME_BN1]\",
 \"TIME_BN2\": \"$data[TIME_BN2]\",
 \"TIME_BN3\": \"$data[TIME_BN3]\",
 \"TIME_PS1\": \"$data[TIME_PS1]\",
 \"TIME_PS2\": \"$data[TIME_PS2]\",
 \"TIME_PS3\": \"$data[TIME_PS3]\",
 \"TIME_AS1\": \"$data[TIME_AS1]\",
 \"TIME_AS2\": \"$data[TIME_AS2]\",
 \"TIME_AS3\": \"$data[TIME_AS3]\",
                }");
            fclose($myfilew);
            header("Location: setting.php");

        }

?>
