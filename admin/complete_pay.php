<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');

    $id = $_GET['Bbid'];

    $exec = mysqli_query($con,"select * from banquet_booking_user where status = 1 and Bbid = '".$id."' ");
    $r = mysqli_fetch_array($exec);


?>
<html>
    <body>
        <form method="post" action="#">
            <input type="text" name = "amount" placeholder = "Amount" value = "<?php echo $r['remaining_payment']; ?>"/>
            <input type="submit" name ="submit" value="Submit" />
        </form>
    </body>
</html>
<?php   
    if(isset($_POST['submit'])){
        
        $exec = mysqli_query($con,"select * from banquet_booking_user where status = 1 and Bbid = '".$id."' ");
        $r = mysqli_fetch_array($exec);

        
        $amount = $_POST['amount'];
        $today = date('Y-m-d');
        $remain = $r['remaining_payment'];
        $total = $r['total_bill'];
        
        
        $exec1 = mysqli_query($con,"insert into banquet_installment(Booking_id,type,payment_amount,payment_date) values ('$id','',$amount,'$today')");
        if($exec1)
        {   
            $t = $remain - $amount;
            
           if($t == 0){
                $exec3 = mysqli_query($con,"update banquet_booking_user set status = 2 where Bbid = '".$id."'");
                if(!($exec3))
                    echo mysqli_error($con);
           }
           else if($t != 0){
            $exec2 = mysqli_query($con,"update banquet_booking_user set remaining_payment = $t where Bbid = '".$id."'" );
            if($exec2)
                echo "Payment Complete";
            else    
                echo mysqli_error($con);
           }
        }   
        else    
            echo mysqli_error($con);
    }
?>