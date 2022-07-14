<?php
    
    
    
    
    $type  = isset($_POST['type']) ? $_POST['type'] : "";
    if($type == "DATE"){
        $date  = isset($_POST['date']) ? date('d/m/Y',strtotime($_POST['date'])) : "";
    
        $timestamp = strtotime($date);
   
        // Create the new format from the timestamp
        $d = date("d-m-Y", $timestamp);
        echo $date;
    }else if($type == "MONTH"){
        $date  = isset($_POST['date']) ? date('m/Y',strtotime($_POST['date'])) : "";
    
        $timestamp = strtotime($date);
   
        // Create the new format from the timestamp
        $d = date("m-Y", $timestamp);
        echo $date;
    }else {
        $date  = isset($_POST['date']) ? $_POST['date'] : "";
    
        echo $date;
    }
    
    
    
   
    
    
  

?>
