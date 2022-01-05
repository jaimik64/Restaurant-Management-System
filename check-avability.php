<?php
     session_start();
     date_default_timezone_set('Asia/Kolakata');
     require 'db.php';

     if ($data = json_decode(file_get_contents("php://input")))
     {
         $res = '';
        $id = $data[0];
        $date = $data[1];
        $time = $data[2];
        $slot = $data[3];
        $today = date('Y-m-d');
      
      if($date >= $today){
          if($time == '08:00' || $time == '09:00' || $time == '10:00' || $time == '11:00' || $time == '12:00' || $time == '13:00' ||$time == '14:00'  || $time == '15:00'||$time == '16:00'||$time == '17:00'||$time == '18:00'||$time == '19:00'||$time == '20:00'||$time == '21:00'||$time == '22:00'||$time == '23:00')
          {  
            if($id != '' && $date != '' && $time != '' && $slot != '')
            {
                
                $_SESSION['id'] = $id;
                $no = $_SESSION['menu'];
                $person = $_SESSION['no'];
                $_SESSION['date'] = $date;
                $_SESSION['time'] = $time;
                $_SESSION['slot'] = $slot;
                $_SESSION['menu'] = $_SESSION['menu'];
                $_SESSION['no'] = $_SESSION['no'];
                //Retrieve records from banquet_booking_user date and status =1 (booked slot)
            
                $t = strtotime($time);
                //$t1 = date('H:i:s',strtotime($time));
                
                $endtime = strtotime($time) + ($slot * 60 * 60);
                //$end_time = date('H:i:s',$endtime);
            
            
                    $booked = array();
                    
                $q = mysqli_query($con,"select * from banquet_booking_user where date = '$date' AND status = 1");
                
                if(mysqli_num_rows($q) > 0)
                {
                    
                      while($r = mysqli_fetch_array($q))
                      {
                        $db_start = strtotime($r['time']);
                        $db_end = strtotime($r['end_time']);
                        
                        if($db_start == $t || $db_start == $endtime || $db_end == $endtime || $db_end == $t){
                             //echo $db_start."<br/>".$t;
                            $res = 'Select Another Slot';
                            break;
                        }
                        else if($db_start > $t ){
                            
                        //echo $db_start."<br/>".$t;
                            //echo "<br/>".$r['Bbid']."<br/>db Start ".$db_start."<br/>db end".$db_end."<br/>User S".$t."<br/>User E".$endtime."<br/>";
                            if($db_start > $t && $db_end < $endtime ){
                                $res = 'Select Another Slot';
                                break;
                            }
                            else if($db_start >= $t && $db_start >= $endtime || $db_end >= $t && $db_end >= $endtime)
                                $res = 'Yes, Slot is available';
                            else{
                                $res = 'Select Another Slot';
                                break;
                            }
                        }
                        else if($db_start < $t ) {
                            
                            // echo $db_start."<br/>".$t;
                            //echo "<br/>".$r['Bbid']."db Start ".$db_start."<br/>db end".$db_end."<br/>User S".$t."<br/>User E".$endtime."<br/>";
                            if($db_start < $t && $db_end > $endtime ){
                                $res = 'Select Another Slot';
                                break;
                            }
                            else if($db_start <= $t || $db_start <= $endtime && $db_end <= $t || $db_end <= $endtime){
                                $res = 'Yes, Slot is available';
                            }
                            else{
                                $res = 'Select Another Slot';
                                break;
                            }
                        }
                        else{
                            $res = 'Yes, Slot is available';
                        }
                     }
                    
                    /*$cmd = mysqli_query($con,"select * from banquet_booking_user where date ='$date' AND status = 1 AND time = '$time' AND end_time = '$end_time'");
                                
                    if($cmd)
                    {
                        if(mysqli_num_rows($cmd) > 0){
                            $res = 'Select Another Slot';
                        }
                        else
                        {
                            $cmd1 = mysqli_query($con,"select * from banquet_booking_user where date ='$date' AND status = 1 AND time > '$time' AND end_time > '$time' AND time < '$end_time' AND end_time < '$end_time'");
                                        
                            if($cmd1)
                            {
                                if(mysqli_num_rows($cmd1) > 0){
                                    $res = 'Select Another Slot';
                                }
                                else
                                {
                                    
                                        $cmd2 = mysqli_query($con,"select * from banquet_booking_user where date ='$date' AND status = 1 AND ( (time >= '$time' AND time <= '$time') OR (end_time >= '$end_time' AND end_time <= '$end_time'))");
                                                    
                                        if($cmd2)
                                        {
                                            if(mysqli_num_rows($cmd2) > 0){
                                                $res = 'Select Another Slot';
                                            }
                                            else
                                            {
                                                $res = 'Yes, Slot is available';
                                            }
                                        }
                                    }
                                }
                            }
                    }*/
                
                }
                else{
                    $res = 'Yes, Slot is available';
                }
            }
            else{
                $res = 'Select Date, Time & Slot';
            }
            
          }
          else{
              $res = 'Select Time Between 08:00 AM to 11:00 PM <p><b>Check : </b>select time without any minute after hours.(12:00,09:00) </p> ';
          }
      }
      else{
          echo 'Select Future Date';
      }
          echo $res;
    }
?>