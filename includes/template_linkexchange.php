<div class="ptrip">
  <div class="gp">
    <h1>Link Exchange</h1>
    <div class="ginfo">
      <p> <i>Please use this link</i><br />
        <br />
        <b>Title</b>: East & West International Tours & Travels<br />
        <br />
        <b>Description</b>: East & West International Tours & Travels - an authentic and reliable tours & travels agency established by professional tours leaders. Our services are travel and tours in Nepal, Domestic and International Air Ticketing and many more. <br />
        <br />
        <b>Website</b>: <a href="http://www.nepalholidaytours.com" target="_new">http://www.nepalholidaytours.com</a> </p>
      <div id="changelink">
        <div class="linklist">
          <h2>Category</h2>
          <ul>
            <?php $link = $mydb->getQuery('*','tbl_linkexchange','1');
					$counter=1;
						while($rasLink = $mydb->fetch_array($link))
						{
							
					?>
            <li><a <?php if($counter==1)echo 'class="active"'; else echo 'class="default"';?> href="javascript:void(0)" onClick="linkchange('<?php echo $rasLink['id'];?>');"><?php echo $rasLink['title'];?></a></li>
            <?php $counter++;
					}?>
          </ul>
          <?php $linkContent= $mydb->getQuery('*','tbl_linkexchange_content','lid=(select min(id) from tbl_linkexchange)');
					while($raslinkContent=$mydb->fetch_array($linkContent))
					{
					?>
          <div class="lk">
            <p><?php echo $raslinkContent['title'];?><br />
              <br />
              <a href="<?php echo $raslinkContent['url'];?>"><?php echo $raslinkContent['url'];?></a><br />
              <br />
              <?php echo stripslashes($raslinkContent['description']);?> </p>
          </div>
          <!--lk-->
          <?php }?>
        </div>
        <!--linklist--> 
      </div>
    </div>
    <!--tinfo--> 
    
  </div>
  <!--dtrip-->
  <div class="bookacc">
    <?php include("right.php"); ?>
  </div>
  <!--bookacc--> 
</div>
<!--ptrip--> 

<script type="text/javascript">
function linkchange(lid){
	//alert(lid);
	
	$('#changelink').load('<?php echo SITEROOT;?>includes/ajax_linkexchange.php',{'lid':lid});


	}
</script>