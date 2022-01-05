<?php
    require 'db.php';
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    
    $id = $_SESSION['bbid'];

    $today = date('Y-m-d');
        
    if($_POST['amount'] != ' ' && $_POST['amount'] != '0')
    {
        $q1 =" select remaining_payment from banquet_booking_user where Bbid = $id ";
        $exec = mysqli_query($con,$q1);
    
        $r = mysqli_fetch_array($exec);
        $rp = $r['remaining_payment']; 

        $amount = $_POST['amount'];
        $remaining = $rp - $amount;
        
        if($remaining == 0)
        {
            $ex = mysqli_query($con,"insert into banquet_installment(Booking_id,payment_amount,payment_date) values($id,$amount,$today)");
            if($ex){
                $exec3 = mysqli_query($con,"update banquet_booking_user set status = 2, remaining_payment = $remaining where Bbid = $id");
            
                $q = mysqli_query($con,"select * from banquet_booking_user where Bbid = $id");
                while($r = mysqli_fetch_array($q)){
                    $email = $r['email'];
                    email($email,$id);
                }
            }
            else
                echo "<script>alert('Error')</script>";

         }                  
        else
        {
            $query = "insert into banquet_installment(Booking_id,type,payment_amount,payment_date) values($id,'',$amount,'$today')";
            $exec1 = mysqli_query($con,$query);
            if($exec1)
            {
                $exec2 = mysqli_query($con,"update banquet_booking_user set remaining_payment = $remaining where Bbid = $id");
                //header("location:complete_banquet_pay.php");
                email1($id,$amount,$today);
                
            }
            else{
                echo mysqli_error($con);
            }
        }

    }
    
    function email($email,$id){
        require 'db.php';
        $to = $email;
        $subject = 'Banquet Payment Complete - Yajmann Restaurant & Banquet';
        $q = mysqli_query($con,"select * from banquet_booking_user where Bbid = $id");
        
        while($r = mysqli_fetch_array($q)){
            $q1 = mysqli_query($con,"select * from banquet_plans where mbid = ".$r['mbid']);
            while($r1 = mysqli_fetch_array($q1)){
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
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%2274px%22%2C%22height%22%3A%2232%22%2C%22alt_text%22%3A%22logo%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AblackLogo%22%2C%22link%22%3A%22https%3A//www.joinhoney.com%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="#" style="margin: 0;"><img alt="logo" border="0" height="32" src="https://yajmanrestaurant.com/images/logo-y.jpg" style="margin: 0px; vertical-align: top; width:200px; height: 75px;" width="74px"></a></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="10" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%22100%25%22%2C%22height%22%3A%22auto%22%2C%22alt_text%22%3A%22honeygold%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AheaderCompLg%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><img alt="honeygold" height="auto" src="https://yajmanrestaurant.com/images/banquet_final.jpg" style="height: auto; margin: 0; max-width: 580px; vertical-align: top; width: 70%;border-radius: 20px;" width="100%"></span>
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
                                                                                                                                <tr style="margin: 0;">
                                                                                                                                    <td align="center" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                                                        <div class="text2" style="color: #9711a3; font-family: "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 28px; font-weight: 900; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Banquet
                                                                                                                                            Payment
                                                                                                                                            Complete
                                                                                                                                        </div>
                                                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 20px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Order
                                                                                                                                            Details
                                                                                                                                            for
                                                                                                                                            <b>'.
                                                                                                                                        $r['name']
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
                                                                                                                                        '.$r1['plan_name'].'
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        $r1['feature_list']
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.number_format($r['no_of_slots'] * $r1['price']).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Food Billing 
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        ₹ '.
                                                                                                                                        $r['menu_plan'].' * '.$r['person']
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.number_format($r['menu_plan'] * $r['person']).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                
                                                                                                                    
                                                                                                                            </tbody>
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
                                                                                                        Total : ₹ '.number_format($total).'
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td class="text4" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 18px; font-weight: bold; line-height: 1.6; margin: 0; padding: 0; vertical-align: top;">
                                                                                                        Remaining Payment : ₹ '.number_format($r['remaining_payment']).'
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
                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0; padding-top: 40px; width: 80%;">
                                                                                            <tbody>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="left" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 14px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                            
                                                                                                            <b>'.$name.'</b>,
                                                                                                            your
                                                                                                            Payent for banquet is
                                                                                                            Complete
                                                                                                            by
                                                                                                            Yajman
                                                                                                            Banquet.
                                                                                                        </div>
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
</html>';
            
        }}
             
            $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <banquet_yajman@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message,$headers)) {
                    feedback($to);
            } else {
              echo "<script>alert('Oops!, Complete Mail Not sent');</script>";
            }
    }
    function feedback($to){
        $to = $to;
		$subject = "Feedback - Yajman Restaurant & Banquet";
        $message = '<!DOCTYPE html>
<html
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <!-- NAME: SELL PRODUCTS -->
    <!--[if gte mso 15]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG />
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
    <![endif]-->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thank you for your order.</title>

    <style type="text/css">
      p {
        margin: 10px 0;
        padding: 0;
      }

      table {
        border-collapse: collapse;
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        display: block;
        margin: 0;
        padding: 0;
      }

      img,
      a img {
        border: 0;
        height: auto;
        outline: none;
        text-decoration: none;
      }

      body,
      #bodyTable,
      #bodyCell {
        height: 100%;
        margin: 0;
        padding: 0;
        width: 100%;
      }

      .mcnPreviewText {
        display: none !important;
      }

      #outlook a {
        padding: 0;
      }

      img {
        -ms-interpolation-mode: bicubic;
      }

      table {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }

      .ReadMsgBody {
        width: 100%;
      }

      .ExternalClass {
        width: 100%;
      }

      p,
      a,
      li,
      td,
      blockquote {
        mso-line-height-rule: exactly;
      }

      a[href^="tel"],
      a[href^="sms"] {
        color: inherit;
        cursor: default;
        text-decoration: none;
      }

      p,
      a,
      li,
      td,
      body,
      table,
      blockquote {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }

      .ExternalClass,
      .ExternalClass p,
      .ExternalClass td,
      .ExternalClass div,
      .ExternalClass span,
      .ExternalClass font {
        line-height: 100%;
      }

      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }

      .templateContainer {
        max-width: 600px !important;
      }

      a.mcnButton {
        display: block;
      }

      .mcnImage,
      .mcnRetinaImage {
        vertical-align: bottom;
      }

      .mcnTextContent {
        word-break: break-word;
      }

      .mcnTextContent img {
        height: auto !important;
      }

      .mcnDividerBlock {
        table-layout: fixed !important;
      }

      h1 {
        color: #222222;
        font-family: Helvetica;
        font-size: 40px;
        font-style: normal;
        font-weight: bold;
        line-height: 150%;
        letter-spacing: normal;
        text-align: center;
      }

      h2 {
        color: #222222;
        font-family: Helvetica;
        font-size: 34px;
        font-style: normal;
        font-weight: bold;
        line-height: 150%;
        letter-spacing: normal;
        text-align: left;
      }

      h3 {
        color: #444444;
        font-family: Helvetica;
        font-size: 22px;
        font-style: normal;
        font-weight: bold;
        line-height: 150%;
        letter-spacing: normal;
        text-align: left;
      }

      h4 {
        color: #949494;
        font-family: Georgia;
        font-size: 20px;
        font-style: italic;
        font-weight: normal;
        line-height: 125%;
        letter-spacing: normal;
        text-align: left;
      }

      #templateHeader {
        background-color: #081017;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-top: 0;
        border-bottom: 0;
        padding-top: 0px;
        padding-bottom: 0px;
      }

      .headerContainer {
        background-color: transparent;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-top: 0;
        border-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
      }

      .headerContainer .mcnTextContent,
      .headerContainer .mcnTextContent p {
        color: #757575;
        font-family: Helvetica;
        font-size: 16px;
        line-height: 150%;
        text-align: left;
      }

      .headerContainer .mcnTextContent a,
      .headerContainer .mcnTextContent p a {
        color: #007c89;
        font-weight: normal;
        text-decoration: underline;
      }

      #templateBody {
        background-color: #081017;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-top: 0;
        border-bottom: 0;
        padding-top: 36px;
        padding-bottom: 45px;
      }

      .bodyContainer {
        background-color: #transparent;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-top: 0;
        border-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
      }

      .bodyContainer .mcnTextContent,
      .bodyContainer .mcnTextContent p {
        color: #757575;
        font-family: Helvetica;
        font-size: 16px;
        line-height: 150%;
        text-align: left;
      }

      .bodyContainer .mcnTextContent a,
      .bodyContainer .mcnTextContent p a {
        color: #007c89;
        font-weight: normal;
        text-decoration: underline;
      }

      #templateFooter {
        background-color: #1f252c;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-top: 0;
        border-bottom: 0;
        padding-top: 45px;
        padding-bottom: 63px;
      }

      .footerContainer {
        background-color: transparent;
        background-image: none;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-top: 0;
        border-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
      }

      .footerContainer .mcnTextContent,
      .footerContainer .mcnTextContent p {
        color: #ffffff;
        font-family: Helvetica;
        font-size: 12px;
        line-height: 150%;
        text-align: center;
      }

      .footerContainer .mcnTextContent a,
      .footerContainer .mcnTextContent p a {
        color: #ffffff;
        font-weight: normal;
        text-decoration: underline;
      }

      @media only screen and (min-width: 768px) {
        .templateContainer {
          width: 600px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        body,
        table,
        td,
        p,
        a,
        li,
        blockquote {
          -webkit-text-size-adjust: none !important;
        }
      }

      @media only screen and (max-width: 480px) {
        body {
          width: 100% !important;
          min-width: 100% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnRetinaImage {
          max-width: 100% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImage {
          width: 100% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnCartContainer,
        .mcnCaptionTopContent,
        .mcnRecContentContainer,
        .mcnCaptionBottomContent,
        .mcnTextContentContainer,
        .mcnBoxedTextContentContainer,
        .mcnImageGroupContentContainer,
        .mcnCaptionLeftTextContentContainer,
        .mcnCaptionRightTextContentContainer,
        .mcnCaptionLeftImageContentContainer,
        .mcnCaptionRightImageContentContainer,
        .mcnImageCardLeftTextContentContainer,
        .mcnImageCardRightTextContentContainer,
        .mcnImageCardLeftImageContentContainer,
        .mcnImageCardRightImageContentContainer {
          max-width: 100% !important;
          width: 100% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnBoxedTextContentContainer {
          min-width: 100% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImageGroupContent {
          padding: 9px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnCaptionLeftContentOuter .mcnTextContent,
        .mcnCaptionRightContentOuter .mcnTextContent {
          padding-top: 9px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImageCardTopImageContent,
        .mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,
        .mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent {
          padding-top: 18px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImageCardBottomImageContent {
          padding-bottom: 9px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImageGroupBlockInner {
          padding-top: 0 !important;
          padding-bottom: 0 !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImageGroupBlockOuter {
          padding-top: 9px !important;
          padding-bottom: 9px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnTextContent,
        .mcnBoxedTextContentColumn {
          padding-right: 18px !important;
          padding-left: 18px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnImageCardLeftImageContent,
        .mcnImageCardRightImageContent {
          padding-right: 18px !important;
          padding-bottom: 0 !important;
          padding-left: 18px !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcpreview-image-uploader {
          display: none !important;
          width: 100% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        h1 {
          font-size: 30px !important;
          line-height: 150% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        h2 {
          font-size: 26px !important;
          line-height: 150% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        h3 {
          font-size: 20px !important;
          line-height: 150% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        h4 {
          font-size: 18px !important;
          line-height: 150% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .mcnBoxedTextContentContainer .mcnTextContent,
        .mcnBoxedTextContentContainer .mcnTextContent p {
          font-size: 14px !important;
          line-height: 150% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .headerContainer .mcnTextContent,
        .headerContainer .mcnTextContent p {
          font-size: 16px !important;
          line-height: 200% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .bodyContainer .mcnTextContent,
        .bodyContainer .mcnTextContent p {
          font-size: 16px !important;
          line-height: 200% !important;
        }
      }

      @media only screen and (max-width: 480px) {
        .footerContainer .mcnTextContent,
        .footerContainer .mcnTextContent p {
          font-size: 14px !important;
          line-height: 150% !important;
        }
      }
    </style>
  </head>

  <body
    style="
      height: 100%;
      margin: 0;
      padding: 0;
      width: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
    "
  >
    <!--
-->
    <!--[if !gte mso 9]><!----><span
      class="mcnPreviewText"
      style="
        display: none;
        font-size: 0px;
        line-height: 0px;
        max-height: 0px;
        max-width: 0px;
        opacity: 0;
        overflow: hidden;
        visibility: hidden;
        mso-hide: all;
      "
      >WE. WANT. YOU. To vote for us! We have been nominated for a Webby and are
      up against some stiff competition this year.</span
    >
    <!--<![endif]-->
    <!--
-->
    <center>
      <table
        align="center"
        border="0"
        cellpadding="0"
        cellspacing="0"
        height="100%"
        width="100%"
        id="bodyTable"
        style="
          border-collapse: collapse;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          height: 100%;
          margin: 0;
          padding: 0;
          width: 100%;
        "
      >
        <tr>
          <td
            align="center"
            valign="top"
            id="bodyCell"
            style="
              mso-line-height-rule: exactly;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
              height: 100%;
              margin: 0;
              padding: 0;
              width: 100%;
            "
          >
            <!-- BEGIN TEMPLATE // -->
            <table
              border="0"
              cellpadding="0"
              cellspacing="0"
              width="100%"
              style="
                border-collapse: collapse;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
              "
            >
              <tr>
                <td
                  align="center"
                  valign="top"
                  id="templateHeader"
                  data-template-container=""
                  style="
                    background: #081017 none no-repeat center/cover;
                    mso-line-height-rule: exactly;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                    background-color: #081017;
                    background-image: none;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    border-top: 0;
                    border-bottom: 0;
                    padding-top: 0px;
                    padding-bottom: 0px;
                  "
                >
                  <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                  <table
                    align="center"
                    border="0"
                    cellpadding="0"
                    cellspacing="0"
                    width="100%"
                    class="templateContainer"
                    style="
                      border-collapse: collapse;
                      mso-table-lspace: 0pt;
                      mso-table-rspace: 0pt;
                      -ms-text-size-adjust: 100%;
                      -webkit-text-size-adjust: 100%;
                      max-width: 600px !important;
                    "
                  >
                    <tr>
                      <td
                        valign="top"
                        class="headerContainer"
                        style="
                          background: transparent none no-repeat center/cover;
                          mso-line-height-rule: exactly;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                          background-color: transparent;
                          background-image: none;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-size: cover;
                          border-top: 0;
                          border-bottom: 0;
                          padding-top: 0;
                          padding-bottom: 0;
                        "
                      ></td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                </td>
              </tr>
              <tr>
                <td
                  align="center"
                  valign="top"
                  id="templateBody"
                  data-template-container=""
                  style="
                    background: #081017 none no-repeat center/cover;
                    mso-line-height-rule: exactly;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                    background-color: #081017;
                    background-image: none;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    border-top: 0;
                    border-bottom: 0;
                    padding-top: 36px;
                    padding-bottom: 45px;
                  "
                >
                  <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                  <table
                    align="center"
                    border="0"
                    cellpadding="0"
                    cellspacing="0"
                    width="100%"
                    class="templateContainer"
                    style="
                      border-collapse: collapse;
                      mso-table-lspace: 0pt;
                      mso-table-rspace: 0pt;
                      -ms-text-size-adjust: 100%;
                      -webkit-text-size-adjust: 100%;
                      max-width: 600px !important;
                    "
                  >
                    <tr>
                      <td
                        valign="top"
                        class="bodyContainer"
                        style="
                          background: transparent none no-repeat center/cover;
                          mso-line-height-rule: exactly;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                          background-color: #transparent;
                          background-image: none;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-size: cover;
                          border-top: 0;
                          border-bottom: 0;
                          padding-top: 0;
                          padding-bottom: 0;
                        "
                      >
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnDividerBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                            table-layout: fixed !important;
                          "
                        >
                          <tbody class="mcnDividerBlockOuter">
                            <tr>
                              <td
                                class="mcnDividerBlockInner"
                                style="
                                  min-width: 100%;
                                  padding: 18px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <table
                                  class="mcnDividerContent"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  width="100%"
                                  style="
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        style="
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        "
                                      >
                                        <span></span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnImageBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                          "
                        >
                          <tbody class="mcnImageBlockOuter">
                            <tr>
                              <td
                                valign="top"
                                style="
                                  padding: 9px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                                class="mcnImageBlockInner"
                              >
                                <table
                                  align="left"
                                  width="100%"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  class="mcnImageContentContainer"
                                  style="
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        class="mcnImageContent"
                                        valign="top"
                                        style="
                                          padding-right: 9px;
                                          padding-left: 9px;
                                          padding-top: 0;
                                          padding-bottom: 0;
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        "
                                      >

                                          <img
                                            align="left"
                                            alt=""
                                            src="https://thewebmate.in/yajman-01/emails/feedback_banner.jpg"
                                            width="564"
                                            style="
                                              border-radius: 20px;
                                              max-width: 1437px;
                                              padding-bottom: 0;
                                              display: inline !important;
                                              vertical-align: bottom;
                                              border: 0;
                                              height: auto;
                                              outline: none;
                                              text-decoration: none;
                                              -ms-interpolation-mode: bicubic;
                                            "
                                            class="mcnRetinaImage"
                                          />

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnTextBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                          "
                        >
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td
                                valign="top"
                                class="mcnTextBlockInner"
                                style="
                                  padding-top: 9px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->

                                <!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                                <table
                                  align="left"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  style="
                                    max-width: 100%;
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                  width="100%"
                                  class="mcnTextContentContainer"
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        valign="top"
                                        class="mcnTextContent"
                                        style="
                                          padding: 0px 18px 9px;
                                          line-height: 200%;
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                          word-break: break-word;
                                          color: #757575;
                                          font-family: Helvetica;
                                          font-size: 16px;
                                          text-align: left;
                                        "
                                      >
                                        <h3
                                          style="
                                            display: block;
                                            margin: 0;
                                            padding: 0;
                                            color: #444444;
                                            font-family: Helvetica;
                                            font-size: 22px;
                                            font-style: normal;
                                            font-weight: bold;
                                            line-height: 150%;
                                            letter-spacing: normal;
                                            text-align: left;
                                          "
                                        >
                                          <span style="font-size: 28px"
                                            ><span style="color: #ffffff"
                                              ><strong
                                                >Your feedback is really valuable for us! <br><br></strong
                                              ></span
                                            ></span
                                          >
                                        </h3>

                                        <p
                                          style="
                                            line-height: 200%;
                                            margin: 10px 0;
                                            padding: 0;
                                            mso-line-height-rule: exactly;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                            color: #757575;
                                            font-family: Helvetica;
                                            font-size: 16px;
                                            text-align: left;
                                          "
                                        >
                                          <span style="font-size: 18px"
                                            ><span style="color: #a9a9a9"
                                              >Please write your reviews
                                              regarding our service so that we
                                              can improvise our services as per
                                              your feedback.
                                              <span style="color:yellow; letter-spacing:0.7px; font-weight:bolder;">
                                              <br><br>Kindly
                                              spare 1 minute to fill up the Feedback Form.</span></span
                                            ></span
                                          >
                                        </p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--[if mso]>
				</td>
				<![endif]-->

                                <!--[if mso]>
				</tr>
				</table>
				<![endif]-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnDividerBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                            table-layout: fixed !important;
                          "
                        >
                          <tbody class="mcnDividerBlockOuter">
                            <tr>
                              <td
                                class="mcnDividerBlockInner"
                                style="
                                  min-width: 100%;
                                  padding: 10px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <table
                                  class="mcnDividerContent"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  width="100%"
                                  style="
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        style="
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        "
                                      >
                                        <span></span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnDividerBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                            table-layout: fixed !important;
                          "
                        >
                          <tbody class="mcnDividerBlockOuter">
                            <tr>
                              <td
                                class="mcnDividerBlockInner"
                                style="
                                  min-width: 100%;
                                  padding: 18px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <table
                                  class="mcnDividerContent"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  width="100%"
                                  style="
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        style="
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        "
                                      >
                                        <span></span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnButtonBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                          "
                        >
                          <tbody class="mcnButtonBlockOuter">
                            <tr>
                              <td
                                style="
                                  padding-top: 0;
                                  padding-right: 18px;
                                  padding-bottom: 18px;
                                  padding-left: 18px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                                valign="top"
                                align="left"
                                class="mcnButtonBlockInner"
                              >
                                <table
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  class="mcnButtonContentContainer"
                                  style="
                                    border-collapse: separate !important;
                                    border-top-left-radius: 9px;
                                    border-top-right-radius: 9px;
                                    border-bottom-right-radius: 9px;
                                    border-bottom-left-radius: 9px;
                                    background-color: #ae00ff;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        align="center"
                                        valign="middle"
                                        class="mcnButtonContent"
                                        style="
                                          font-family: Helvetica;
                                          font-size: 22px;
                                          padding: 26px;
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        "
                                      >
                                        <a
                                          class="mcnButton"
                                          title="Give Feedback Now!"
                                          href="yajmanrestaurant.com/feedback"
                                          target="_blank"
                                          style="
                                            font-weight: bold;
                                            letter-spacing: 0px;
                                            line-height: 100%;
                                            text-align: center;
                                            text-decoration: none;
                                            color: #ffffff;
                                            mso-line-height-rule: exactly;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                            display: block;
                                          "
                                          >Give Feedback Now!
                                        </a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnDividerBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                            table-layout: fixed !important;
                          "
                        >
                          <tbody class="mcnDividerBlockOuter">
                            <tr>
                              <td
                                class="mcnDividerBlockInner"
                                style="
                                  min-width: 100%;
                                  padding: 40px 18px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <table
                                  class="mcnDividerContent"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  width="100%"
                                  style="
                                    min-width: 100%;
                                    border-top-width: 1px;
                                    border-top-style: solid;
                                    border-top-color: #696969;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        style="
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                        "
                                      >
                                        <span></span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnTextBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                          "
                        >
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td
                                valign="top"
                                class="mcnTextBlockInner"
                                style="
                                  padding-top: 9px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->

                                <!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                                <table
                                  align="left"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  style="
                                    max-width: 100%;
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                  width="100%"
                                  class="mcnTextContentContainer"
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        valign="top"
                                        class="mcnTextContent"
                                        style="
                                          padding: 0px 18px 9px;
                                          line-height: 200%;
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                          word-break: break-word;
                                          color: #757575;
                                          font-family: Helvetica;
                                          font-size: 16px;
                                          text-align: left;
                                        "
                                      >
                                        <h3
                                          style="
                                            display: block;
                                            margin: 0;
                                            padding: 0;
                                            color: #444444;
                                            font-family: Helvetica;
                                            font-size: 22px;
                                            font-style: normal;
                                            font-weight: bold;
                                            line-height: 150%;
                                            letter-spacing: normal;
                                            text-align: left;
                                          "
                                        >
                                          <span style="font-size: 18px"
                                            ><span style="color: #ffffff"
                                              ><strong
                                                >Thank You So Much!</strong
                                              ></span
                                            ></span
                                          >
                                        </h3>

                                        <p
                                          style="
                                            line-height: 200%;
                                            margin: 10px 0;
                                            padding: 0;
                                            mso-line-height-rule: exactly;
                                            -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust: 100%;
                                            color: #757575;
                                            font-family: Helvetica;
                                            font-size: 16px;
                                            text-align: left;
                                          "
                                        >
                                          <!-- <span style="font-size:18px">
                                                                                    <font color="#a9a9a9">We are in the
                                                                                        running for entertainment app of
                                                                                        the year, but we are up against
                                                                                        brands like Marvel, Fandango,
                                                                                        and Ellen who are 10-100x larger
                                                                                        than us.&nbsp;Suffice to say, we
                                                                                        are&nbsp;definitely the underdog
                                                                                        and every single&nbsp;vote from
                                                                                        our&nbsp;<span
                                                                                            style="caret-color: #A9A9A9;">Reelgood-ers</span>&nbsp;counts.
                                                                                        We could not have gotten this far
                                                                                        without each and every one of
                                                                                        you and for those of you who
                                                                                        have provided feedback, that
                                                                                        goes double!&nbsp;So thank you
                                                                                        all so so much!</font>
                                                                                </span> -->
                                        </p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--[if mso]>
				</td>
				<![endif]-->

                                <!--[if mso]>
				</tr>
				</table>
				<![endif]-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                </td>
              </tr>
              <tr>
                <td
                  align="center"
                  valign="top"
                  id="templateFooter"
                  data-template-container=""
                  style="
                    background: #1f252c none no-repeat center/cover;
                    mso-line-height-rule: exactly;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                    background-color: #1f252c;
                    background-image: none;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    border-top: 0;
                    border-bottom: 0;
                    padding-top: 45px;
                    padding-bottom: 63px;
                  "
                >
                  <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                  <table
                    align="center"
                    border="0"
                    cellpadding="0"
                    cellspacing="0"
                    width="100%"
                    class="templateContainer"
                    style="
                      border-collapse: collapse;
                      mso-table-lspace: 0pt;
                      mso-table-rspace: 0pt;
                      -ms-text-size-adjust: 100%;
                      -webkit-text-size-adjust: 100%;
                      max-width: 600px !important;
                    "
                  >
                    <tr>
                      <td
                        valign="top"
                        class="footerContainer"
                        style="
                          background: transparent none no-repeat center/cover;
                          mso-line-height-rule: exactly;
                          -ms-text-size-adjust: 100%;
                          -webkit-text-size-adjust: 100%;
                          background-color: transparent;
                          background-image: none;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-size: cover;
                          border-top: 0;
                          border-bottom: 0;
                          padding-top: 0;
                          padding-bottom: 0;
                        "
                      >
                        <table
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          width="100%"
                          class="mcnTextBlock"
                          style="
                            min-width: 100%;
                            border-collapse: collapse;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                          "
                        >
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td
                                valign="top"
                                class="mcnTextBlockInner"
                                style="
                                  padding-top: 9px;
                                  mso-line-height-rule: exactly;
                                  -ms-text-size-adjust: 100%;
                                  -webkit-text-size-adjust: 100%;
                                "
                              >
                                <!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->

                                <!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                                <table
                                  align="left"
                                  border="0"
                                  cellpadding="0"
                                  cellspacing="0"
                                  style="
                                    max-width: 100%;
                                    min-width: 100%;
                                    border-collapse: collapse;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                  "
                                  width="100%"
                                  class="mcnTextContentContainer"
                                >
                                  <tbody>
                                    <tr>
                                      <td
                                        valign="top"
                                        class="mcnTextContent"
                                        style="
                                          padding-top: 0;
                                          padding-right: 18px;
                                          padding-bottom: 9px;
                                          padding-left: 18px;
                                          mso-line-height-rule: exactly;
                                          -ms-text-size-adjust: 100%;
                                          -webkit-text-size-adjust: 100%;
                                          word-break: break-word;
                                          color: #ffffff;
                                          font-family: Helvetica;
                                          font-size: 12px;
                                          line-height: 150%;
                                          text-align: center;
                                        "
                                      >
                                        <div style="text-align: left">
                                          <em
                                            ><a
                                              href="https://reelgood.com/"
                                              target="_blank"
                                              style="
                                                mso-line-height-rule: exactly;
                                                -ms-text-size-adjust: 100%;
                                                -webkit-text-size-adjust: 100%;
                                                color: #ffffff;
                                                font-weight: normal;
                                                text-decoration: underline;
                                              "
                                              ><img
                                                data-file-id="2939049"
                                                height="33"
                                                src="https://thewebmate.in/yajman-01/emails/logo-y.jpg"
                                                style="
                                                  border: 0px;
                                                  width: 132px;
                                                  height: 33px;
                                                  margin: 0px;
                                                  outline: none;
                                                  text-decoration: none;
                                                  -ms-interpolation-mode: bicubic;
                                                "
                                                width="132" /></a></em
                                          ><br />
                                          <strong
                                            >&nbsp; Yajman Restaurant &
                                            Banquet</strong
                                          ><br />
                                          <br />
                                          <br />
                                          <span style="color: #808080"
                                            ><em
                                              >Copyright © 2020 Yajman
                                              Restaurant, All rights
                                              reserved.</em
                                            ><br />
                                          </span>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--[if mso]>
				</td>
				<![endif]-->

                                <!--[if mso]>
				</tr>
				</table>
				<![endif]-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                </td>
              </tr>
            </table>
            <!-- // END TEMPLATE -->
          </td>
        </tr>
      </table>
    </center>
  </body>
</html>
';
 $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <feedback@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message.$end_message,$headers)) {
			    header("location:view_banquet_book.php");
            } else {
                echo 'error';
              echo "<script>alert('Oops!, Feedback Mail Not sent');</script>";
            }
    }
    function email1($id, $amount,$today){
        require 'db.php';
        $subject = "Banquet Payment Received - Yajmaan Restaurant & Banquet";
        $q = mysqli_query($con,"select * from banquet_booking_user where Bbid = $id");
        
        while($r = mysqli_fetch_array($q)){
            $total = $r['total_bill'];
            $remain = $r['remaining_payment'];
            $to = $r['email'];
            
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
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%2274px%22%2C%22height%22%3A%2232%22%2C%22alt_text%22%3A%22logo%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AblackLogo%22%2C%22link%22%3A%22https%3A//www.joinhoney.com%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="#" style="margin: 0;"><img alt="logo" border="0" height="32" src="https://yajmanrestaurant.com/images/logo-y.jpg" style="margin: 0px; vertical-align: top; width:200px; height: 75px;" width="74px"></a></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="10" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%22100%25%22%2C%22height%22%3A%22auto%22%2C%22alt_text%22%3A%22honeygold%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AheaderCompLg%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><img alt="honeygold" height="auto" src="https://yajmanrestaurant.com/images/banquet_final.jpg" style="height: auto; margin: 0; max-width: 580px; vertical-align: top; width: 70%;border-radius: 20px;" width="100%"></span>
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
                                                                                                                                <tr style="margin: 0;">
                                                                                                                                    <td align="center" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                                                        <div class="text2" style="color: #9711a3; font-family: "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 28px; font-weight: 900; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Banquet
                                                                                                                                            Token Received
                                                                                                                                        </div>
                                                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 20px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Order
                                                                                                                                            Details
                                                                                                                                            for
                                                                                                                                            <b>'.
                                                                                                                                        $r['name']
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
                                                                                                                                        Total Bill
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                    
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                       ₹ '.number_format($total).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;"></tr>

                                                                                                                            
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Payment Received
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        date('d/m/Y',strtotime($today))
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                       ₹ '.number_format($amount).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;"></tr>
                                                                                                                                
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Remaining Payment
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                    
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹ '.number_format($remain).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                
                                                                                                                                </tbody>
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
                                                                                                        Remaining : ₹ '.number_format($remain).'
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
                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0; padding-top: 40px; width: 80%;">
                                                                                            <tbody>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="left" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 14px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                        
                                                                                                            <b>'.$r['name'].'</b>,
                                                                                                            your
                                                                                                            Payment Received
                                                                                                            by
                                                                                                            Yajman
                                                                                                            Banquet.
                                                                                                        </div>
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
</html>';
        }  
            $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <banquet_yajman@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message,$headers)) {
			     header("location:view_banquet_book.php");
            } else {
              echo "<script>alert('Oops!, Mail Not sent');</script>";
            }
    }
    ?>