<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    require 'db.php';

    $name = $_POST['user'];
    $mail = $_POST['email'];
    $mob = $_POST['mobile'];
    $address = $_POST['address'];
    $plan = $_POST['plan'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $slot = $_POST['slot'];
    $extra = $_POST['extra'];
    $reason = $_POST['reason'];
    

    $t = strtotime($time);
    $time = date('H:i:s',$t);

    $endtime = strtotime($time) + ($slot*60*60);
    $end_time =  date('H:i:s',$endtime);

    $exec7 = mysqli_query($con,"select * from slot where time = '".$time."'");
    $r = mysqli_fetch_array($exec7);
    //echo $r['id'];

    $enter_slot = $r['id'];
    $end_slot = $r['id'] + ($slot - 1);

    $query = "select * from banquet_plans where plan_name='".$plan."'"; //retrieve banquet_plans details
    $exec = mysqli_query($con,$query);
    $r = mysqli_fetch_array($exec);
    $price = $r['price']; // price details 
    $mbid = $r['mbid']; // mbid 

    $total = $price * $slot;

    
    $query2 = "insert into banquet_booking_user(name,email,phone,address,reason_to_book,time,date,extra_services,total_bill,remaining_payment,status,no_of_slots,mbid,sid,end_time)
                values('$name','$mail','$mob','$address','$reason','$time','$date','$extra','$total',0,0,'$slot','$mbid',$sid,'$end_time')";
    $exec2 = mysqli_query($con,$query2);

    
    
?>
