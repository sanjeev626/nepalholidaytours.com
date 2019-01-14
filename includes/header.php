<?php /*<div class="header">
    	<div class="tmenu">
        	<ul>
            	<li><a href="<?php echo SITEROOT;?>">Home</a></li>
                <li><a href="<?php echo SITEROOT;?>trip-reviews.html">Trip Reviews</a></li>
                <li><a href="<?php echo SITEROOT;?>faqs.html">FAQs</a></li>
                <li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=2');?>.html">Contact Us</a></li>
            </ul>
        	
        </div><!--tmenu-->
        <a href="<?php echo SITEROOT;?>"><div class="logo">   	
        </div></a><!--logo-->
        <div class="menu">
        	<ul>
            	<li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=1');?>.html">About Us</a></li>
                <li><a href="<?php echo SITEROOT.'our-team.html';?>">Our Team</a></li>
                <li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=4');?>.html">Why Us</a></li>
                <li><a href="<?php echo SITEROOT.'nepal.html';?>">Nepal</a>
                    <ul>
                    <?php $result = $mydb->getQuery('*','tbl_activity','cid="1"');
						while($rasActivity=$mydb->fetch_array($result))
						{
					?>
                        <li><a href="<?php echo SITEROOT.$rasActivity['urlcode'];?>.html"><?php echo $rasActivity['title'];?></a></li>
                     <?php }?>
                    </ul> 
                </li>
                <li><a href="<?php echo SITEROOT.'request-custom-tour.html';?>">Request Custom Tour</a></li>
            </ul>
        	
      </div><!--menu-->
        
    </div>
    */
    ?>

<div class="container">
<div class="navbar navbar-custom navbar-default" role="navigation"> 
  
    <div class="navbar-header">
        
        <a class="navbar-brand hidden-xs" rel="home" href="<?php echo SITEROOT;?>" title="East and West International Tours and Travels">
            <img class="img-responsive" src="<?php echo SITEROOT;?>img/logo.gif">
        </a>
        <a class="navbar-brand-custom hidden-sm hidden-md hidden-lg" rel="home" href="<?php echo SITEROOT;?>" title="East and West International Tours and Travels">
            <img class="img-responsive" src="<?php echo SITEROOT;?>img/logo-sm-xs.gif">
        </a>
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
    </div>
    

    <div class="navbar-header navbar-right hidden-sm hidden-xs">
        <ul class="nav navbar-nav navbar-topmenu small">
            <li><a href="<?php echo SITEROOT;?>">Home</a></li>
            <li><a href="<?php echo SITEROOT;?>trip-reviews.html">Trip Reviews</a></li>
                <li><a href="<?php echo SITEROOT;?>faqs.html">FAQs</a></li>
                <li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=2');?>.html">Contact Us</a></li>
        </ul>
        
    </div>
    
    <div class="navbar-header collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="<?php echo SITEROOT.'nepal.html';?>" class="dropdown-toggle" data-toggle="dropdown">Trips<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php $result = $mydb->getQuery('*','tbl_activity','cid="1"');
                        while($rasActivity=$mydb->fetch_array($result))
                        {
                    ?>
                        <li><a href="<?php echo SITEROOT.$rasActivity['urlcode'];?>.html"><?php echo $rasActivity['title'];?></a></li>
                     <?php }?>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?php echo SITEROOT.'flight-tickets.html';?>" class="dropdown-toggle" data-toggle="dropdown">Flight Tickets<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php $tripsl = $mydb->getQuery('*','tbl_package','aid="18"');
                        while($rasPakl=$mydb->fetch_array($tripsl))
                        {
                    ?>
                        <li><a href="<?php echo SITEROOT.'flight-tickets/'.$rasPakl['urlcode'];?>.html"><?php echo $rasPakl['title'];?></a></li>
                     <?php }?>
              </ul>
            </li>
            <?php /*<li><a href="<?php echo SITEROOT.'flight-tickets.html';?>">Flight Tickets</a></li>*/?>
            <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Who We Are<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=1');?>.html">About Us</a></li>
				<li><a href="<?php echo SITEROOT.'our-team.html';?>">Our Team</a></li>
                <li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=4');?>.html">Why Us</a></li>
	          </ul>
	        </li>
            
            <li><a href="<?php echo SITEROOT.'request-custom-tour.html';?>">Request Custom Tour</a></li>
        </ul>
   
    </div>
</div>
    
</div>
<div class="container">
<div class="navbar navbar-custom navbar-default hidden-md hidden-lg">
    <div class="navbar-header">
        <ul class="nav navbar-nav navbar-topmenu2 small">
            <li><a href="<?php echo SITEROOT;?>">Home</a></li>
            <li><a href="<?php echo SITEROOT;?>trip-reviews.html">Trip Reviews</a></li>
                <li><a href="<?php echo SITEROOT;?>faqs.html">FAQs</a></li>
                <li><a href="<?php echo SITEROOT.$mydb->getValue('urlcode','tbl_page','id=2');?>.html">Contact Us</a></li>
        </ul>
        
    </div>
    
</div>
</div><!--container-->