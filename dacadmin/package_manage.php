<script type="text/javascript">
	function deleteImage(imid)
	{
		//alert(imid);
		var bool;
		bool = confirm('Are you sure to delete this image. The process is ir-reversible.');
		if(bool)
		{
			window.location='index.php?manager=package_manage&id=<?php echo $_GET["id"];?>&aid=<?php echo $_GET['aid'];?>&delImid='+imid;
		}
	}
	
	function deleteMap(pid)
	{
		//alert(imid);
		var bool;
		bool = confirm('Are you sure to delete this map. The process is ir-reversible.');
		if(bool)
		{
			window.location='index.php?manager=package_manage&id=<?php echo $_GET["id"];?>&aid=<?php echo $_GET['aid'];?>&delMap='+pid;
		}
	}
</script>

<?php
if(isset($_GET['id']))
{
	$btnValue='Update';
	$id = $_GET['id'];
}
else
{	
	$btnValue='Add';
	$id = 0;
}
?>
<?php
	
/* generate refresh link*/	

if(isset($_GET['aid']))
{
	$aid = $_GET['aid'];
	$refreshlink='&aid='.$aid;
}

if(isset($_GET['delMap']))
{
	$pid = $_GET['delMap'];
	$map= $mydb->getValue('map','tbl_package','id='.$pid);
	$unlink = '../img/package/'.$map;
	@unlink($unlink);
	$data['map'] = '';
	$mydb->updateQuery('tbl_package',$data,'id='.$pid);
	
}

if(isset($_GET['delImid']))
{
	$imid = $_GET['delImid'];
	$imagename = $mydb->getValue('imagename','tbl_image','id='.$imid);
	$unlink = '../img/package/'.$imagename;
	@unlink($unlink);
	$mydb->deleteQuery('tbl_image','id='.$imid);
	$mydb->redirect(ADMINURLPATH."package_manage".$refreshlink."&msg=1");
}

if(isset($_POST['btnSubmit']) && $_POST['btnSubmit']=='Update')
{
	//print_r($_FILES['packageeximage']);
	if(isset($_FILES['packageeximage']))
	{
	$excount = count($_FILES['packageeximage']['name']);
	for($i=0;$i<$excount;$i++)
	{
		if($_FILES['packageeximage']['size'][$i]>0)
		{
			$data='';
			$imagename = rand(111,999).$mydb->clean4imagecode($_FILES['packageeximage']['name'][$i]);
			$tmp_name=$_FILES['packageeximage']['tmp_name'][$i];
			$imagepath='../img/package/'.$imagename;
			copy($tmp_name,$imagepath);
			$data['package_id'] = $id;
			$data['imagename'] = $imagename;
			$mydb->insertQuery('tbl_packageimage',$data);
		}
	}
	}
	
	$data='';
	
	if(isset($_FILES['iconimage']['name']) && $_FILES['iconimage']['size']>0)
	{
		$imagename = $mydb->clean4imagecode($_FILES['iconimage']['name']);
		$tmp_name=$_FILES['iconimage']['tmp_name'];
		$imagepath='../img/package/thumb/';	
		$unlinkpicname = $mydb->getValue('iconimage','tbl_package','id='.$id);	
		$iconimage = $mydb->UploadImage($imagename,$tmp_name,$imagepath,'',$unlinkpicname);
		$data['iconimage'] = $iconimage;
	}
	if(isset($_POST['imid'])){
		for($i=0;$i<count($_POST['imid']);$i++)
		{			
			$imid = $_POST['imid'][$i];
			$data3='';
			$data3['imagetitle'] = $_POST['imagetitle'][$i];
			$mydb->updateQuery('tbl_image',$data3,'id='.$imid);
		}
	}
	$imgcount = count($_FILES['imagename']['name']);
	for($i=0;$i<5;$i++)
	{
		$imagesize = $_FILES['imagename']['size'][$i];
		//echo $imagesize."<br>";
		if($imagesize>0)
		{
			//ready to upload
			$imagename = rand(1111,9999).$mydb->clean4imagecode(($_FILES['imagename']['name'][$i]));
			$source = $_FILES['imagename']['tmp_name'][$i];
			$dest = '../img/package/'.$imagename;
			if(copy($source,$dest))
			{				
				$data2='';
				$data2['package_id'] = $id;
				$data2['imagename'] = $imagename;
				$data2['imagetitle'] = $_POST['imagetitle'][$i];
				$mydb->insertQuery('tbl_image',$data2);	
			}
		}
	}
	
	if(isset($_FILES['map']['name']) && $_FILES['map']['size']>0)
	{
		$imagename = $mydb->clean4imagecode($_FILES['map']['name']);
		$tmp_name=$_FILES['map']['tmp_name'];
		$imagepath='../img/package/';	
		$packageimage = $mydb->UploadImage($imagename,$tmp_name,$imagepath);
		$data['map'] = $packageimage;
	}
	
	foreach($_POST as $key=>$value)
	{
		if($key!='btnSubmit' && $key!='imagetitle' && $key!='imid')
			$data[$key]=$value;
	}
	$data['urlcode'] = $mydb->clean4urlcode($_POST['title']);
	
	$refreshlink.='&id='.$id;
	//print_r($data);
	$mydb->updateQuery('tbl_package',$data,'id='.$id);
	$mydb->redirect(ADMINURLPATH."package_manage".$refreshlink."&msg=1");
}





