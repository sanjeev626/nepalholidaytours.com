<!-- jQuery library (served from Google) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="<?php echo SITEROOT; ?>bxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo SITEROOT; ?>bxslider/jquery.bxslider.css" rel="stylesheet" />

<div class="container">
  
  <div class="row">
    <div class="col-12 text-center">

<ul class="bxslider">
  <?php
    $rasPak = $mydb->getArray('*','tbl_package','id="'.$id.'"');

    if($rasPak['show_cost']=="")
    {
        $cost = $rasPak['cost'];
        $currencyCode = '$';
    }
    else
    {
        $cost = $rasPak['cost_npr'];
        $currencyCode = 'Rs ';
    }
    
    $rasImgMain = $mydb->getArray('*','tbl_image','package_id="'.$id.'" LIMIT 1');
    $imagename = $rasImgMain['imagename'];
    $imagetitle = $rasImgMain['imagetitle'];

  while($rasBanner = $mydb->fetch_array($resBanner))
  {
  ?>
  <li><a href="<?php if(!empty($rasBanner['imagelink'])) echo $mydb->getLink($rasBanner['imagelink']); else echo 'javascript:void(0);';?>"><img src="<?php echo SITEROOT.'img/banner/'.$rasBanner['imagename'];?>" title="<?php echo $rasBanner['imagetitle'];?>" /></a></li>
  <?php
  }
  ?>
</ul>

</div>
  </div>
  
</div> <!-- /container -->

<?php /*</div><!--banner-->*/?>

<script type="text/javascript">
$(document).ready(function(){
	  $('.bxslider').bxSlider({
	  adaptiveHeight: true,
	  auto: true,
	  /*autoControls: true,*/
	  captions : true,
	  pause: 5000
	});
});
</script>
<!--banner-->


<div class="container">
  
  <div class="row">
    <div class="col-12 text-center">

<ul class="bxslider">

<?php

$rasPak = $mydb->getArray('*','tbl_package','id="'.$id.'"');

if($rasPak['show_cost']=="")
{
    $cost = $rasPak['cost'];
    $currencyCode = '$';
}
else
{
    $cost = $rasPak['cost_npr'];
    $currencyCode = 'Rs ';
}

$rasImgMain = $mydb->getArray('*','tbl_image','package_id="'.$id.'" LIMIT 1');
$imagename = $rasImgMain['imagename'];
$imagetitle = $rasImgMain['imagetitle'];
if(!empty($imagename))
{
?>
      <img class="img-responsive" src="<?php echo SITEROOT.'img/package/'.$imagename;?>" title="<?php echo $imagetitle;?>" id="bigImage" />

<?php
}
?>
        
    </div>
  </div><!--row-->


  
</div> <!-- /container -->


