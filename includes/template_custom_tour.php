<?php
if(isset($_POST['btn_Submit']))
{
	$fromName = $_POST['name'];
	$fromEmail = $_POST['email'];
	$toName = SITENAME;
	$toEmail = SITEEMAIL;
	ob_start();
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><strong>Trip Detail</strong></td>
  </tr>
  <tr>
    <td width="150px">Trip Name:</td>
    <td><?php echo stripslashes($_POST['tripname']);?></td>
  </tr>
  <tr>
    <td>Trip Duration:</td>
    <td><?php echo stripslashes($_POST['tripdays']);?></td>
  </tr>
  <tr>
    <td>Group Size:</td>
    <td><?php echo stripslashes($_POST['groupsize']);?></td>
  </tr>
  <tr>
    <td>Travel Date:</td>
    <td><?php echo stripslashes($_POST['chkin']);?></td>
  </tr>
  <tr>
  <tr>
    <td colspan="2" style="padding-top:20px;"><strong>Personal Detail</strong></td>
  </tr>
  <tr>
    <td>Name:</td>
    <td><?php echo stripslashes($_POST['name']);?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?php echo stripslashes($_POST['email']);?></td>
  </tr>
  <tr>
    <td>Contact No:</td>
    <td><?php echo stripslashes($_POST['tel']);?></td>
  </tr>
  <tr>
    <td>City:</td>
    <td><?php echo stripslashes($_POST['city']);?></td>
  </tr>
  <tr>
    <td>Country:</td>
    <td><?php echo stripslashes($_POST['country']);?></td>
  </tr>
  <tr>
    <td>Custom Trip Description:</td>
    <td><?php echo stripslashes($_POST['comments']);?></td>
  </tr>
  <tr>
    <td>Message Received from:</td>
    <td><?php echo stripslashes($_SERVER['REMOTE_ADDR']);?></td>
  </tr>
</table>
<?php
$message = ob_get_clean();	
$subject = "Custom Tour - ".stripslashes($_POST['tripname']);
if($mydb->sendEmail($toName,$toEmail,$fromName,$fromEmail,$subject,$message))
{
	$msg = 'Thank you for booking with Us.<br>Your Trip inquiry has been sent to the Sales and Customer Service Division. <br><br><br>We will contact you within 24 hours.';	
}
else
{
	$msg = 'Email couldn\'t be sent due to some technical problem. Please Try Again';  	
}
}


?>    
  

<div class="container">
  
  <div class="row">
    <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1">Request Custom Tour</h1>
        </div>
            </div><!--row-->

            <div class="row">

        <div class="col-md-12">
    <p>Note: All the fields mentioned in inquiry form is mandatory. Please submit your correct details and help us make your holiday trips a special one to remember. </p>
        </div><!--col-md-12-->
            </div><!--row-->

            <div class="row">
        <div class="col-md-12">
        

    <h2>Submit Request Form</h1>
        </div>
            </div><!--row-->

            <div class="row frmbdr">
            <form name="rform" id="rform" method="post" action="">
                <?php
                  if(isset($msg)) echo '<p>'.$msg.'</p>';
                ?>
            <div class="col-md-12 col-sm-12 col-xs-12 frmbdr">
                <h4 class="frmtitle1">Trip Detail</h4>
            
                <div class="form-group">
                    <label for="tripname" id="lbltripname">Trip Name:</label>
                    <input type="text" class="form-control" name="tripname" id="tripname" value="" >
                </div>
                <div class="form-group">
                    <label for="tripdays" id="lbltripdays">Trip Duration:</label>
                    <input type="text" class="form-control" name="tripdays" id="tripdays" value="" >
                </div>
                <div class="form-group">
                    <label for="groupsize" id="lblgroupsize">Group Size:</label>
                    <select class="form-control" id="groupsize"  value="" name="groupsize">
                        <option>Just Me</option>
                        <option>Couple</option>
                        <option>1-5</option>
                        <option>5-10</option>
                        <option>10 or more</option>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="chkin" id="lblchkin">Your Travel Date:</label>
                    <img src="<?php echo SITEROOT;?>calendar/images/calendar.gif" width="19" height="19" alt="CAL" title="Select Arrival Date" onclick="displayCalendar(document.forms[0].chkin,'yyyy-mm-dd',this)" style="cursor:pointer;" />

                    <input type="text" class="form-control" name="chkin" id="chkin" value="" readonly="readonly" /> 
                    
                    
                </div>
                
                
            </div><!--col-md-12-->


            <div class="col-md-12 col-sm-12 col-xs-12 frmbdr">
                
                <h4 class="frmtitle2">Personal Detail</h4>
                <div class="form-group">
                    <label for="name" id="lblname">Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email" id="lblemail">Email:</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="tel" id="lbltel">Contact No.:</label>
                    <input type="text" class="form-control" name="tel" id="tel">
                </div>
                <div class="form-group">
                    <label for="city" id="lblcity">City:</label>
                    <input type="text" class="form-control" name="city" id="city">
                </div>
                <div class="form-group">
                    <label for="country" id="lblcountry">Country:</label>
                    <input type="text" class="form-control" name="country" id="country">
                </div>
                <div class="form-group">
                    <label for="comments" id="lblcomments">Describe your custom trip:</label>
                    <textarea class="form-control" name="comments" id="comments" rows="8"></textarea>
                </div>
                <div class="form-group">
                                        
                    <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_Submit">Submit</button>
                    
                </div>

                </div><!--col-md-12-->
            </form>
                
           </div><!--row-->


    </div><!--col-md-9-->

    <?php include("includes/right.php"); ?>



  </div><!--row-->
</div><!--container-->