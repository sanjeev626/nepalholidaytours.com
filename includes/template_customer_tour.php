<?php
echo SITEROOT;
$packagecode = $_GET['activitycode'];
$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
if(isset($_POST['btn_Submit']))

        {
            $tripname= $_POST['tripname'];
			$tripdays = $_POST['tripdays'];
			$groupsize= $_POST['gourpsize'];
			$chkin = $_POST['chkin'];
			$name = $_POST['name'];
			$email = $_POST['email'];
            $tel = $_POST['tel'];
			$country = $_POST['country'];
			$comments= $_POST['comments'];
			

			// message

			
			$message = "<br><strong>Trip Deatails</strong><br>";
			
			$message .= "Trip Title: ".$tripname."<br>";

            $message .= "Trip Days: ".$tripdays."<br>";

			$message .= "Group Size: ".$groupsize."<br>";

			$message .= "Travel Date: ".$chkin."<br>";
			
			$message .= "<br><strong>Personal Deatails</strong><br>";

			$message .= "Name: ".$name."<br>";

			$message .= "Email: ".$email."<br>";

			$message .= "Contact Number: ".$tel."<br>";

			$message .= "Country: ".$country."<br>";

			$message .= "Custom Trip: ".$comments."<br>";
			   

			// subject

			$subject = 'Trip Booking';

			$to  = 'info@nepalholidaytours.com';

			$toName = 'NepalHolidayTours';

			

			$from  = $email;

			$fromName =$name;               

			
			// To send HTML mail, the Content-type header must be set

			$headers  = 'MIME-Version: 1.0' . "\r\n";

			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			

			// Additional headers

			$headers .= 'To: '.$toName.' <'.$to.'>' . "\r\n";

			$headers .= 'From: '.$fromName.' <'.$from.'>' . "\r\n";

			

			// Mail it

			if(mail($to, $subject, $message, $headers))

				$mesageStatus = "<strong style='color:green;'>Your information has been sent. We will get back to you soon.</strong>";
			else

				$mesageStatus = "<strong style='color:red;'>Failed to send your information due to some technical error. Please try again later.</strong>";

		
        }



?>

<link type="text/css" rel="stylesheet" href="<?php echo SITEROOT;?>calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="<?php echo SITEROOT;?>calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<div class="banner">
    	
    </div><!--banner-->

<div class="ptrip">
    	
        <div class="gp">
        	<h1>Request Custom Tour</h1>
            <div class="ginfo">
            <?php echo $contents;?>
            
            <h2>Submit Request Form</h2>
<div class="reserve">
	<?php if(isset($mesageStatus)) echo $mesageStatus;?>
	<form name="rform" id="rform" method="post" action="">
                <h3>Trip Detail</h3>
                <div class="seg">
                	<div class="fl">
                    	<label for="tripname" id="lbltripname">Trip Name:</label>
                        <input type="text" name="tripname" id="tripname" value="<?php echo $rasPackage['title'];?>" readonly="readonly" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="tripdays" id="lbltripdays">Trip Days:</label>
                        <input type="text" name="tripdays" id="tripdays" value="<?php echo $rasPackage['duration'];?>" readonly="readonly" />
                    </div><!--fl-->
                    
                    <div class="fl">
                    	<label for="groupsize" id="lblgroupsize">Group Size:</label>
                        <select id="groupsize"  value="" name="groupsize">
                <option>Just Me</option>
                <option>Couple</option>
                <option>1-5</option>
                <option>5-10</option>
                <option>10 or more</option>
                
                </select>

                    </div><!--fl-->
                    
                	<div class="fl">
                    	<label for="chkin" id="lblchkin">Your Travel Date:</label>
                        <input type="text" name="chkin" id="chkin" value="" readonly="readonly" /> <img src="<?php echo SITEROOT;?>calendar/images/calendar.gif" width="19" height="19" alt="CAL" title="Select Arrival Date" onclick="displayCalendar(document.forms[0].chkin,'yyyy-mm-dd',this)" style="cursor:pointer;" />
                    </div><!--fl-->
                    
                    
                    
                </div><!--seg-->
                
                <h3>Personal Detail</h3>
                <div class="seg">
                	<div class="fl">
                    	<label for="name" id="lblname">Name:</label>
                        <input type="text" name="name" id="name" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="email" id="lblemail">Email:</label>
                        <input type="text" name="email" id="email" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="tel" id="lbltel">Contact No.:</label>
                        <input type="text" name="tel" id="tel" />
                    </div><!--fl-->
                    
                    
                    <div class="fl">
                    	<label for="country" id="lblcountry">Country:</label>
                        <input type="text" name="country" id="country" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="comments" id="lblcomments">Describe your custom trip:</label>
                        <textarea name="comments" id="comments" rows="8"></textarea>
                    </div><!--fl-->
                    <div class="fl">
                    	<label>&nbsp;</label>
                        <input type="submit" id="btn_Submit" name="btn_Submit" />
                    </div><!--fl-->
                </div><!--seg-->
                </form>  
</div><!--reserve-->
            
            </div><!--ginfo-->
            
            
        </div><!--dtrip-->
        <div class="bookacc">
        	
            <?php include("right.php"); ?>
            
        </div><!--bookacc-->
    </div><!--ptrip-->
    
<script type="text/javascript" src="js/validation.js"></script>

<script type="text/javascript">
	var SITEROOT = 'http://localhost/nepalholidaytours/calendar/';
</script>
<link type="text/css" rel="stylesheet" href="http://localhost//nepalholidaytours/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="http://localhost//nepalholidaytours/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>