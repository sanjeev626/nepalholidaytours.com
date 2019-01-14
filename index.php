<?php
ob_start();
error_reporting(E_ALL);
session_start();
require_once("classes/call.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $metatitle;?></title>
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="5 Days">
<meta name="classification" content="Trekking/Tour Operator">
<meta name="Googlebot" content="index, follow">

<?php /*<link rel="stylesheet" href="<?php echo SITEROOT; ?>css/keshav.css" />
<link rel="stylesheet" href="<?php echo SITEROOT; ?>css/custom.css" />
*/ ?>
<script src="<?php echo SITEROOT;?>js/jquery-3.1.0.min.js"></script>

<link href="<?php echo SITEROOT;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
<script src="<?php echo SITEROOT;?>js/bootstrap.min.js"></script>


<link rel="shortcut icon" href="<?php echo SITEROOT;?>img/favicon.ico">
<link rel="stylesheet" href="<?php echo SITEROOT;?>prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />


<script type="text/javascript" src="<?php echo SITEROOT;?>js/jquery-1.6.2.min.js"></script>
<script src="<?php echo SITEROOT;?>prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        
<?php /*?><script type="text/javascript" src="<?php echo SITEROOT; ?>js/jquery.min.js"></script><?php */?>
<script type="text/javascript" src="<?php echo SITEROOT; ?>js/jquery.tabs.ready.js"></script>
<script type="text/javascript" src="<?php echo SITEROOT;?>js/validation.js"></script>
<script type="text/javascript">
	var SITEROOT = '<?php echo SITEROOT;?>calendar/images/';
</script>
<link type="text/css" rel="stylesheet" href="<?php echo SITEROOT;?>calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="<?php echo SITEROOT;?>calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

</head>
<body>
<!--<div class="main">-->
<header>
    <div class="container-fluid hd-bg"></div>
</header>
<?php
	include(SITEROOTDOC.'includes/header.php');
	include($pagepath);
	include(SITEROOTDOC.'includes/footer.php');
?>
<!--</div>main-->


</body>
</html>