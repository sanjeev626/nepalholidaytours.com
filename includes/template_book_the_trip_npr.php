<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
<?php
$cost = '';
$currency = 'NRs ';
$currencyCode = '524'; //Nrs
?>
<div class="container">
  <div class="row">
    <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1">Book The Trip</h1>
        </div>
            </div><!--row-->

            <div class="row">

        <div class="col-md-12">
    <p>Note: All the fields mentioned in inquiry form is mandatory. Please submit your correct details and help us make your holiday trips a special one to remember. </p>
        </div><!--col-md-12-->
            </div><!--row-->

            <div class="row">
        <div class="col-md-12">
        

    <h2>Submit Inquiry Form</h1>
        </div>
            </div><!--row-->


            <div class="row frmbdr">
            <form name="rform" id="rform" method="post" action="<?php echo SITEROOT;?>thank-you.html">
                <?php
                  if(isset($msg)) echo '<p>'.$msg.'</p>';
                ?>
            <div class="col-md-12 col-sm-12 col-xs-12 frmbdr">
                <h4 class="frmtitle1">Trip Detail</h4>
            
                <div class="form-group">
                    <label for="tripname" id="lbltripname">Trip Name:</label>
                    <input type="text" class="form-control ui-autocomplete-input" name="tripname" id="tripname" value="" placeholder="Trip Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="tripdays" id="lbltripdays">Trip Duration:</label>
                    <input type="text" class="form-control" name="tripdays" id="tripdays" value="<?php echo $rasPackage['duration'];?>">
                </div>
                <div class="form-group">
                    <label for="tripdays" id="lbltripdays">Trip Cost (<?php echo $currency;?>):</label>
                    <input type="text" class="form-control" name="tripcost" id="tripcost" value="<?php echo $cost;?>">
                </div>
                <div class="form-group">
                    <label for="groupsize" id="lblgroupsize">Group Size:</label>
                    <select disabled class="form-control" id="groupsize"  value="" name="groupsize" onchange="calculateTripcost(this.value,'<?php echo $cost;?>')">
                        <?php for($i=1;$i<=30;$i++){?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php } ?>
                        <!-- <option>Just Me</option>
                        <option>Couple</option>
                        <option>1-5</option>
                        <option>5-10</option>
                        <option>10 or more</option> -->
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="chkin" id="lblchkin">Arrival Date:</label>
                    <img src="<?php echo SITEROOT;?>calendar/images/calendar.gif" width="19" height="19" alt="CAL" title="Select Arrival Date" onclick="displayCalendar(document.forms[0].chkin,'yyyy-mm-dd',this)" style="cursor:pointer;" />

                    <input type="text" class="form-control" name="chkin" id="chkin" value="" readonly="readonly" /> 
                    
                    
                </div>
                <div class="form-group">
                    <label for="chkout" id="lblchkout">Departure Date:</label>
                    <img src="<?php echo SITEROOT;?>calendar/images/calendar.gif" width="19" height="19" alt="CAL" title="Select Departure Date" onclick="displayCalendar(document.forms[0].chkout,'yyyy-mm-dd',this)" style="cursor:pointer;" />

                    <input type="text" class="form-control" name="chkout" id="chkout" value="" readonly="readonly" /> 


                    
                </div>
                <div class="form-group">
                    <label for="apick" id="lblapick">Airport Pick Up:</label>
                    <label class="radio-inline">
                      <input type="radio" id="desired" value="desired" name="apick"> Desired
                    </label>
                    <label class="radio-inline">
                      <input type="radio" id="desired" value="required" name="apick"> Required
                    </label>
                    
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
                    <label for="comments" id="lblcomments">Any Comments:</label>
                    <textarea class="form-control" name="comments" id="comments" rows="8"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="packagecode" value="<?php echo $packagecode;?>" />
                    <input type="hidden" name="packagecost" value="<?php echo $rasPackage['cost'];?>" />
                    <input type="hidden" name="currencyCode" value="<?php echo $currencyCode;?>" />                    
                    <button type="submit" class="btn btn-primary" id="submit" name="btnSubmit">Submit</button>
                    
                </div>

                </div><!--col-md-12-->
            </form>
                
           </div><!--row-->
        </div><!--col-md-9-->

        <?php include("includes/right.php"); ?>
<script>
    function calculateTripcost(nop,cost){
        var tripcost = nop*cost;
        $('#tripcost').val(tripcost);
    }
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#tripname").autocomplete({
        source:'includes/autocomplete_tripname_list.php',
        minLength:1,
      
        select:function(e,ui) {
            $('#tripdays').val(ui.item.duration);
            $('#tripcost').val(ui.item.cost_npr);            
        }
        
    });
});
</script>


  </div><!--row-->
</div><!--container-->