<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sunday Progress Email</title>
    <!-- Designed by https://github.com/kaytcat -->
    <!-- Header image designed by Freepik.com -->
    <!--
    >>>>>>>>> CHANGING PROGRESS STEP IMAGES <<<<<<<<<<<<<<<
    -If you would like to change the progress step images from 3 to any other step please view the html comments below.
    -You just need to switch the provided image url's.
    -->


    <style type="text/css">
    /* Take care of image borders and formatting */

    img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
    a img { border: none; }
    table { border-collapse: collapse !important; }
    #outlook a { padding:0; }
    .ReadMsgBody { width: 100%; }
    .ExternalClass {width:100%;}
    .backgroundTable {margin:0 auto; padding:0; width:100% !important;}
    table td {border-collapse: collapse;}
    .ExternalClass * {line-height: 115%;}


    /* General styling */

    td {
      font-family: Arial, sans-serif;
    }

    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%;
      height: 100%;
      color: #6f6f6f;
      font-weight: 400;
      font-size: 18px;
    }


    h1 {
      margin: 10px 0;
    }

    a {
      color: #27aa90;
      text-decoration: none;
    }


    .body-padding {
      padding: 0 75px;
    }


    .force-full-width {
      width: 100% !important;
    }

    .columns, .colHeader {
      margin-left: auto;
      margin-right: auto;
      border: 1px solid;
      border-color: #E7E7E7;
      border-collapse: collapse;
    }

    </style>

    <style type="text/css" media="screen">
        @media screen {
          @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900);
          /* Thanks Outlook 2013! */
          * {
            font-family: 'Source Sans Pro', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
          }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 599px)">
      /* Mobile styles */
      @media only screen and (max-width: 599px) {

        table[class*="w320"] {
          width: 320px !important;
        }

        td[class*="w320"] {
          width: 280px !important;
          padding-left: 20px !important;
          padding-right: 20px !important;
        }

        img[class*="w320"] {
          width: 250px !important;
          height: 67px !important;
        }

        td[class*="mobile-spacing"] {
          padding-top: 10px !important;
          padding-bottom: 10px !important;
        }

        *[class*="mobile-hide"] {
          display: none !important;
          width: 0 !important;
        }

        *[class*="mobile-br"] {
          font-size: 12px !important;
        }

        td[class*="mobile-center"] {
          text-align: center !important;
        }

        table[class*="columns"] {
          width: 100% !important;  
        }

        td[class*="column-padding"] {
          padding: 0 50px !important;
        }

      }
    </style>
  </head>
  <body  offset="0" class="body" style="padding:0; margin:0; display:block; background:#eeebeb; -webkit-text-size-adjust:none" bgcolor="#eeebeb">
  <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
      <td align="center" valign="top" style="background-color:#eeebeb" width="100%">

      <center>

        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td align="center" valign="top">

            <table cellspacing="0" cellpadding="0" class="force-full-width" style="background-color:#F6C510; margin: 0px">
              <tr>
                <td style="background-color:#F6C510;">

                  <table cellspacing="0" cellpadding="0" class="force-full-width">
                    <tr>
                      <td style="font-size:40px; font-weight: 600; color: #ffffff; text-align:center;" class="mobile-spacing">
                      <div class="mobile-br">&nbsp;</div>
                        Loan
                      <br>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size:24px; text-align:center; padding: 0 75px; color:#6f6f6f;" class="w320 mobile-spacing; ">
                          A client wants to avail Financial Assistance!
                      </td>
                    </tr>
                  </table>

                  <table cellspacing="0" cellpadding="0" width="600" class="force-full-width">
                    <tr>
                      <td>
                        <center>
                        <img src="https://cdn.discordapp.com/attachments/696238130596020308/941953362797133844/FA.png" style="max-width:100%; display:block;">
                        </center>
                        
                      </td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>
           
            <table cellspacing="0" cellpadding="" class="force-full-width" style="background-color: white;">
              <tr >
                  <center>
                  <h1 style="">
                   <?php echo $content->loanId ?>
                  </h1>
                  </center>
              </tr>
              <tr >
                  <center>
                  <h3 style="color: grey;">
                    <?php echo $createDate ?>
                  </h3>
                  </center>
              </tr>
              <tr>
                <td style="background-color:#ffffff;">
                  <center>
                  <table class="columns" cellspacing="0" cellpadding="0" width="75%" align="center" >
                      <?php 
                    
                          echo '
                            <tr>
                                <td class="colHeader" style="font-weight: bold; padding-top: 10px; text-align: center;">
                                   Loan Id
                                </td>
                                <td class="colHeader" style="color:#f3a389; padding-top: 10px; text-align: center;">
                                  '.$content->loanId.'
                                </td>
                            </tr>
                            <tr>
                              <td class="colHeader" style="font-weight: bold; padding-top: 10px; text-align: center;">
                                  Name
                              </td>
                              <td class="colHeader" style="color:#f3a389; padding-top: 10px; text-align: center;">
                                 '.$content->firstName.' '.$content->lastName.'
                              </td>
                            </tr>
                            <tr>
                              <td class="colHeader" style="font-weight: bold; padding-top: 10px; text-align: center;">
                                  Email
                              </td>
                              <td class="colHeader" style="color:#f3a389 !important; padding-top: 10px; text-align: center;">
                               '.$content->emailAddress.'
                              </td>
                            </tr>
                          ';
                      ?>
                  </table>
                  </center>
                </td>
              </tr>
            </table>

            <table style="margin:0 auto;" cellspacing="0" cellpadding="0" class="force-full-width" bgcolor="#ffffff">
              <tr>
                <td style="text-align:center; margin:0 auto;">
                    <div>
                    <br>
                      <center>
                      <a href="<?php echo base_url('admin/acceptFA/'.$content->loanId.'') ?>"
                        style="background-color:green;color:#ffffff;display:inline-block;font-family:'Source Sans Pro', Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:220px;-webkit-text-size-adjust:none;">Approve</a>
                        <a href="<?php echo base_url('admin/rejectFA/'.$content->loanId.'') ?>"
                        style="background-color:#f5774e;color:#ffffff;display:inline-block;font-family:'Source Sans Pro', Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:220px;-webkit-text-size-adjust:none;">Reject</a>
                      </center>
                      <br>
                    </div>
                </td>
              </tr>
            </table>

            <table cellspacing="0" cellpadding="0" bgcolor="#363636"  class="force-full-width">
              <tr>
                <td style="background-color:#363636; text-align:center;">
                <br>
                <br>
                <br>
                <br>
                </td>
              </tr>
              <tr>
                <td style="color:#f0f0f0; font-size: 14px; text-align:center; padding-bottom:4px;">
                  ODMS Enterprise © 2022 All Rights Reserved
                </td>
              </tr>
              <tr>
                <td style="color:#27aa90; font-size: 14px; text-align:center;">
                  <a href="<?php echo base_url('')?>">ODMS Website</a> | <a href="<?php echo base_url('contactus')?>">Contact Us</a></a>
                </td>
              </tr>
              <tr>
                <td style="font-size:12px;">
                  &nbsp;
                </td>
              </tr>
            </table>

            </td>
          </tr>
        </table>
      </center>
      </td>
    </tr>
  </table>
  <p style="display: none;">
      <?php echo time().date('y-m-d')?>
  </p>
  </body>
</html>