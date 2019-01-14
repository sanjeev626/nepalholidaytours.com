<?php
// client
define("ACTIONNAME","manager");
define("URLPATH","index.php?".ACTIONNAME."=");
if($_SERVER['HTTP_HOST'] == 'nepalholidaytours.dac' || $_SERVER['HTTP_HOST'] == '127.0.0.1')
{
	define("SITEROOT","http://nepalholidaytours.dac/");
	define("SITEROOTADMIN","http://nepalholidaytours.dac/dacadmin");
	define("SITEROOTDOC",$_SERVER['DOCUMENT_ROOT']."/");
}
else
{
	define("SITEROOT","http://www.nepalholidaytours.com/");
	define("SITEROOTADMIN",SITEROOT."dacadmin");
	define("SITEROOTDOC",$_SERVER['DOCUMENT_ROOT']."/");
}

define("FILEPATH","includes/");
define("PAGING","dashboard/");
define("IMAGEPATH","images/");

define("USERID","sanjeevdbclientuser");
$allowedimageext = array ("jpg", "jpeg", "gif", "png");
$allowedextfile = array ("pdf", "doc", "docx", "txt", "xls");

// admin
define("SITEADMINHEADER","nepalholidaytours.com");
define("SITEADMINFOOTER","2014 nepal holiday tours");

define("ADMINACTIONNAME","manager");
define("ADMINURLPATH","index.php?".ADMINACTIONNAME."=");
define("ADMINUSER","sanjeevdbdfg546gfddgdfg");
define("SECRETPASSWORD","sanjeevsinghdbementendc");
?>