<div class="container">
  <div class="row">
    <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1"><?php echo $title;?></h1>
        </div>
            </div><!--row-->

            <div class="row">
        <div class="col-md-12"> 
            <div class="col-md-4 col-sm-4 col-xs-12 btn btn-success"><button class="btn btn-success"><?php echo $duration;?></button></div>
            <div class="col-md-4 col-sm-4 col-xs-12 btn btn-primary"><button class="btn btn-primary" />Price <?php if($cost>0) echo $currencyCode.$cost; else echo 'On Request';?></button></div>
            <div class="col-md-4 col-sm-4 col-xs-12 btn btn-danger">
              <a class="btn btn-danger" href="javascript:void(0);" onclick="frmBook.submit();" role="button" type="submit">Book This Trip Now</a>
            </div>

        </div>
            </div><!--row-->

            <div class="row">

        <div class="col-md-12">
          <?php echo $description;?>
          
        </div><!--col-md-12-->
            </div><!--row-->


            <!-- Nav tabs -->    
       <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
             
             <li role="presentation" class="active">
              <a href="#itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">Detail Itinerary</a>
             </li>
             <li role="presentation">
              <a href="#includes" aria-controls="includes" role="tab" data-toggle="tab">Includes</a>
             </li>
             <li role="presentation">
              <a href="#excludes" aria-controls="excludes" role="tab" data-toggle="tab">Excludes</a>
             </li>
             <li role="presentation">
              <a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Trip Notes</a>
             </li>
             <li role="presentation">
              <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Trip Reviews</a>
             </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tab-content-border">
             
             <div role="tabpanel" class="tab-pane active" id="itinerary">
                <h2 class="triptitle2">Detail Itinerary - <?php echo $title;?></h2>
                <?php $resItinerary = $mydb->getquery('*','tbl_itinerary','pid="'.$id.'" order by id ASC');
                while($rasItinearay = $mydb->fetch_array($resItinerary))
                {
                ?>
                <div class="row">
                    <div class="col-md-2 dayc">
                        <b><?php echo $rasItinearay['day'];?></b>
                    </div>
                    <div class="col-md-10">
                        <p>
                         <b><?php echo $rasItinearay['place'];?></b><br /><br />
                        </p>

                        <?php echo stripslashes($rasItinearay['description']);?>

                        <p>
                          <?php 
                              $services = explode('---',$rasItinearay['services']);
                              for($i=0;$i<count($services);$i++)
                          {
                          ?>

                        <span class="glyphicon glyphicon-ok"></span> <?php echo $services[$i];?>
                        </p>
                          <?php } ?>

                    </div>

                </div><!--row-->
                <?php } ?><!--endwhile-->
                
             </div><!--tabpanel-->

             <div role="tabpanel" class="tab-pane" id="includes">
                <h2 class="triptitle2">Cost Includes - <?php echo $title;?></h2>
                <?php echo $includes;?>
             </div><!--tabpanel-->


             <div role="tabpanel" class="tab-pane" id="excludes">
                <h2 class="triptitle2">Cost Excludes - <?php echo $title;?></h2>
                <?php echo $excludes;?>
             </div><!--tabpanel-->


              <div role="tabpanel" class="tab-pane" id="notes">
                <h2 class="triptitle2">Trip Notes - <?php echo $title;?></h2>
                    <?php echo $trip_notes;?>
             </div><!--tabpanel-->


              <div role="tabpanel" class="tab-pane" id="reviews">
                <h2 class="triptitle2">Trip Reviews - <?php echo $title;?></h2>
                    <?php echo $trip_reviews;?>
             </div><!--tabpanel-->
            </div><!--tab-content-->
        </div><!--col-md-12-->


        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs tbook">
            <a href="javascript:void(0);" onclick="frmBook.submit();" type="submit"></a>
            
        </div><!--col-md-12-->

        <div class="hidden-lg hidden-md col-sm-12 col-xs-12 btn btn-danger">
            <a class="btn btn-danger" href="javascript:void(0);" onclick="frmBook.submit();" role="button" type="submit">Book This Trip Now</a>
             
        </div><!--col-md-12-->
            
        


    </div><!--col-md-9-->

    <div class="col-md-3">
        <div class="col-md-12">
            
            <h2><button class="btn btn-warning">Trip Highlights</button></h2>
            <?php echo $highlights;?>

        </div><!--col-md-12-->

        <div class="col-md-12">
            <h2><button class="btn btn-warning">Accommodation</button></h2>
            <?php echo $accomodations;?>
        </div><!--col-md-12-->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
            <form action="<?php echo SITEROOT;?>book-the-trip.html" method="post" name="frmBook"><input name="packagecode" type="hidden" value="<?php echo $packagecode;?>" /><a class="btn btn-danger" href="javascript:void(0);" onclick="frmBook.submit();" role="button" type="submit">Book This Trip Now</a></form> 

             
        </div><!--col-md-12-->


    </div><!--col-md-3-->

  </div><!--row-->
</div> <!-- /container -->