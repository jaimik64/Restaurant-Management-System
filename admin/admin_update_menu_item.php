<?php
    session_start();
    $bbid = $_GET['Bbid'];
    $menu = $_SESSION['menu_amount'];
    $str = '';
            require 'db.php';
            if(isset($_POST['update'])){
                
                $detail = $_POST['detail']; 
                
                if($detail != '' && $_POST['price'] != ''){
                
                    $price = $_POST['price'];
                    $desc = $_POST['description'];
                    $query = "insert into banquet_menu(Booking_id,details,price,description) values($bbid,'$detail',$price,'$desc')";
                    $q = mysqli_query($con,$query);
                    
                    if($q){
                        /* Retrive Person details to count total bill */
                        $q2 = mysqli_query($con,"select * from banquet_booking_user where Bbid = $bbid");
                        $rr = mysqli_fetch_array($q2);
                        $person = $rr['person'];
                        $t = $person * $price; // total bil retrieved
                        
                        // check installment and calculate installment
                        $installment = mysqli_query($con,"select * from banquet_installment where Booking_id = $bbid");
                        while($r = mysqli_fetch_array($installment)){
                            $total_installment +=  $r['payment_amount'];
                        }
                        $t1 = $t - $total_installment;
                        
                        $q1 = mysqli_query($con,"update banquet_booking_user set menu_plan = $price, total_bill = $t, remaining_payment = $t1 where Bbid = $bbid");
                        if($q1){
                           //header("location:view_banquet_book.php");
                           email($mail,$bbid,$price);
                        }
                        else{
                          echo mysqli_error($con);
                        }
                        //echo '2';
                    }
                    else{
                        echo mysqli_error($con);
                    }
        
                }
                else{
                    echo '<script>alert("Enter Price");</script>';
                }
            }
