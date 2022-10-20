<?php

    session_start();

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $printer = $_POST['printer'];
        $location = $_POST['location'];
        $address = $_POST['address'];

        $sToken = "CD1JURYAVKD6VZlztQVEbEPyzuDZvudr9MCqljNOATR";
	    $sMessage = "รายละเอียดการขอเบิกเครื่องพิมพ์\n";
	    $sMessage .= "เครื่องพิมพ์ : " . $name . " \n";
	    $sMessage .= "เครื่องพิมพ์ : " . $printer . " \n";
	    $sMessage .= "สถานที่ใช้งาน: " . $location . " \n";
	    $sMessage .= "รายละเอียด ชื่อและที่อยู่ผู้รับ : " . $address . " \n";

	
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        if ($result) {
            $_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line Notify เรียบร้อยแล้ว";
            header("location: index.php");
        } else {
            $_SESSION['error'] = "ส่งข้อมูลผิดพลาด!";
            header("location: index.php");
        }

        // //Result error 
        // if(curl_error($chOne)) 
        // { 
        //     echo 'error:' . curl_error($chOne); 
        // } 
        // else { 
        //     $result_ = json_decode($result, true); 
        //     echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        // } 
        // curl_close( $chOne );   

    }

?>