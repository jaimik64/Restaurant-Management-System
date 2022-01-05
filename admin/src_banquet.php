<html>
    <body>
        <form method="post" action = "#">
        <input type="date" name = "date" />
        <input type="time" name = "time" />
        <input type="number" name = "slot" />
        <input type="submit" name = "submit" value = "Search" />
        </form> 
    </body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        require 'db.php';

        $date = $_POST['date'];
        $time = $_POST['time'];
        $slot = $_POST['slot'];
 
        $query1 = "select * from banquet_booking_user where date = '".$date."' and status = 1 "; //Retrieve records from banquet_booking_user date and status =1 (booked slot)
        $exec1 = mysqli_query($con,$query1);

        if(mysqli_num_rows($exec1) > 0 )
        {
                echo '1';
            while($r = mysqli_fetch_array($exec1))
            {
                    $slot = $r['no_of_slots']; // no_of_slots of 

                    $query2 ="select id from slot where time = '".$r['time']."'";
                    $exec2 = mysqli_query($con,$query2);
            
                    while($r1 = mysqli_fetch_array($exec2))
                    {

                        $id = $r1['id'];
                        $eid = $r1['id'] + ($slot - 1);

                        $query = "select * from slot where id not between  '".$id."' and  '".$eid."'";
                        $exec2 = mysqli_query($con,$query);
                        
                        echo '<html><body><table>';
                        echo '<tr>
                                <th> Available Slots </th>
                            </tr>';
                        echo '<tr>
                                <th>time </th>
                            </tr>';
                        
                        while($r2 = mysqli_fetch_array($exec2))
                        {
                            echo "<tr> 
                                    <td>".$r2['time']."</td>
                                </tr>";
                        }
                        echo "</table></body></html>";

                    }
            }
        }
        else
        {
            echo mysqli_error($con);

            $exec4 = mysqli_query($con,'select * from slot');

            echo '<html><body><table>';
            echo '<tr>
                    <th> Available Slots </th>
                </tr>';
            echo '<tr>
                    <th>time </th>
                </tr>';

            while($r = mysqli_fetch_array($exec4))
            {
                    echo "<tr>
                            <td>".$r['time']."</td>
                        </tr>";
            }
            echo "</table></body></html>";
        }
    }
?>