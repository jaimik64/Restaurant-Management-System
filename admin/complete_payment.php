<?php   
    require 'db.php';


        $exec1 = mysqli_query($con,"select * from banquet_booking_user where status = 1 and remaining_payment > 0");

        echo "<html><body><table border='1'>";
        echo "<tr>
                <th>Name </th>
                <th>Email </th>
                <th>Phone </th>
                <th>Address</th>
                <th>Reason </th>
                <th>Time </th>
                <th>Date </th>
                <th>Extra Service</th>
                <th>Total Bill</th>
                <th>Remaining Payment </th>
                <th>Complete Payment </th>
            </tr>";
        while($r = mysqli_fetch_array($exec1))
        {
            echo "<tr>
                <td>".$r['name']."</td>
                <td>".$r['email']."</td>
                <td>".$r['phone']."</td>
                <td>".$r['address']."</td>
                <td>".$r['reason_to_book']."</td>
                <td>".$r['time']."</td>
                <td>".$r['date']."</td>
                <td>".$r['extra_services']."</td>
                <td>".$r['total_bill']."</td>
                <td>".$r['remaining_payment']."</td>    
                <td><a href='complete_pay.php?Bbid=".$r['Bbid']."' >Pay</a></td>
            </tr>";
        }
?>
