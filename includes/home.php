<?php $resPak = $mydb->getQuery('*','tbl_package','showinhomepage="1"');

$flag=0;?>
<!-- jQuery library (served from Google) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="<?php echo SITEROOT; ?>bxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo SITEROOT; ?>bxslider/jquery.bxslider.css" rel="stylesheet" />

<?php /*<div class="banner"> */?>

<div class="container">
  
  <div class="row">
    <div class="col-12 text-center">

<ul class="bxslider">
  <?php
  $resBanner = $mydb->getQuery('*','tbl_image','pid=3');
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
      <h1 class="mainh1">Nepal Holiday Tours and Treks <span style="font-size:16px; font-family:Arial, Helvetica, sans-serif">(Best Trip Packages with deals - 2019)</h1>
    </div>
  </div>

  <div class="row text-center row-btm-mrgn">
<?php /*
<div class="bst">
  <h1>    	
    	Nepal Holiday Tours <span style="font-size:16px; font-family:Arial, Helvetica, sans-serif">(Best Trip Packages - 2017)</span></h1> 
  
</div>
<!--bst-->

<div class="triplist">

*/?>

  <?php

    while($rasPak = $mydb->fetch_array($resPak))

	{
		$aid = $rasPak['aid'];
		$activitycode = $mydb->getValue('urlcode','tbl_activity','id='.$aid);
		$flag++;

	?>

  <div class="col-md-3 col-sm-6">
    <div class="thumbnail">
      <div class="col-md-12 hidden-sm hidden-xs"><h2 class="th2"><a href="<?php echo SITEROOT.$activitycode.'/'.$rasPak['urlcode'].'.html';?>"><?php echo $rasPak['title'];?></a></h2></div>
        <div class="col-sm-12 col-xs-12 hidden-md hidden-lg"><h2><a href="<?php echo SITEROOT.$activitycode.'/'.$rasPak['urlcode'].'.html';?>"><?php echo $rasPak['title'];?></a></h2></div>
        <img class="img-responsive" src="<?php echo SITEROOT.'img/package/thumb/'.$rasPak['iconimage'];?>" alt="<?php echo $rasPak['title'];?>" title="<?php echo $rasPak['title'];?>">
        <div class="caption">                
            <p><small>Trip Duration - <?php echo $rasPak['duration'];?></small></p>
            <p>
                <a href="<?php echo SITEROOT.$activitycode.'/'.$rasPak['urlcode'].'.html';?>" class="btn btn-primary">View Trip in Detail</a>
            </p>
        </div>
    </div>
  </div>


  <?php /*
  <div class="trips">
    <div class="ttit"> <a href="<?php echo SITEROOT.$activitycode.'/'.$rasPak['urlcode'].'.html';?>"><?php echo $rasPak['title'];?></a> </div>
    <!--ttit-->
    
    <div class="timg"> <img src="<?php echo $SITEROOT.'img/package/thumb/'.$rasPak['iconimage'];?>" title="<?php echo $rasPak['title'];?>" style="max-width:202px; max-height:155px;" /> </div>
    <!--timg-->
    
    <div class="tdur"> Trip Duration - <?php echo $rasPak['duration'];?> </div>
    <!--tdur-->
    
    <div class="tdetail"> <a href="<?php echo SITEROOT.$activitycode.'/'.$rasPak['urlcode'].'.html';?>">View Trip in Detail</a> </div>
    <!--tdetail--> 
    
  </div>
  */?>
  <?php	

		if($flag%4==0)

			echo'<div style="clear:both"></div>';	
	}

	?>


<!--</div>
triplist-->

</div><!--row-->

  
</div> <!-- /container -->






<?php /*
<div class="mft">
  <div class="cmail"> <a href="mailto:info@nepalholidaytours.com"><img src="img/ico-mail.jpg" /> <span class="cm">info@nepalholidaytours.com</span></a> </div>
  <!--cmail-->
  <div class="social">
  <div class="fb"> <a href="https://www.facebook.com/pages/East-West-Int-Tours-Travels/229229113779657" target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-facebook.jpg" /></a> </div>
  <!--fb-->
<div class="fb"> <a href="http://www.tripadvisor.com/Attraction_Review-g293890-d6840173-Reviews-East_and_West_International_Tours_and_Travels_Private_Day_Tours-Kathmandu_Kathman.html" target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-tripadvisor.jpg" /></a> </div>
  <!--fb-->
  <div class="fb">
    <a href="https://www.twitter.com/eastandwesttour" target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-twitter.gif" /></a>
  </div><!--fb-->
  <div class="fb">
            <a href="https://plus.google.com/u/0/+EastWestToursandTravels" target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-googleplus.gif" /></a>
  </div><!--fb-->
  <div class="fb">
            <a href="https://www.instagram.com/trvlwitheastnwest/" target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-instagram.jpg" /></a>
  </div><!--fb-->
  </div><!--social-->
  
  <div class="cphone"> <img src="<?php echo SITEROOT; ?>img/ico-phone.jpg" /><span class="cm">+977-1-4701196 </span> </div>
  <!--cphone--> 
  
</div>
<!--mft-->
<div class="mft">
   <div class="vsn">
   <a href="http://www.nepalholidaytours.com/vehicle-service.html">Vehicle Service in Nepal<br /><img src="<?php echo SITEROOT; ?>img/vehicle-service-in-nepal.jpg" /></a>
   </div><!--vsn-->
</div><!--mft-->
*/
?>