if(isset($_POST['btnSubmit']) && $_POST['btnSubmit']=='Add')
{
	$aid = $_POST['aid'];
	//$rid = $_POST['rid'];
	$data='';
	if(isset($_FILES['iconimage']['name']) && $_FILES['iconimage']['size']>0)
	{
		$imagename = $mydb->clean4imagecode($_FILES['iconimage']['name']);
		$tmp_name=$_FILES['iconimage']['tmp_name'];
		$imagepath='../img/package/thumb/';		
		$iconimage = $mydb->UploadImage($imagename,$tmp_name,$imagepath);
		$data['iconimage'] = $iconimage;
	}
	
	if(isset($_FILES['map']['name']) && $_FILES['map']['size']>0)
	{
		$imagename = $mydb->clean4imagecode($_FILES['map']['name']);
		$tmp_name=$_FILES['map']['tmp_name'];
		$imagepath='../img/package/';	
		$packageimage = $mydb->UploadImage($imagename,$tmp_name,$imagepath);
		$data['map'] = $packageimage;
	}
	
	
	
	foreach($_POST as $key=>$value)
	{
		if($key!='btnSubmit' && $key!='imagetitle' && $key!='imid')
			$data[$key]=$value;
	}
	$data['ordering'] = $mydb->getValue('ordering','tbl_package','aid='.$aid.' ORDER BY ordering DESC LIMIT 1')+1;
	$data['urlcode'] = $mydb->clean4urlcode($_POST['title']);
	
	$package_id=$mydb->insertQuery('tbl_package',$data,'id='.$id);
	
	for($i=0;$i<5;$i++)
	{
		$imagesize = $_FILES['imagename']['size'][$i];
		//echo $imagesize."<br>";
		if($imagesize>0)
		{
			//ready to upload
			$imagename = rand(1111,9999).$mydb->clean4imagecode(($_FILES['imagename']['name'][$i]));
			$source = $_FILES['imagename']['tmp_name'][$i];
			$dest = '../img/package/'.$imagename;
			if(copy($source,$dest))
			{				
				$data2='';
				$data2['package_id'] = $package_id;
				$data2['imagename'] = $imagename;
				$data2['imagetitle'] = $_POST['imagetitle'][$i];
				$mydb->insertQuery('tbl_image',$data2);	
			}
		}
	}
	$mydb->redirect(ADMINURLPATH."package".$refreshlink."&msg=2");
}
include("fckeditor/fckeditor.php") ;
$rasPackage = $mydb->getArray('*','tbl_package','id='.$id);
?>
<form action="" method="post" enctype="multipart/form-data" name="frmPage">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="FormTbl">
  <tr class="TitleBar">
    <td colspan="3" class="TtlBarHeading"><?php echo $btnValue;?> Package<div style="float:right">
      <input type="button" name="btnList" id="btnList" value="List" class="button" onClick="window.location='<?php echo ADMINURLPATH;?>package<?php echo $refreshlink;?>'" />
      <input type="submit" name="btnSubmit" id="btnSubmit" value="<?php echo $btnValue;?>" class="button" /></div></td>
  </tr>
  <?php if(isset($_GET['msg']) && $_GET['msg'] =='1'){ ?>
  <tr>
    <td colspan="3" class="adminsucmsg">Package info has been updated.</td>
    </tr>
  <?php } ?>
  <tr>
    <td class="TitleBarA" width="170"><strong>Activity</strong></td>
    <td width="100" colspan="2" class="TitleBarA">
    	<select name="aid" id="aid" class="inputbox">
        <option value="0">None</option>
		<?php
        $counter = 0;
        $resActivity = $mydb->getQuery('*','tbl_activity');
        while($rasActivity = $mydb->fetch_array($resActivity))
        {
		if(isset($_GET['aid']))
			$aid = $_GET['aid'];
		else
			$aid = $rasPackage['aid'];
        ?>
        <option value="<?php echo $rasActivity['id'];?>" <?php if($rasActivity['id']==$aid) echo 'selected';?>><?php echo $rasActivity['title'];?></option>
        <?php
		}
		?>
        </select>    </td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Name</strong></td>
    <td colspan="2" class="TitleBarA"><input name="title" type="text" value="<?php echo $rasPackage['title'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Duration</strong></td>
    <td colspan="2" class="TitleBarA"><input name="duration" type="text" value="<?php echo $rasPackage['duration'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Cost (US$)</strong></td>
    <td colspan="2" class="TitleBarA"><input name="cost" type="text" value="<?php echo $rasPackage['cost'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Cost (NRs)</strong></td>
    <td colspan="2" class="TitleBarA"><input name="cost_npr" type="text" value="<?php echo $rasPackage['cost_npr'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Show Cost in </strong></td>
    <td colspan="2" class="TitleBarA">
    	<input type="radio" name="show_cost" value="" <?php if($rasPackage['show_cost']=="") echo 'checked';?>> USD
  		<input type="radio" name="show_cost" value="_npr" <?php if($rasPackage['show_cost']=="_npr") echo 'checked';?>> NRs
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Area</strong></td>
    <td colspan="2" class="TitleBarA"><input name="area" type="area" value="<?php echo $rasPackage['area'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Min. Group Size</strong></td>
    <td colspan="2" class="TitleBarA"><input name="mingroupsize" type="text" value="<?php echo $rasPackage['mingroupsize'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Best Season</strong></td>
    <td colspan="2" class="TitleBarA"><input name="bestseason" type="text" value="<?php echo $rasPackage['bestseason'];?>" class="inputbox"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Upgrade this package</strong></td>
    <td colspan="2" class="TitleBarA"><label>
      <select name="upgrade_this_package" id="upgrade_this_package">
      	<option value="0">No</option>
      	<option value="1" <?php if($rasPackage['upgrade_this_package']=='1') echo 'selected';?>>Yes</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong> Show in homepage</strong></td>
    <td colspan="2" class="TitleBarA"><label>
      <select name="showinhomepage" id="showinhomepage">
      	<option value="0">No</option>
      	<option value="1" <?php if($rasPackage['showinhomepage']=='1') echo 'selected';?>>Yes</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Description</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$description = stripslashes($rasPackage['description']);
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('description') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $description ;
		$oFCKeditor->Create() ;
		?>        </td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Icon Image</strong></td>
    <td class="TitleBarA"><?php $iconpath='../img/package/thumb/'.$rasPackage['iconimage']; if(!empty($rasPackage['iconimage']) && file_exists($iconpath)){?><img src="<?php echo $iconpath;?>" alt="Package Image" width="220px"><br/><?php }?><input type="file" name="iconimage" id="iconimage"> <strong>Note:</strong> Image Size should be in the ratio of 202px X 155px.</td>
  </tr>
  <tr>
	  <td class="TitleBarA"><strong>Images</strong></td>
	  <td class="TitleBarA"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="FormTbl">
        <tr>
          <td class="TitleBarB"><strong>Image Title</strong></td>
          <td class="TitleBarB"><strong>Image</strong></td>
          <td class="TitleBarB">&nbsp;</td>
        </tr>
        <?php
		if($id>0)
		{
		$resGalImage = $mydb->getQuery('*','tbl_image','package_id='.$id);
		while($rasGalImage = $mydb->fetch_array($resGalImage))
		{
		?>
        <tr>
          <td class="TitleBarA"><input type="text" name="imagetitle[]" id="imagetitle[]" class="inputBox" style="width:500px;" value="<?php echo $rasGalImage['imagetitle'];?>"><input name="imid[]" type="hidden" value="<?php echo $rasGalImage['id'];?>"></td>
          <td class="TitleBarA"><img src="../img/package/<?php echo $rasGalImage['imagename'];?>" width="200"></td>
          <td class="TitleBarA"><a href="javascript:deleteImage('<?php echo $rasGalImage['id'];?>');"><img src="images/action_delete.gif" alt="Delete" width="24" height="24" title="Delete"></a></td>
        </tr>
        <?php
		}
		}
		for($i=0;$i<5;$i++)
		{
		?>
        <tr>
          <td class="TitleBarA"><input type="text" name="imagetitle[]" id="imagetitle[]" class="inputBox" style="width:500px;"></td>
          <td class="TitleBarA"><input type="file" name="imagename[]" id="imagename[]"></td>
          <td class="TitleBarA">&nbsp;</td>
        </tr>
        <?php
		}
		?>
        <tr>
        	<td colspan="3"><strong>Note:</strong> Image Size should be in the ratio of 980px X 425px for the best view.</td>
        </tr>
      </table></td>
    </tr>
  
  <tr>
    <td class="TitleBarA"><strong>Map</strong></td>
    <td colspan="2" class="TitleBarA"><?php $mappath='../img/package/'.$rasPackage['map']; if(!empty($rasPackage['map']) && file_exists($mappath)){?><img src="<?php echo $mappath;?>" alt="Map" width="220px" style="padding-bottom:2px;"><a href="javascript:deleteMap('<?php echo $rasPackage['id'];?>');"><img style="position:relative; left:-23px; top:0px;" src="images/action_delete.gif" alt="Delete" width="24" height="24" title="Delete"></a><br/><?php }?><input type="file" name="map" id="map"></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Highlights</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$highlights = stripslashes($rasPackage['highlights']);
		
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('highlights') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $highlights ;
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Accomodations</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$accomodations = stripslashes($rasPackage['accomodations']);
		
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('accomodations') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $accomodations ;
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Itinerary</strong></td>
    <td colspan="2" class="TitleBarA">&nbsp;</td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Includes</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$includes= stripslashes($rasPackage['includes']);
		
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('includes') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $includes;
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Excludes</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$excludes= stripslashes($rasPackage['excludes']);
		
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('excludes') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $excludes;
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Trip Notes</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$trip_notes= stripslashes($rasPackage['trip_notes']);
		
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('trip_notes') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $trip_notes;
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Trip Reviews</strong></td>
    <td colspan="2" class="TitleBarA"><?php
		$trip_reviews= stripslashes($rasPackage['trip_reviews']);
		
		
		$sBasePath = 'fckeditor/';
		
		$oFCKeditor = new FCKeditor('trip_reviews') ;
		$oFCKeditor->BasePath = $sBasePath ;
		$oFCKeditor->Width = '100%' ;
		$oFCKeditor->Height = '350px' ;
		$oFCKeditor->Value = $trip_reviews;
		$oFCKeditor->Create() ;
		?></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Page Title</strong></td>
    <td class="TitleBarA" colspan="2"><textarea name="metatitle" id="metatitle" cols="45" rows="5" style="width:100%"><?php echo stripslashes($rasPackage['metatitle']);?></textarea></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Meta Keywords</strong></td>
    <td class="TitleBarA" colspan="2"><textarea name="metakeywords" id="metakeywords" cols="45" rows="5" style="width:100%"><?php echo stripslashes($rasPackage['metakeywords']);?></textarea></td>
  </tr>
  <tr>
    <td class="TitleBarA"><strong>Meta Description</strong></td>
    <td class="TitleBarA" colspan="2"><textarea name="metadescription" id="metadescription" cols="45" rows="5" style="width:100%"><?php echo stripslashes($rasPackage['metadescription']);?></textarea></td>
  </tr>
  <tr>
    <td class="TitleBarA">&nbsp;</td>
    <td colspan="2" class="TitleBarA"><input type="submit" name="btnSubmit" id="btnSubmit" value="<?php echo $btnValue;?>" class="button" /></td>
  </tr>
</table>
</form>