<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book The Trip - Online Inquiry</title>
<meta name="keywords" content="Book the trip, Online Inquiry"> 
<meta name="description" content="Book your holiday trip with East &amp; West International Tours and Travels."> 
<meta name="robots" content="index, follow"> 
<meta name="revisit-after" content="5 Days"> 
<meta name="classification" content="Trekking/Tour Operator"> 
<meta name="Googlebot" content="index, follow"> 

<link rel="stylesheet" href="keshav.css" />

<link rel="shortcut icon" href="favicon.ico">

<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script> 

<script type="text/javascript" src="js/validation.js"></script>

<script type="text/javascript">
	var SITEROOT = 'http://localhost/nepalholidaytours/calendar/';
</script>
<link type="text/css" rel="stylesheet" href="http://localhost//nepalholidaytours/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="http://localhost//nepalholidaytours/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
</head>

<body>
<div class="main">
	<?php include("inc/header.php"); ?>
    <div class="banner">
    	
    </div><!--banner-->
    
    <div class="ptrip">
    	
        <div class="gp">
        	<h1>Book The Trip</h1>
            <div class="ginfo">
            <p>
            	Note: All the fields mentioned in inquiry form is mandatory. Please submit your correct details and help us make your holiday trips a special one to remember.
            </p>
            
            <h2>Submit Inquiry Form</h2>
<div class="reserve">
	<form name="rform" id="rform" method="post" action="rsend.php">
                <h3>Trip Detail</h3>
                <div class="seg">
                	<div class="fl">
                    	<label for="tripname" id="lbltripname">Trip Name:</label>
                        <input type="text" name="tripname" id="tripname" value="" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="tripdays" id="lbltripdays">Trip Duration:</label>
                        <input type="text" name="tripdays" id="tripdays" value="" />
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
                    	<label for="chkin" id="lblchkin">Arrival Date:</label>
                        <input type="text" name="chkin" id="chkin" value="" readonly="readonly" /> <img src="calendar/images/calendar.gif" width="19" height="19" alt="CAL" title="Select Arrival Date" onclick="displayCalendar(document.forms[0].chkin,'yyyy-mm-dd',this)" style="cursor:pointer;" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="chkout" id="lblchkout">Departure Date:</label>
                        <input type="text" name="chkout" id="chkout" value="" readonly="readonly" /> <img src="calendar/images/calendar.gif" width="19" height="19" alt="CAL" title="Select Departure Date" onclick="displayCalendar(document.forms[0].chkout,'yyyy-mm-dd',this)" style="cursor:pointer;" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="apick" id="lblapick">Airport Pick Up:</label>
                        <input type="radio" id="desired" value="desired" name="apick" /> Desired <span style="margin-right:15px;"></span><input type="radio" id="desired" value="required" name="apick" /> Required
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
                    	<label for="city" id="lblcity">City:</label>
                        <input type="text" name="city" id="city" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="country" id="lblcountry">Country:</label>
                        <input type="text" name="country" id="country" />
                    </div><!--fl-->
                    <div class="fl">
                    	<label for="comments" id="lblcomments">Any Comments:</label>
                        <textarea name="comments" id="comments" rows="8"></textarea>
                    </div><!--fl-->
                    <div class="fl">
                    	<label>&nbsp;</label>
                        <input type="submit" id="submit" />
                    </div><!--fl-->
                </div><!--seg-->
                </form>  
</div><!--reserve-->
            
            </div><!--ginfo-->
            
            
        </div><!--dtrip-->
        <div class="bookacc">
        	
            <?php include("inc/right.php"); ?>
            
        </div><!--bookacc-->
    </div><!--ptrip-->
    <?php include("inc/bottom.php"); ?>
</div><!--main-->
</body>
</html>