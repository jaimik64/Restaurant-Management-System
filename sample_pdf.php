<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Sample</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   <div class="container p-4">
     <div class="row">
       <div class="col-6">
         <div class="text-center">
           <h4>
             send mail
           </h4>  
         </div>
       	 	<form method="post">
     		 <div class="form-group">
        		<label for="exampleInputEmail1">Email address</label>
        		<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  			</div>
  			<div class="form-group">
              <label for="exampleInputPassword1">Message</label>
              <input type="text" class="form-control" name="msg" id="exampleInputPassword1">
  			</div>
      
  			<button type="submit" class="btn btn-primary" name="sendmail">Submit</button>
			</form>
       </div>
       <div class="col-6">
         <div class="text-center">
           <h4>
             Create PDF
           </h4>
           
         </div>
         <form method="post">
     		 <div class="form-group">
        		<label for="exampleInputEmail1">Enter Text</label>
        		<input type="text" class="form-control" name="text" id="exampleInputEmail1" aria-describedby="emailHelp">
  			</div>
 
      
  			<button type="submit" class="btn btn-primary" name="create_pdf">Create pdf</button>
			</form>
       </div>
     </div>
  </div>
  
  	<?php
  		if (isset($_POST['sendmail'])) {
          	$email = $_POST['email'];
          	$msg = $_POST['msg'];
          
          	$to = $email;
			$subject = "WebMate ".$msg;

			$message = '<!DOCTYPE html>
<html
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
   
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
      >WE. WANT. YOU. To vote for us! Weve been nominated for a Webby and are
      up against some stiff competition this year.</span
    >
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
                                          href="#"
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

			$headers .= 'From: <digitalwebmate@thewebmate.in>' . "\r\n";
			$headers .= 'Cc: WebMate' . "\r\n";

          
          
			if (mail($to,$subject,$message,$headers)) {
              echo "yes";
            } else {
              echo "no";
            }
          
        }
  ?>
  
  
  <?php
  	 if(isset($_POST["create_pdf"])) {  
      require_once('tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("This is test pdf");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();
       
       
       $content = '';
       $content .= '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice for Banquet</title>
    <style>
        @font-face {
  font-family: SourceSansPro;
  src: url(https://thewebmate.in/yajman-01/pdf_yajman/pdf_takeaway/SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 84px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #b13476;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: bolder;
  margin: 0;
  color:#b13476;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #b13476;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}
#invoice .booking {
  font-size: 1.1em;
  color: #777777;
  font-weight: bold;
}


table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
  text-align: center;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #b13476;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #b13476;
}

table .desc {
  text-align: left;
  width: 900px;
}

table .unit {
  background: #DDDDDD;
}

table .total {
  background: #b13476;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #b13476;
  font-size: 1.4em;
  border-top: 1px solid #b13476; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #b13476;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="https://thewebmate.in/yajman-01/pdf_yajman/pdf_takeaway/logo-y.jpg">
        </div>
        <div id="company">
            <h2 class="name">Yajman Restaurant & Banquet</h2>
            <div>Yajman Restaurant, Dharm Nagar 2 <br>Sabarmati, Ahmedabad</div>
            <div><a href="tel:+918469000683">+91 84690 00683, </a><a href="tel:+918128141047">+91 81281 41047</a></div>
            <div><a href="yajmanrestaurant.com">yajmanrestaurant.com</a></div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">Ramesh Patel</h2>
                <div class="address">B/201, High Rise Tower, Paldi</div>
                <div class="email"><a href="mailto:rpatel21@gmail.com">rpatel21@gmail.com</a></div>
            </div>
            <div id="invoice">
                <h1>Food Takeaway</h1>
                <div class="date">Date of Invoice: 29/09/2020</div>

                <div class="booking">Delivery Time: 6:00 PM</div>
            </div>
        </div>


        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">DESCRIPTION</th>
                    <th class="unit">UNIT PRICE</th>
                    <th class="qty">QUANTITY</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">01</td>
                    <td class="desc">
                        <h3>Pizza</h3>Tasty dish with extra cheese
                    </td>
                    <td class="unit">₹ 90</td>
                    <td class="qty">2</td>
                    <td class="total">₹ 180</td>
                </tr>
                <tr>
                    <td class="no">02</td>
                    <td class="desc">
                        <h3>Kesar Lassi</h3>Enjoy the taste of real Kesar
                    </td>
                    <td class="unit">₹ 40</td>
                    <td class="qty">3</td>
                    <td class="total">₹ 120</td>
                </tr>
                <tr>
                    <td class="no">03</td>
                    <td class="desc">
                        <h3>Pav Bhaji</h3>Delicious Pav Bhaji with tasty salad
                    </td>
                    <td class="unit">₹ 200</td>
                    <td class="qty">1</td>
                    <td class="total">₹ 200</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>₹ 500</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">TAX 18%</td>
                    <td>₹ 90</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>₹ 590</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you for the order!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">This invoice is the digital proof of your booking. Please show this for verification.
            </div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>';
       
       
      $obj_pdf->writeHTML($content);  
       ob_end_clean();
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>