?>
<html>
    <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            input, span{
                display: inline;
            }
            td{
                padding-left: 20px;
                padding-right: 20px;
            }
            .menu-item{
                border: 2px solid black;
                border-radius: 5px;
                margin: 5px;
                text-align: center;
            }
            .m-item{
                border: 2px solid-black;
                border-radius: 5px;
                text-align: center;
            }
            .update{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <center><h2>Selected Menu Plan : <?php echo $menu; ?></h2></center>
        <div class="menu-item">
            <form method="post" action="#">
            <table>
               <tr style="margin-top: 10px;">
                   <td>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="drink1" value="Drink-1" onclick="change()" class="custom-control-input" id="drink1"/>  
                          <label class="custom-control-label" for="drink1">Drink 1</label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="drink2" value="Drink-2" onclick="change()" class="custom-control-input" id="drink2"/>
                            <label class="custom-control-label" for="drink2">Drink 2</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="soup1" value="Soup-1" onclick="change()" class="custom-control-input" id="soup1"/>
                            <label class="custom-control-label" for="soup1">Soup 1</label>
                        </div>     
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="soup2" value="Soup-2" onclick="change()" class="custom-control-input" id="soup2"  />
                            <label class="custom-control-label" for="soup2">Soup 2</label>    
                        </div>           
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="starter" id = "starter" value="Starter" onclick="change()" class="custom-control-input" />
                            <label class="custom-control-label" for="starter">Starter</label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="salad1" id = "salad1" value="Salad-1" onclick="change()" class="custom-control-input"/>  
                            <label class="custom-control-label" for="salad1">Salad 1</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="salad2" id = "salad2" value="Salad-2" onclick="change()" class="custom-control-input"/>    
                            <label class="custom-control-label" for="salad2">Salad 2</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="farsan" id = "farsan" value="Farsan" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="farsan">Farsan</label>
                        </div> 
                   </td>
               </tr>
               <tr>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="snack" id = "snack" value="Snacks" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="snack">Snack</label>
                        </div>
                   </td>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="baked" id = "baked" value="Baked-Dish" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="baked">Baked Dish</label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="italian" value="Italian" id="italian" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="italian">Italian</label>
                        </div>   
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="mexican" id = "mexican" value="Mexican" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="mexican">Mexican</label>
                        </div>           
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="veggie1" id="veggie1" value="Veggies-1" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="veggie1">Veggies 1</label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="veggie2" id="veggie2" value="Veggies-2" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="veggie2">Veggies 2</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="veggie3" id="veggie3" value="Veggies-3" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="veggie3">Veggied 3</label>
                        </div>                       
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="paneer" id="paneer" value="Paneer" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="paneer">Paneer</label>
                        </div>   
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="paneers" onclick="change()" id="paneers" value="Paneer(Special)" class="custom-control-input"/>
                            <label class="custom-control-label" for="paneers">Paneer (Special)</label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="dal" id="dal" value="Dal" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="dal">Dal</label>
                        </div>                       
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="kadhi" id="kadhi" value="Kadhi" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="kadhi">Kadhi</label>
                        </div>                       
                   </td>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rice" id="rice" onclick="change()" value="Rice" class="custom-control-input"/>
                            <label class="custom-control-label" for="rice">Rice</label>
                        </div>
                   </td>
               </tr>
               <tr>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="pulav" id="pulav" value="Pulav" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="pulav">Pulav</label>
                        </div>   
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="biryani" id="biryani" value="Biryani" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="biryani">Biryani</label>
                        </div>     
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="roti" id="roti" value="Roti" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="roti">Roti</label>
                        </div>           
                   </td>
                   <td>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="naan" id="naan" value="Naan" onclick="change()" class="custom-control-input"/>
                        <label class="custom-control-label" for="naan">Naan</label>
                    </div> 
                   </td>
               </tr>
               <tr>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="sweet-r" id="sweet-r" onclick="change()" value="Sweet(Regular)" class="custom-control-input"/>
                            <label class="custom-control-label" for="sweet-r">Sweet (Regular)</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="tawa-roti" id="tawa-roti" value="Tawa-Roti" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="tawa-roti">Tawa Roti</label>
                        </div>               
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="kulcha" id="kulcha" value="Kulcha" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="kulcha">Kulcha</label>
                        </div>               
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                             <input type="checkbox" name="paratha" id="paratha" value="Paratha" onclick="change()" class="custom-control-input"/>
                             <label class="custom-control-label" for="paratha">Paratha</label>
                        </div> 
                   </td>
               </tr>
               <tr>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="ice-creams" id="ice-creams" onclick="change()" value="Ice-Cream_With_Three_Sauce" class="custom-control-input"/>
                            <label class="custom-control-label" for="ice-creams">Plain Ice-Cream With Three Sauce (Vanilla / Strawberry/Cherry)(Limited)</label>
                        </div>                       
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="ice-cream" id="ice-cream" onclick="change()" value="Ice-Cream_With_Two_Sauce" class="custom-control-input"/> 
                            <label class="custom-control-label" for="ice-cream">Ice-Cream (Vanilla / Strawberry) (Limited)</label>
                        </div>                       
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                             <input type="checkbox" name="juice" id="juice" value="Juice/Mocktails" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="juice">Juice / Moctails</label>
                        </div>           
                   </td>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="special" id="special" value="Special-Sweet" onclick="change(this)" class="custom-control-input"/>
                            <label class="custom-control-label" for="special">Special Sweet</label>
                        </div> 
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="custom-control custom-checkbox">
                             <input type="checkbox" name="dessert" id="dessert" value="Dessert" onclick="change()" class="custom-control-input"/>
                             <label class="custom-control-label" for="dessert">Dessert</label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="soup" id="soup" value="Soup" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="soup">Soup</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="vegetable" id="vegetable" value="Vegetable" onclick="change()"class="custom-control-input"/>
                            <label class="custom-control-label" for="vegetable">Vegetable</label> 
                        </div> 
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="starter" id="starter/farsan" value="Starter" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="starter">Starter / Farasan</label>
                        </div>           
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="tea" id="tea" onclick="change()" value="Tea/Coffee" class="custom-control-input" />
                            <label class="custom-control-label" for="tea">Tea / Coffee </label>
                        </div>
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="chaat" id="chaat" value="Chaat" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="chaat">Chaat</label>
                        </div>           
                   </td>
                   <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="butter" id="butter" value="Butter-Milk" onclick="change()" class="custom-control-input"/>
                            <label class="custom-control-label" for="butter">Butter Milk</label>
                        </div>                       
                   </td>
               </tr>
            </table>
            
            <button name="submit" id="submit" class="btn btn-info" style="margin-top: 10px;">View Details</button>
        </form>
        </div>
        
        <div id="update">
            <form method="post" action="#">
                    <div class="menu-item">
                        <label style="margin-bottom: -3%;">Selected Items</label>
                        <textarea rows="7" cols="50" name="detail" class="form-control m-item" placeholder="Selected Items" style="margin: 2%; height: 15%; width: 95%;" readonly required>
                        <?php 
                                if(isset($_POST['submit'])){
                                    $str = $_POST['drink1']." ".$_POST['drink2']." ".$_POST['soup1']." ".$_POST['soup2']." ".$_POST['starter']." ".$_POST['salad1']." ".$_POST['salad2']." ".$_POST['farsan']." ".$_POST['snack']." ".$_POST['baked']." ".$_POST['italian']." ".$_POST['mexican']." ".$_POST['veggie1']." ".$_POST['veggie2']." ".$_POST['veggie3']." ".$_POST['paneer']." ".$_POST['paneers']." ".$_POST['dal']." ".$_POST['kadhi']." ".$_POST['rice']." ".$_POST['pulav']." ".$_POST['biryani']." ".$_POST['roti']." ".$_POST['naan']." ".$_POST['tawa-roti']." ".$_POST['kulcaha']." ".$_POST['paratha']." ".$_POST['sweet-r']." ".$_POST['ice-cream']." ".$_POST['ice-creams']." ".$_POST['juice']." ".$_POST['dessert']." ".$_POST['soup']." ".$_POST['vegetable']." ".$_POST['tea']." ".$_POST['chaat']." ".$_POST['butter']." ".$_POST['special'];
                                    //$str.$_POST['drink1'].$_POST['drink2'].$_POST['soup1'].$_POST['soup2'].$_POST['starter'].$_POST['salad1'].$_POST['salad2'].$_POST['farsan'].$_POST['snack'].$_POST['baked'].$_POST['italian'].$_POST['mexican'].$_POST['veggie1'].$_POST['veggie2'].$_POST['veggie3'].$_POST['paneer'].$_POST['paneers'].$_POST['dal'].$_POST['kadhi'].$_POST['rice'].$_POST['pulav'].$_POST['biryani'].$_POST['roti'].$_POST['naan'].$_POST['tawa-roti'].$_POST['kulcaha'].$_POST['paratha'].$_POST['sweet-r'].$_POST['ice-cream'].$_POST['ice-creams'].$_POST['juice'].$_POST['dessert'].$_POST['soup'].$_POST['vegetable'].$_POST['starter'].$_POST['tea'].$_POST['chaat'].$_POST['butter'].$_POST['special'];  
                                    echo $str;
                                }
                                else{
                                    echo 'Selected Items Here';
                                }
                        ?>
                        </textarea>
                    </div>
                    
                    <textarea name="description" rows="5" style="margin: 2%; height: 15%; width: 95%;" class="form-control" cols="50" placeholder="Additional Details" ></textarea>
                <div>
                    <input type="text" name="price" style="margin: 2%; height: 5%; width: 95%;" class="form-control" placeholder="New Price" required/>
                </div>
                <center><button name="update" class="btn btn-primary" style="margin-top: 10px;">Confirm Update</button></center>
            </form>
        </div>
    </body>

</html>
<?php
    function email($mail,$bbid,$price){
        require 'db.php';            
            $to = $email;
			$subject = "Banquet Booking Confirmation - Yajman Restaurant & Banquet";
			$exec = mysqli_query($con,"select * from banquet_booking_user where Bbid = $bbid"); 
            while($r= mysqli_fetch_array($exec))
            {   
                    $name = $r['name'];
                    $plan = $r['mbid'];
                    $slot = $r['no_of_slots'];
                    $total = $r['total_bill'];
                    $extra = $r['extra_services'];
                    
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
                                                                                                                                            Booking
                                                                                                                                            Confirmation
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
                                                                                                                                        '.number_format($slot * $price).'
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
                                                                                                                                </tr>';
                                                                                                                                $concat = mysqli_query($con, "select * from banquet_menu where price = $price AND booking_id = $bbid");
                                                                                                                                
                                                                                                                                if(mysqli_num_rows($concat) > 0){
                                                                                                                                
                                                                                                                                    while($r5 = mysqli_fetch_array($concat)){
                                                                                                                                    
                                                                                                                                        $message.'<tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">
        
                                                                                                                                            <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                                Food Plan 
                                                                                                                                            </td>
                                                                                                                                            <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                                 '.
                                                                                                                                                $r5['menu']
                                                                                                                                                .'
                                                                                                                                            </td>
                                                                                                                                        </tr>';    
                                                                                                                                    }    
                                                                                                                                }
                                                                                                                                
                                                                                                                                
                                                                                                                                if($total > (($price * $slot) + ($r['menu_plan'] * $r['person'])))
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
                                                                                                                    
                                                                                                                    $end_message = '</tbody>
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
                                                                                                        Total (Inclusive of Taxes):  ₹ '.number_format($total).'
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
                                                                                                            Congratulations!
                                                                                                            <b>'.$name.'</b>,
                                                                                                            your
                                                                                                            booking for banquet is
                                                                                                            confirmed
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
             
            $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <banquet_yajman@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message.$end_message,$headers)) {
			    //echo "<script>alert('Check Mail. Please Check Spam Folder if you did not receive mail.');</script>";
			    header("location:view_banquet_book.php");
            } else {
              echo "<script>alert('Oops!, Mail Not sent');</script>";
            }
             }
            }
    }
?>