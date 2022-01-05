<?php
    require 'db.php';

    $id = $_GET['tuid'];
    if(isset($_POST['delete'])){
        $exec = mysqli_query($con,"update takeaway_user set status = 1 where tuid = $id");
        if($exec){
            email($id);
        }
        else    
            echo mysqli_error($con);
    }
    if(isset($_POST['cancel'])){
        header("location:view_takeaway_order.php");
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
        <title>Banquet Cancel Order</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" src="extensions/fixed-columns/bootstrap-table-fixed-columns.css">
        <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"		integrity= "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" /> 
    	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"			integrity= "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"	crossorigin="anonymous"> 
    	</script> 
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"> 
    	</script> 
    	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity= "sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"	crossorigin="anonymous"> </script>
        <script src="extensions/fixed-columns/bootstrap-table-fixed-columns.js"></script>
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
			table, th, tr, td{
				text-align: center;
				padding: 5px;
				border-collapse : collapse;
			}
			table tr{
			    overflow: scroll;
			}
			table th{
				background-color: #efefef;
			}
			h1{
				text-align: center;
			}
			a{
				text-decoration: none;
			}
            a :: hover{
                text-decoration: underline;
            }
            
            h2{
                padding: 10px;
                text-align: center;
            }
            .empty{
                padding: 10px;
            }
            .src{
                text-align: center;
                padding: 10px; 
            }
        </style>
    </head>
    <body>
        <h2>Are You Sure You Want To Cancel This Order?</h2>
        <div class="table-responsive">
            <form method="post" action="#">
                <table class="table">
                      <thead>
                          <tr> 
                                <th>No</th>
                                <th>Name </th>
                                <th>E-Mail </th>
                                <th>Mobile</th>
                                <th>Address </th>
                                <th>Date </th>
                                <th>Pickup Time</th>
                                <th>Total Bill</th>
                                <th>Payment Mode</th>
                                <th>View Order </th>
                            </tr>
                            <?php   
                                $exec = mysqli_query($con,"select * from takeaway_user where tuid = $id");
                                while($r = mysqli_fetch_array($exec))
                                {
                                    $tid = $r['tuid'];
                            ?>
                            <tr>
                                <td><?php echo $r['tuid']; ?></td>
                                <td><?php echo $r['name']; ?></td>
                                <td><?php echo $r['email']; ?></td>
                                <td><?php echo $r['mobile_no']; ?></td>
                                <td><?php echo $r['address']; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($r['date_time'])); ?></td>
                                <td><?php echo date('h:i:s a',strtotime($r['time_of_delivery'])); ?></td>
                                <td><?php echo $r['total_bill']; ?></td>
                                <td><?php echo $r['payment_mode']; ?></td>
                                <td><a href="view_order_details.php?tuid=<?php echo $r['tuid']; ?>" > View </a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                </table>
                <button  style="margin-left: 40%; background-color: #f21f13; color: white;" type="submit" name="delete"   class="btn btn-primary"> Delete </button>
               <form method="post" action="#">
                   <button  style="margin-left: 40%;" type="submit" name="cancel"   class="btn btn-primary"> Cancel </button>
               </form>
            </form>
    </body>
</html>
<?php
    function email($id){
        require 'db.php';
        $e = mysqli_query($con,"select * from takeaway_user where tuid = $id");
        $subject = 'Takeaway Cancellation - Yajman Restaurant & Banquet';
        
                while($r = mysqli_fetch_array($e)){
                    $to = $r['email'];
                    $name = $r['name'];
                    $date = $r['date_time'];
                    $pick = $r['time_of_delivery'];
                    $total = $r['total_bill'];
                    
                    $message =  '
                    <!DOCTYPE html>
                    <html lang="en">
                      <head>
                        <meta charset="UTF-8" />
                        <title>Food Order Details : Yajman Restaurant</title>
                      </head>
                    
                      <body>
                        <head>
                           <title>Food Order Details : Yajman Restaurant</title>
                          <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                          <meta content="width=device-width" name="viewport" />
                          <style type="text/css">
                            @font-face {
                                font-family: &#x27;
                    
                                font-weight: 700;
                                font-style: normal;
                                src: local(&#x27; Postmates Std Bold&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-bold.woff) format(&#x27; woff&#x27; );
                            }
                    
                            @font-face {
                                font-family: &#x27;
                                Postmates Std&#x27;
                                ;
                                font-weight: 500;
                                font-style: normal;
                                src: local(&#x27; Postmates Std Medium&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-medium.woff) format(&#x27; woff&#x27; );
                            }
                    
                            @font-face {
                                font-family: &#x27;
                                Postmates Std&#x27;
                                ;
                                font-weight: 400;
                                font-style: normal;
                                src: local(&#x27; Postmates Std Regular&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-regular.woff) format(&#x27; woff&#x27; );
                            }
                          </style>
                          <style media="screen and (max-width: 680px)">
                            @media screen and (max-width: 680px) {
                              .page-center {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                              }
                    
                              .footer-center {
                                padding-left: 20px !important;
                                padding-right: 20px !important;
                              }
                            }
                          </style>
                        </head>
                    
                        <body>
                          <table
                            cellpadding="0"
                            cellspacing="0"
                            style="
                              width: 100%;
                              height: 100%;
                              background-color: #f4f4f5;
                              text-align: center;
                            "
                          >
                            <tbody>
                              <tr>
                                <td style="text-align: center">
                                  <table
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    id="body"
                                    style="
                                      background-color: #fff;
                                      width: 100%;
                                      max-width: 680px;
                                      height: 100%;
                                    "
                                  >
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="page-center"
                                            style="
                                              text-align: left;
                                              padding-bottom: 16px;
                                              width: 100%;
                                              padding-left: 103px;
                                              padding-right: 103px;
                                            "
                                          >
                                            <tbody>
                                              <tr>
                                                <td
                                                  style="
                                                    padding-top: 24px;
                                                    display: flex;
                                                    justify-content: center;
                                                  "
                                                >
                                                  <img
                                                    src="https://thewebmate.in/yajman-01/emails/logo-y.jpg"
                                                    style="width: 184px; height: 62px"
                                                  />
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="
                                                    padding-top: 45px;
                                                    -ms-text-size-adjust: 100%;
                                                    -webkit-font-smoothing: antialiased;
                                                    -webkit-text-size-adjust: 100%;
                                                    color: #000000;
                                                    font-family: "Postmates Std",
                                                    "Helvetica", -apple-system,
                                                    BlinkMacSystemFont, "Segoe UI",
                                                    "Roboto", "Oxygen", "Ubuntu",
                                                    "Cantarell", "Fira Sans", "Droid Sans",
                                                    "Helvetica Neue"
                                                      sans-serif;
                                                    font-size: 35px;
                                                    text-align: center;
                                                    font-smoothing: always;
                                                    font-style: normal;
                                                    font-weight: 600;
                                                    letter-spacing: -2.6px;
                                                    line-height: 52px;
                                                    mso-line-height-rule: exactly;
                                                    text-decoration: none;
                                                  "
                                                >
                                                  Thank you for your order !
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            style="width: 100%"
                                          >
                                            <tbody>
                                              <tr>
                                                <td style="padding-top: 24px; padding-bottom: 24px">
                                                  <img
                                                    src="https://yajmanrestaurant.com/images/takeaway.jpg"
                                                    style="width: 65%; border-radius: 20px"
                                                  />
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="page-center"
                                            style="
                                              text-align: left;
                                              padding-bottom: 72px;
                                              width: 100%;
                                              padding-left: 103px;
                                              padding-right: 103px;
                                            "
                                          >
                                            <tbody>
                                              <tr>
                                                <td colspan="2">
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            padding-top: 24px;
                                                            max-width: 100px;
                                                            padding-right: 24px;
                                                          "
                                                        >
                                                          <img
                                                            src="https://f0.pngfuel.com/png/724/795/envelope-logo-png-clip-art.png"
                                                            style="
                                                              max-width: 88px;
                                                              border-radius: 44px;
                                                            "
                                                          />
                                                        </td>
                                                        <td
                                                          style="
                                                            padding-top: 24px;
                                                            -ms-text-size-adjust: 100%;
                                                            -ms-text-size-adjust: 100%;
                                                            -webkit-font-smoothing: antialiased;
                                                            -webkit-text-size-adjust: 100%;
                                                            color: #000000;
                                                            font-family: "Postmates Std",
                                                              "Helvetica", -apple-system,
                                                              BlinkMacSystemFont, "Segoe UI",
                                                              "Roboto", "Oxygen", "Ubuntu",
                                                              "Cantarell", "Fira Sans", "Droid Sans",
                                                              "Helvetica Neue", sans-serif;
                                                            font-size: 18px;
                                                            font-smoothing: always;
                                                            font-style: normal;
                                                            font-weight: 400;
                                                            letter-spacing: -0.48px;
                                                            line-height: 32px;
                                                            mso-line-height-rule: exactly;
                                                            text-decoration: none;
                                                            vertical-align: middle;
                                                            width: 100%;
                                                          "
                                                        >
                                                          <span style="font-weight: 600;">Dear '.$name.',</span>
                                                          your food order from Yajman
                                                          Restaurant on <b>'.date('d/m/Y',strtotime($date)).' '.date('h:i:s A',strtotime($pick)).'</b> has cancelled.
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="
                                                      font-size: 14px;
                                                      margin: 0px auto;
                                                      border-collapse: collapse;
                                                      margin-top: 50px;
                                                    "
                                                    width="100%"
                                                  >
                                                  <tbody>
                                                    <tr>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     "> Name  </td>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     "> Price </td>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     "> Quantity </td>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     ">Total Price </td>
                                                    </tr>
                                                    ';
                                                    $bill = mysqli_query($con,"select * from food_order where userid = $id");
                                        
                                                    while($r1 = mysqli_fetch_array($bill)){
                                                        $quantity = $r1['quantity'];
                                                        $mid = $r1['mid'];
                                                        $menu = mysqli_query($con,"select * from menu where mid = $mid");
                                                      
                                                        while($r2 = mysqli_fetch_array($menu))
                                                        {
                                                          $price = $r2['price'];
                                                          $message .= '<tr
                                                          style="
                                                            margin: 0;
                                                            border-radius: 20px;
                                                            border: 0px solid rgba(0, 0, 0, 0.212);
                                                            height: 20px;
                                                            width: 100%;
                                                            background-color: #fde1ff;
                                                          ">
                                                        <td align="left"
                                                          style="
                                                            font-weight: 600;
                                                            margin: 0;
                                                            vertical-align: top;
                                                            padding-left: 20px;
                                                            border-top-left-radius: 10px;
                                                            border-bottom-left-radius: 10px;
                                                            border: 0px solid;
                                                          ">'.
                                                          $r2['name'].'
                                                          </td>
                                                          <td
                                                          align="center"
                                                          style="margin: 0; vertical-align: top" >'.
                                                          $price.'
                                                          </td>
                                                          <td
                                                            align="center"
                                                            style="margin: 0; vertical-align: top" >'.
                                                            $quantity.'
                                                         </td>
                                                          <td
                                                            align="right"
                                                            style="
                                                              margin: 0;
                                                              vertical-align: top;
                                                              border-top-right-radius: 10px;
                                                              padding-right: 20px;
                                                              border-bottom-right-radius: 10px;
                                                            " >₹ '.
                                                            number_format(($quantity * $price)).'
                                                          </td>
                                                      </tr>';
                                                        }
                                                    }
                                                  
                                                 $message .= '</tbody>                                    
                                                </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="padding-top: 48px; padding-bottom: 48px"
                                                >
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            width: 100%;
                                                            height: 1px;
                                                            max-height: 1px;
                                                            background-color: #e1e4eb;
                                                          "
                                                        ></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="
                                                    -ms-text-size-adjust: 100%;
                                                    -webkit-font-smoothing: antialiased;
                                                    -webkit-text-size-adjust: 100%;
                                                    color: #000000;
                                                    font-family: "Postmates Std",
                                                    "Helvetica", -apple-system,
                                                    BlinkMacSystemFont, "Segoe UI",
                                                    "Roboto", "Oxygen", "Ubuntu",
                                                    "Cantarell", "Fira Sans", "Droid Sans",
                                                    "Helvetica Neue",
                                                      sans-serif;
                                                    font-size: 30px;
                                                    text-align:center;
                                                    font-smoothing: always;
                                                    font-style: normal;
                                                    font-weight: 500;
                                                    letter-spacing: -0.78px;
                                                    line-height: 40px;
                                                    mso-line-height-rule: exactly;
                                                    text-decoration: none;
                                                  "
                                                >
                                                  Total Payable Bill : ₹ '.$total.'
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="padding-top: 48px; padding-bottom: 48px"
                                                >
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            width: 100%;
                                                            height: 1px;
                                                            max-height: 1px;
                                                            background-color: #e1e4eb;
                                                          "
                                                        ></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td style="padding-right: 25px">
                                                          <img
                                                            src="https://d1pgqke3goo8l6.cloudfront.net/5ehc9vX9QQOff6gVsgah_start.png"
                                                            style="
                                                              max-width: 16px;
                                                              padding-top: 3px;
                                                              vertical-align: top;
                                                            "
                                                          />
                                                        </td>
                                                        <td
                                                          style="
                                                            -ms-text-size-adjust: 100%;
                                                            -ms-text-size-adjust: 100%;
                                                            -webkit-font-smoothing: antialiased;
                                                            -webkit-text-size-adjust: 100%;
                                                            color: #9095a2;
                                                            font-family: "Postmates Std",
                                                            "Helvetica", -apple-system,
                                                            BlinkMacSystemFont, "Segoe UI",
                                                            "Roboto", "Oxygen", "Ubuntu",
                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                            "Helvetica Neue", sans-serif;
                                                            font-size: 16px;
                                                            font-smoothing: always;
                                                            font-style: normal;
                                                            font-weight: 400;
                                                            letter-spacing: -0.24px;
                                                            line-height: 24px;
                                                            mso-line-height-rule: exactly;
                                                            text-decoration: none;
                                                            vertical-align: top;
                                                            width: 100%;
                                                            min-width: 225px;
                                                          "
                                                        >
                                                          <span
                                                            style="font-weight: 600; color: #000000"
                                                            >'.$name.'</span
                                                          ><br />'.
                                                          $r['email'].'<br />
                    
                                                          +91 '.$r['mobile_no'].'
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td
                                                          style="
                                                            padding-top: 10px;
                                                            vertical-align: top;
                                                          "
                                                        >
                                                        <a href="https://maps.app.goo.gl/utNeRhF8oLHwJB9F7" target="_blank">
                                                          <img
                                                            src="https://d1pgqke3goo8l6.cloudfront.net/KYzSiQPnSgSDHn2bv34U_Pin.png"
                                                            style="max-width: 16px"
                                                          />
                                                          </a>
                                                        </td>
                                                        <td
                                                          style="
                                                            -ms-text-size-adjust: 100%;
                                                            -ms-text-size-adjust: 100%;
                                                            -webkit-font-smoothing: antialiased;
                                                            -webkit-text-size-adjust: 100%;
                                                            color: #9095a2;
                                                            font-family: "Postmates Std",
                                                            "Helvetica", -apple-system,
                                                            BlinkMacSystemFont, "Segoe UI",
                                                            "Roboto", "Oxygen", "Ubuntu",
                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                            "Helvetica Neue", sans-serif;
                                                            font-size: 16px;
                                                            font-smoothing: always;
                                                            font-style: normal;
                                                            font-weight: 400;
                                                            letter-spacing: -0.24px;
                                                            line-height: 24px;
                                                            mso-line-height-rule: exactly;
                                                            text-decoration: none;
                                                            vertical-align: top;
                                                            width: 100%;
                                                            padding-top: 8px;
                                                            min-width: 225px;
                                                          "
                                                        >
                                                          <span
                                                            style="font-weight: 600; color: #000000"
                                                            >Yajman Restaurant & Banquet</span
                                                          ><br />
                                                          Yajman Restaurant, Dharm Nagar 2, Sabarmati, Ahmedabad
                    
                                                          <br />
                                                          +91 84690 00683, +91 81281 41047the
                                                          <br />
                                                            <a href="mailto:restaurantyajman@gmail.com" target="_blank"><span
                                                              style="font-weight: 500; color: #9095a2; text-decoration: none;"
                                                              >restaurantyajman@gmail.com </span></a>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <!-- <table cellpadding="0" cellspacing="0"
                                                                style="text-align: center; width: 100%; background-color: #000000; padding: 40px; margin-bottom: 100px; max-width: 540px; margin-left: auto; margin-right: auto;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="color: #ffffff; font-family: "Postmates Std",
                                                                            "Helvetica", -apple-system,
                                                                            BlinkMacSystemFont, "Segoe UI",
                                                                            "Roboto", "Oxygen", "Ubuntu",
                                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                                            "Helvetica Neue"; font-size: 32px; font-weight: 400; letter-spacing: 0; line-height: 35px; vertical-align: top; padding-bottom: 15px; text-align: center">
                                                                            Give $100 Get $100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="color: #ffffff; font-family: "Postmates Std",
                                                                            "Helvetica", -apple-system,
                                                                            BlinkMacSystemFont, "Segoe UI",
                                                                            "Roboto", "Oxygen", "Ubuntu",
                                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                                            "Helvetica Neue"; font-size: 18px; font-weight: 400; letter-spacing: 0; line-height: 21px; vertical-align: top; padding-bottom: 30px; text-align: center">
                                                                            Share your code and give $100 in delivery fee credit to your
                                                                            friends.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="color: #ffffff; font-family: "Postmates Std",
                                                                            "Helvetica", -apple-system,
                                                                            BlinkMacSystemFont, "Segoe UI",
                                                                            "Roboto", "Oxygen", "Ubuntu",
                                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                                            "Helvetica Neue"; font-size: 72px; font-weight: 600; letter-spacing: 0; vertical-align: top; padding-bottom: 45px; text-transform: uppercase; word-break: break-all">
                                                                            RGE1</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: top;">
                                                                            <a href="#"
                                                                                style="display: block; background-color: #00cc99; width: 100%; max-width: 300px; color: #ffffff; font-family: "Postmates Std",
                                                                                "Helvetica", -apple-system,
                                                                                BlinkMacSystemFont, "Segoe UI",
                                                                                "Roboto", "Oxygen", "Ubuntu",
                                                                                "Cantarell", "Fira Sans", "Droid Sans",
                                                                                "Helvetica Neue"; font-size: 12px; font-weight: 600; letter-spacing: 0.7px; line-height: 56px; text-decoration: none; vertical-align: top; border-radius: 28px; text-transform: uppercase; text-align: center; margin-left: auto; margin-right: auto"
                                                                                universal="true" target="_blank">Share Code</a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody
                                                            </table> -->
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    id="footer"
                                    style="
                                      background-color: #b13476;
                                      width: 100%;
                                      max-width: 680px;
                                      height: 100%;
                                    "
                                  >
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="footer-center"
                                            style="
                                              text-align: left;
                                              width: 100%;
                                              padding-left: 103px;
                                              padding-right: 103px;
                                            "
                                          >
                                            <tbody>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="
                                                    padding-top: 72px;
                                                    padding-bottom: 24px;
                                                    width: 100%;
                                                  "
                                                >
                                                  <span
                                                    style="
                                                      color: white;
                                                      font-size: 26px;
                                                      font-weight: 900;
                                                    "
                                                    >Yajman Restaurant & Banquet</span
                                                  >
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="padding-top: 24px; padding-bottom: 48px"
                                                >
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            width: 100%;
                                                            height: 1px;
                                                            max-height: 1px;
                                                            background-color: #eaecf2;
                                                            opacity: 0.19;
                                                          "
                                                        ></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  style="
                                                    -ms-text-size-adjust: 100%;
                                                    -ms-text-size-adjust: 100%;
                                                    -webkit-font-smoothing: antialiased;
                                                    -webkit-text-size-adjust: 100%;
                                                    color: #e1e1e1;
                                                    font-family: "Postmates Std",
                                                    "Helvetica", -apple-system,
                                                    BlinkMacSystemFont, "Segoe UI",
                                                    "Roboto", "Oxygen", "Ubuntu",
                                                    "Cantarell", "Fira Sans", "Droid Sans",
                                                    "Helvetica Neue",
                                                      sans-serif;
                                                    font-size: 16px;
                                                    font-smoothing: always;
                                                    font-style: normal;
                                                    font-weight: 400;
                                                    letter-spacing: 0;
                                                    line-height: 24px;
                                                    mso-line-height-rule: exactly;
                                                    text-decoration: none;
                                                    vertical-align: top;
                                                    width: 100%;
                                                  "
                                                >
                                                  If you have any questions or concerns, we are here
                                                  to help.
                                                  <a
                                                    data-click-track-id="7157"
                                                    href="mailto:restaurantyajman@gmail.com"
                                                    style="font-weight: 600; color: #fff"
                                                    target="_blank"
                                                    >Contact Us Now</a
                                                  >
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="height: 72px"></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </body>
                      </body>
                    </html>'; 
    }
            $subject = "Takeaway Cancellation - Yajman Restaurant & Banquet";
            $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <info@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message,$headers)) {
			    header("location:view_takeaway_order.php");
			}
			else {
              echo "<script>alert('Oops!, Mail Not sent');</script>";
            }
    }
?>