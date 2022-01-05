<?php
    require 'db.php';
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    
    $today = date('Y-m-d');
    if(isset($_GET['Bbid'])){}
    else{
        header("location:view_banquet_book.php");
    }
    $id = $_GET['Bbid'];
    $_SESSION['bbid'] = $id;
    
    $exec = mysqli_query($con,"select * from banquet_booking_user where Bbid = $id");
    $r = mysqli_fetch_array($exec);
    $rp = $r['remaining_payment']; 
    if(isset($_SESSION['l'])){
        header("location:view_banquet_book.php");
    }
?>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <title>Banquet Payment</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
			@import url('https://fonts.googleapis.com/css?family=Titillium+Web');
			.nav{
				background-color: blue;
				color: white;
				font-size: 24px;
				width: 100%;
			}
			.nav a{
				color: white;
				font-size: 24px;
				text-decoration: none;
				padding : 10px;
			}
        	*{
            	font-family: 'Titillium Web', sans-serif;
        	}
			h1{
				text-align: center;
			}
			a{
				text-decoration: none;
			}
            .form-group{
                margin-left: 20%;
                margin-right: 20%; 
            }
            h2{
                text-align: center;
                padding-top: 3%;
            }
        </style>
    </head>
    <body>
         <nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link active" href="view_banquet_book.php">Back</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_completed_order.php">Completed Order</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_cancelled_order.php">Cancelled Order</a>
</nav>
        <p></p>
        
        <form method="post" action="complete_banquet_pay_data.php">
            <div class="form-group">
                <label>Amount </label>
                <input type = "text" name = "amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount Here"/>
            </div>
            <button type="submit" name="pay" value="Pay"style="margin-left:45%;"  class="btn btn-primary"> Pay </button>
        </form>

    <div class="class-responsive">
        <h2> Payment History </h2>
        <table class="table">
                <tr> 
                    <th colspan="2"> Remaining Amount </th>
                    <td>Rs. <?php echo number_format($rp); ?></td> 
                </tr>
                <tr>
                    <th> No </th>
                    <th> Payment Amount </th>
                    <th> Date </th>
                </tr>
                <?php 
                    $i =1;
                        $exe4  = mysqli_query($con,"select * from banquet_installment where Booking_id = $id");
                        while($r = mysqli_fetch_array($exe4))
                        {

                ?>
                <tr>
                        <td><?php echo $i++; ?></td>
                        <td>Rs. <?php echo number_format($r['payment_amount']); ?></td>
                        <td><?php echo date('d / m / Y',strtotime($r['payment_date'])); ?></td>
                </tr>
                <?php 
                        }
                ?>
        </table> 
</div>

