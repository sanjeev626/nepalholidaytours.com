<?php
$rasCountry = $mydb->getArray('*','tbl_country','id="'.$id.'"');
$rasImgMain = $mydb->getArray('*','tbl_image','gid="'.$id.'" LIMIT 1');

if(!empty($rasImgMain['imagename']))
{
?>

<div class="pbanner">
  <img src="<?php echo SITEROOT.'img/country/'.$rasImgMain['imagename'];?>" title="<?php echo $rasImgMain['imagetitle'];?>" id="bigimg" /> </div><!--banner-->
<div class="banul">
  <ul>
    <?php
	$cnt = 0;
	$resImg = $mydb->getQuery('*','tbl_image','gid="'.$id.'"');
	while($rasImg = $mydb->fetch_array($resImg))
	{
		++$cnt;
	?>
    <li <?php if($cnt%5==0) echo ' style="margin:0;"'; ?>><a href="javascript:void(0);" onclick="imgchange('<?php echo SITEROOT.'img/country/'.$rasImg['imagename'];?>');"><img src="<?php echo SITEROOT.'img/country/'.$rasImg['imagename'];?>" title="<?php echo $rasImg['imagetitle'];?>" style="max-width:190px;" /></a></li>
    <?php
	}
	?>
  </ul>
</div>
<?php }?>
<div class="ptrip">
  <div class="gp">
    <h1><?php echo $rasCountry['title'];?></h1>
    <div class="ginfo">
      <p><?php echo stripslashes($rasCountry['description']);?></p>
    </div>
    <!--tinfo--> 
    
  </div>
  <!--dtrip-->
  
  <div class="bookacc">
    <?php include'right.php';?>
  </div>
  <!--bookacc--> 
  
</div>
<!--ptrip-->
<script type="text/javascript">
	function imgchange(imgurl)
	{
		//alert(imgurl);
		$('#bigimg').hide();
		$("#bigimg").attr("src",imgurl);
		$("#bigimg").fadeIn(1000);
	}
</script>