<?php
if(isset($_POST['btnSubmit'])) {
    $booking_number = "BKN" . rand(11111, 99999);
    $tripcost = $_POST['tripcost'];
    $fromName = $_POST['name'];
    $fromEmail = $_POST['email'];
    //$toName = SITENAME;
    $toName = "East and West Intl Tours and Travel";
    $toEmail = SITEEMAIL;
    
    //insert into database
    $data='';
    $data['booking_number'] = $booking_number;
    $data['client_name'] = $_POST['name'];
    $data['tripname'] = $_POST['tripname'];
    $data['tripdate'] = $_POST['chkin'];
    $mydb->insertQuery('tbl_booking',$data);
    ob_start();
    ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2"><strong>Trip Detail</strong></td>
        </tr>
        <tr>
            <td width="150px">Booking Number:</td>
            <td><?php echo $booking_number; ?></td>
        </tr>
        <tr>
            <td width="150px">Trip Name:</td>
            <td><?php echo stripslashes($_POST['tripname']); ?></td>
        </tr>
        <tr>
            <td>Trip Duration:</td>
            <td><?php echo stripslashes($_POST['tripdays']); ?></td>
        </tr>
        <tr>
            <td>Trip Cost:</td>
            <td><!--US$ --><?php echo stripslashes($_POST['tripcost']); ?></td>
        </tr>
        <tr>
            <td>Group Size:</td>
            <td><?php echo stripslashes($_POST['groupsize']); ?></td>
        </tr>
        <tr>
            <td>Arrival Date:</td>
            <td><?php echo stripslashes($_POST['chkin']); ?></td>
        </tr>
        <tr>
            <td>Departure Date:</td>
            <td><?php echo stripslashes($_POST['chkout']); ?></td>
        </tr>
        <tr>
            <td>Airport Pick Up:</td>
            <td><?php echo stripslashes($_POST['apick']); ?></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top:20px;"><strong>Personal Detail</strong></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?php echo stripslashes($_POST['name']); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo stripslashes($_POST['email']); ?></td>
        </tr>
        <tr>
            <td>Contact No:</td>
            <td><?php echo stripslashes($_POST['tel']); ?></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><?php echo stripslashes($_POST['city']); ?></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td><?php echo stripslashes($_POST['country']); ?></td>
        </tr>
        <tr>
            <td>Comments:</td>
            <td><?php echo stripslashes($_POST['comments']); ?></td>
        </tr>
        <tr>
            <td>IP Address:</td>
            <td><?php echo stripslashes($_SERVER['REMOTE_ADDR']); ?></td>
        </tr>
    </table>
    <?php
    $message = ob_get_clean();
    $subject = "Booking - " . stripslashes($_POST['tripname']);
    //echo $message;

    /*if($mydb->sendEmail($toName,$toEmail,$fromName,$fromEmail,$subject,$message))
    {
        $subject2 = "Thank you for Booking with us.";
        $mydb->sendEmail($fromName,$fromEmail,$toName,$toEmail,$subject2,$message);
        $msg = 'Thank you for booking with Us.<br>Your Trip inquiry has been sent to the Sales and Customer Service Division. <br><br><br>We will contact you within 24 hours.';

    }
    else
    {
        $msg = 'Email couldn\'t be sent due to some technical problem. Please Try Again';
    }*/

    $merchantID = "9103331443";
    $invoiceNumber = $booking_number;
    $productDesc = stripslashes($_POST['tripname']).' - '.stripslashes($_POST['tripdays']);
    $tripcost = $_POST['tripcost']*100;
    $amount = str_pad($tripcost, 12, '0', STR_PAD_LEFT);
    //echo $amount;
    $currencyCode = $_POST['currencyCode']; //USD
    $nonSecure = 'Y';
    $signatureString = $merchantID . $invoiceNumber . $amount . $currencyCode . $nonSecure;
    $hashValue = hash_hmac('SHA256', $signatureString, '7VXJI3BH3DYTA1RG5F3HFWRABSCVAG8E', false);
    $hashValue = strtoupper($hashValue);
    $hashValue = urlencode($hashValue);
    $responseUrl='http://nepalholidaytours.com/payment-confirmation.html';
    ?>


    <div class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="triptitle1">Thank you for Booking with Us</h1>
                    </div>
                </div>
                <!--row-->

                <div class="row">

                    <div class="col-md-12">
                        <p>Please make a Payment to confirm your Booking. </p>
                    </div>
                    <!--col-md-12-->
                </div>
                <!--row-->

                <div class="row">
                    <div class="col-md-12">
                        <h2>Payment Option</h1>
                    </div>
                </div>
                <!--row-->


                <div class="row frmbdr">
                    <form name="rform" id="rform" method="post" action="https://hblpgw.2c2p.com/HBLPGW/Payment/Payment/Payment">
                        <div class="col-md-12 col-sm-12 col-xs-12 frmbdr">
                            <div class="form-group">
                                <label for="tripdays" id="lbltripdays">Booking Number or Invoice Number:</label>
                                <input type="text" class="form-control" name="invoiceNo" id="invoiceNo"
                                       value="<?php echo $booking_number; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tripname" id="lbltripname">Trip Cost <!-- (US$) -->:</label>
                                <input type="text" class="form-control" name="tripname" id="tripname"
                                       value="<?php echo $_POST['tripcost']; ?>" readonly>
                            </div>
                        </div>
                        <!--col-md-12-->

                        <div class="col-md-12 col-sm-12 col-xs-12 frmbdr">
                            <div class="form-group">
                                <input type="hidden" id="paymentGatewayID" name="paymentGatewayID" value="<?php echo $merchantID; ?>"/>

                                <input type="hidden" id="productDesc" name="productDesc"
                                       value="<?php echo $productDesc; ?>"/>
                                <input type="hidden" id="amount" name="amount" value="<?php echo $amount; ?>"/>
                                <input type="hidden" name="currencyCode" value="<?php echo $currencyCode;?>">
                                <input type="hidden" id="hashValue" name="hashValue"
                                       value="<?php echo $hashValue; ?>"/>

                                <input type="hidden" id="nonSecure" name="nonSecure" value="Y"/>
                                <input type="hidden" id="returnUrl" name="responseUrl" value="<?php echo $responseUrl; ?>"/>
                                <button type="submit" class="btn btn-primary" id="submit" name="btnSubmit">Pay Now
                                </button>

                            </div>

                        </div>
                        <!--col-md-12-->
                    </form>

                </div>
                <!--row-->
            </div>
            <!--col-md-9-->

            <?php include("includes/right.php"); ?>


        </div>
        <!--row-->
    </div><!--container-->
<?php
}
?>