</body>
</html>
<?php
    function email1($id){
            require 'db.php';
          	$exec = mysqli_query($con,"select * from banquet_booking_user where Bbid = $id");
$message = '';
$end_message = ''; 
while($r= mysqli_fetch_array($exec))
{   
        $name = $r['name'];
        $plan = $r['mbid'];
        $slot = $r['no_of_slots'];
        $total = $r['total_bill'];
        $extra = $r['extra_services'];
        $remain = $r['remaining_payment'];
    $exec1 = mysqli_query($con,"select * from banquet_plans where mbid = $plan");
    while($r1 = mysqli_fetch_array($exec1))
    {
            $plan_name = $r1['plan_name'];
            $price = $r1['price'];
            $feture_list = $r1['feature_list'];
    $message = '<html>
    <head style="margin: 0;">

    <!--[if gte mso 9]><xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" style="margin: 0;">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" style="margin: 0;">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" style="margin: 0;">
    <title style="margin: 0;">Banquet Confirmation</title>

    <!--[if gte mso 9]>
    <style>
    #tableForOutlook {
    width:600px;
    }
    .space{ display:none !important;}
    </style>
    <![endif]-->
    </head>

    <body style="background-color: #f0f0f1; font-family: "Avenir Next", "Avenir", open sans, Helvetica; margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
            <tbody>
                <tr style="margin: 0;">
                    <td align="center" style="margin: 0; vertical-align: top;" valign="top">
                        <table cellpadding="0" cellspacing="0" class="wrapper" style="margin: 10px auto 0px auto; max-width: 600px; min-width: 300px;" width="100%">
                            <tbody>
                                <tr style="margin: 0;">
                                    <td style="margin: 0; vertical-align: top;">
                                        <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
                                            <tbody>
                                                <tr style="margin: 0;">
                                                    <td style="margin: 0; vertical-align: top;" width="10">&nbsp;</td>
                                                    <td style="margin: 0; vertical-align: top;">
                                                        <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" style="margin: 0px 0px 14px 0px;" width="100%">
                                                            <tbody>
                                                                <tr style="margin: 0;">
                                                                    <td style="margin: 0; vertical-align: top;">
                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
                                                                            <tbody>
                                                                                <tr class="content" style="margin: 0;">
                                                                                    <td style="margin: 0; vertical-align: top;">
                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
                                                                                            <tbody>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="10" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%2274px%22%2C%22height%22%3A%2232%22%2C%22alt_text%22%3A%22logo%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AblackLogo%22%2C%22link%22%3A%22https%3A//www.joinhoney.com%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="#" style="margin: 0;"><img alt="logo" border="0" height="32" src="https://thewebmate.in/yajman-01/emails/logo-y.jpg" style="margin: 0px; vertical-align: top; width:200px; height: 75px;" width="74px"></a></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="10" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%22100%25%22%2C%22height%22%3A%22auto%22%2C%22alt_text%22%3A%22honeygold%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AheaderCompLg%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><img alt="honeygold" height="auto" src="https://thewebmate.in/yajman-01/emails/banquet.jpg" style="height: auto; margin: 0; max-width: 580px; vertical-align: top; width: 70%;border-radius: 20px;" width="100%"></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="40" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td style="margin: 0; vertical-align: top;">
                                                                                                        <table bgcolor="#ffffff" cellpadding="0" cellspacing="0" class="content-wrapper" style="margin: 0; padding: 0px 45px;" width="100%">
                                                                                                            <tbody>
                                                                                                                <tr style="margin: 0;">
                                                                                                                    <td colspan="3" height="20" style="margin: 0; vertical-align: top;">
                                                                                                                        &nbsp;
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr style="margin: 0;">
                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0; max-width: 417px;" width="100%">
                                                                                                                            <tbody>
                                                                                                                                <tr style="margin: 0;">;
                                                                                                                                <td align="center" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                                                        <div class="text2" style="color: #9711a3; font-family: "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 28px; font-weight: 900; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Banquet
                                                                                                                                            Token 
                                                                                                                                            Received                                                                                                                                        
                                                                                                                                        </div>
                                                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 20px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Order
                                                                                                                                            Details
                                                                                                                                            for
                                                                                                                                            <b>'.
                                                                                                                                        $name
                                                                                                                                        .'</b>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                        <table cellpadding="0" cellspacing="0" style="font-size: 14px; margin: 0px auto;border-collapse: ;" width="100%">
                                                                                                                            <tbody>
                                                                                                                            <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Banquet Booked For
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        $r['date']
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Banquet Timing
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        date('h:i:s A',strtotime($r['time']))
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                        
                                                                                                                                        '.date('h:i:s A',strtotime($r['end_time'])).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;"></tr>

                                                                                                                                <tr  style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;">
                                                                                                                                    <td></td>
                                                                                                                                    <td align="center" style="font-weight: 600;margin:0; vertical-align: top; ">Booked Plan Details </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;"></tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        '.$plan_name.'
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        $feture_list
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.number_format($total).'
                                                                                                                                    </td>
                                                                                                                                </tr>';
                                                                                                                                if($total > ($price * $slot))
                                                                                                                                {   $message.'
                                                                                                                                
                                                                                                                                <tr style="margin: 0;border-radius: 20px;border: 0px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        '.$extra.'
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                    

                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.($total - ($price * $slot)).'
                                                                                                                                    </td>

                                                                                                                                </tr>';
                                                                                                                        
                                                                                                                                }
                                                                                                                                else{
                                                                                                                                    $message;
                                                                                                                                }
                                                                                                                    $q = mysqli_query($con,"select * from banquet_installment where Booking_id = $id");
                                                                                                                    while($r2 = mysqli_fetch_array($q)){
                                                                                                                    $token = '
                                                                                                                    <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">
                                                                                                                        <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                         Token
                                                                                                                        </td>
                                                                                                                        <td align="center" style="margin: 0; vertical-align: top;"> '.date('d/m/Y',strtotime($r2['payment_date'])).'</td>
                                                                                                                        <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;"> 
                                                                                                                        - ₹ '.number_format($r2['payment_amount']).'</td>
                                                                                                                        
                                                                                                                    </tr>'; 
                                                                                                                    }
                                                                                                            $end_message =' </tbody>
                                                                                                                        </table>

                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td colspan="3" height="20" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="margin: 0;">
                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                        <table style="background-color: #feffea; border-top: 1px solid #d8d8d8; margin: 0; text-align: center; width: 60%;" width="60%">
                                                                                            <tbody>
                                                                                                <tr height="20" style="height: 20px; margin: 0;">
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td class="text4" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 18px; font-weight: bold; line-height: 1.6; margin: 0; padding: 0; vertical-align: top;">
                                                                                                        Remaining Payment : ₹ '.number_format($remain).'
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr height="10" style="height: 10px; margin: 0;">
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td style="font-size: 14px; margin: 0; vertical-align: top;">
                                                                                                        <a href="#" style="color: #292a2a; margin: 0;">Managed
                                                                                                            By Yajman
                                                                                                            Restaurant &amp; Banquet
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                </tr>

                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr height="30" style="height: 30px; margin: 0;">
                                                                </tr>
                                                                <tr align="center" style="margin: 0;">

                                                                </tr>
                                                                <tr height="30" style="height: 30px; margin: 0;">
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="hide-mobile" style="margin: 0; vertical-align: top;" width="10">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
            <tbody>
                <tr class="footer" style="margin: 0;">
                    <td align="center" style="margin: 0; text-align: center; vertical-align: top;">
                        <table cellpadding="0" cellspacing="0" class="content-wrapper" style="margin: 0; padding: 0px 45px; font-family:  "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica";font-size: 10px;line-height: 1.6;color: #9fa0a4; text-align: center;" width="100%">
                            <tbody>
                                <tr style="margin: 0;">

                                </tr>
                            </td>
                                </tr>
                                <tr height="15" style="height: 15px">
                                </tr>
                                <tr>
                                    <td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica";">Sent with
                                        Care from Yajman Restaurant</td>
                                </tr>
                                <tr>
                                    <td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica";">Yajman Restaurant, Dharm Nagar 2, Sabarmati, Ahmedabad</td>
                                    <td height="28" style="height: 38px; margin: 0;vertical-align: top;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <a href="tel:+918469000683" target="_blank"><td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica"; color:#b13476;">Any Queries? Ring your phone to : <br>+91 84690 00683, +91 81281 41047</a></td>
                                    <td height="28" style="height: 38px; margin: 0;vertical-align: top;">&nbsp;</td>


                                </tr>
                                <tr>
                                    <a href="https://yajmanrestaurant.com" target="_blank"><td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica"; color:#b13476;">Visit our Website : yajmanrestaurant.com</a></td>
                                </tr>
                                <tr height="15" style="height: 15px">
                                </tr>

                                <tr style="margin: 0;">
                                    <td height="30" style="height: 30px; margin: 0;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';}}
			$subject = "Token Received";
		    $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $title1 = 'Feedback Form';
			$headers .= 'From: <info@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message.$token.$end_message,$headers)) {
              
            } else {
              echo "no";
            }
   
    }

?>
