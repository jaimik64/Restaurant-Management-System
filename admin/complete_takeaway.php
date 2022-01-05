<?php
    require 'db.php';
    $id = $_GET['tuid'];

    if(isset($_POST['delete'])){
        $exec = mysqli_query($con,"update takeaway_user set status = 2 where tuid = $id");
        if($exec)
            feedback($id);
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
        <title>Takeaway Complete Order</title>
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
        <h2>Are You Sure You Want To Complete This Order?</h2>
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
                      </thead> 
                      <tbody>
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
                            <td>₹ <?php echo number_format($r['total_bill']); ?></td>
                            <td><?php echo $r['payment_mode']; ?></td>
                            <td><a href="view_order_details.php?tuid=<?php echo $r['tuid']; ?>" > View </a></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                </table>
                <button  style="margin-left: 40%; background-color: #f21f13; color: white;"type="submit" name="delete"   class="btn btn-primary"> Complete </button>
                <form method="post" action="#">
                   <button style="margin-left: 3%;"type="submit" name="cancel" class="btn btn-primary"> Cancel </button>
               </form>
            </form>
    </body>
</html>
<?php
    function feedback($id){
        
        require 'db.php';
        $q = mysqli_query($con,"select * from takeaway_user where tuid = $id");
        while($r= mysqli_fetch_array($q))
            {   
                    $to = $r['email'];
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

                
    			if (mail($to,$subject,$message,$headers)) {
    			    header("location:view_takeaway_order.php");
                } else {
                  echo 'error';
                 echo "<script>alert('Oops!, Feedback Mail Not sent');</script>";
                }
            }
        }    
?>