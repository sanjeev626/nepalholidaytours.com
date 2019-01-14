<?php

//define Admin
define("SITENAME",$mydb->getValue('title','tbl_admin','id=1'));
define("SITEEMAIL",$mydb->getValue('email','tbl_admin','id=1'));

$rasHome = $mydb->getArray('metatitle,metakeywords,metadescription','tbl_page','id=3');
$metatitle = stripslashes($rasHome['metatitle']);
$metakeywords = stripslashes($rasHome['metakeywords']);
$metadescription = stripslashes($rasHome['metadescription']);
$pagepath = 'includes/home.php';

if(isset($_GET['urlcode']))
{
	$urlcode = $_GET['urlcode'];
	//echo $urlcode;
	if($urlcode=="request-custom-tour")
	{
		$rasReq = $mydb->getArray('*','tbl_page','id=10');
		$metatitle = $rasReq['metatitle'];
		$metakeywords = $rasReq['metakeywords'];
		$metadescription = $rasReq['metadescription'];
		$contents = stripslashes($rasReq['contents']);		
		$pagepath = 'includes/template_custom_tour.php';
	}
	elseif($mydb->getCount('id','tbl_page','urlcode="'.$urlcode.'"')>0)
	{
		$pagepath = 'includes/template_page.php';
		$rasPage = $mydb->getArray('id,page,contents,metatitle,metakeywords,metadescription','tbl_page','urlcode="'.$urlcode.'"');

		$id = $rasPage['id'];
		$title = $rasPage['page'];
		$contents = stripslashes($rasPage['contents']);
		$metatitle = $rasPage['metatitle'];
		$metakeywords = $rasPage['metakeywords'];
		$metadescription = 	stripslashes($rasPage['metadescription']);
	}
	elseif($mydb->getCount('id','tbl_activity','urlcode="'.$urlcode.'"')>0)
	{
		$pagepath = 'includes/template_activity.php';
		$rasActivity = $mydb->getArray('id,title,description,activityimage,pagetitle,metakeywords,metadescription','tbl_activity','urlcode="'.$urlcode.'"');	
		$id = $rasActivity['id'];
		$title = $rasActivity['title'];	
		$description = $rasActivity['description'];	
		$activityimage = $rasActivity['activityimage'];		
		$metatitle = $rasActivity['pagetitle'];
		$metakeywords = $rasActivity['metakeywords'];
		$metadescription = 	$rasActivity['metadescription'];
	}
	elseif($mydb->getCount('id','tbl_package','urlcode="'.$urlcode.'"')>0)
	{
		//echo 'I am here';
		$rasPackage = $mydb->getArray('*','tbl_package','urlcode="'.$urlcode.'"');
		$id 				= 	$rasPackage['id'];
		$acid 				= 	$rasPackage['aid'];	
		$packagecode 		= 	$rasPackage['urlcode'];
		$imagepath 			= 	SITEROOT.'img/package/'.$rasPackage['packageimage'];
		if(!empty($rasPackage['map']))
			$mapdocpath		= 	SITEROOTDOC.'img/package/'.$rasPackage['map'];
		else
			$mapdocpath		=	'';
		$mappath 			= 	SITEROOT.'img/package/'.$rasPackage['map'];
		//$pdffile			=	$rasPackage['pdffile'];
		$packagecode		= 	stripslashes($rasPackage['urlcode']);
		$title				= 	stripslashes($rasPackage['title']);
		$duration 			= 	stripslashes($rasPackage['duration']);
		$cost 				= 	stripslashes($rasPackage['cost']);
		$cost_npr			= 	stripslashes($rasPackage['cost_npr']);
		$description 		= 	stripslashes($rasPackage['description']);
		$highlights 		= 	stripslashes($rasPackage['highlights']);
		$accomodations 		= 	stripslashes($rasPackage['accomodations']);
		$itinerary 			= 	stripslashes($rasPackage['itinerary']);
		//$additionalremarks 	= 	stripslashes($rasPackage['additionalremarks']);
		$additionalremarks 	= 	'';
		$includes 			= 	stripslashes($rasPackage['includes']);
		$excludes 			= 	stripslashes($rasPackage['excludes']);
		$trip_notes 		= 	stripslashes($rasPackage['trip_notes']);
		$trip_reviews 		= 	stripslashes($rasPackage['trip_reviews']);
		$metatitle = $rasPackage['metatitle'];
		$metakeywords = $rasPackage['metakeywords'];
		$metadescription = 	$rasPackage['metadescription'];
		//echo $packagecode;
		$pagepath = 'includes/template_package.php';
	}	
	elseif($mydb->getCount('id','tbl_country','urlcode="'.$urlcode.'"')>0)
	{
		//echo 'I am here';
		$rasCon = $mydb->getArray('*','tbl_country','urlcode="'.$urlcode.'"');
		$id 				= 	$rasCon['id'];	
		$title				= 	stripslashes($rasCon['title']);
		$contents 		= 	stripslashes($rasCon['description']);
		$metatitle = $rasCon['title'];
		
		$description = strip_tags($rasCon['description']);
		$metatitle = stripslashes($rasCon['metatitle']);
		$metakeywords = stripslashes($rasCon['metakeywords']);
		$metadescription = stripslashes($rasCon['metadescription']);
		$pagepath = 'includes/template_country.php';
	}
	elseif($mydb->getCount('id','tbl_faqs','urlcode="'.$urlcode.'"')>0)
	{
		//echo 'I am here';
		$rasFaqs = $mydb->getArray('*','tbl_faqs','urlcode="'.$urlcode.'"');
		$id 				= 	$rasFaqs['id'];	
		$title				= 	stripslashes($rasFaqs['title']);
		$contents 		= 	stripslashes($rasFaqs['contents']);
		$metatitle = $rasFaqs['metatitle'];
		$metakeywords = $rasFaqs['metakeywords'];
		$metadescription = 	$rasFaqs['metadescription'];
		$pagepath = 'includes/template_faqs_details.php';
	}
	elseif($urlcode=="testimonials")
	{		
		$metatitle = "Testimonials - East & West International Tours and Travels";
		$metakeywords = "Testimonials, East & West International Tours and Travels";
		$metadescription = "Testimonials for East & West International Tours and Travels.";
		$pagepath = 'includes/template_testimonial.php';
	}
	elseif($urlcode=="booking-form")
	{
		$packagecode=$_POST['packagecode'];
		$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		$title = stripslashes($rasPackage['title']);
		$duration = $rasPackage['duration'];
		$pagepath = 'includes/booking-form.php';
	}
    elseif($urlcode=="thank-you")
    {
        $pagepath = 'includes/template_thank_you.php';
    }
    elseif($urlcode=="payment-confirmation")
    {
        $pagepath = 'includes/template_payment_confirmation.php';
    }

	elseif($urlcode=="link-exchange")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		$metatitle = "Link Exchange - East & West International Tours and Travels";
		$metakeywords = "Link Exchange, Link Exchange with East & West International Tours and Travels, Exchange you links with East & West International Tours and Travels";
		$metadescription = "Exchange your links with East & West International Tours and Travels - Nepal Tour - Nepal travel agency for Nepal tour packages, Nepal short hiking, travel packages, Nepal trekking, Nepal Holidays.";
		$pagepath = 'includes/template_linkexchange.php';
	}	
	elseif($_GET['acturlcode']=="link-exchange")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');

		$rasLinkEx = $mydb->getArray('id,title,description','tbl_linkexchange','urlcode="'.$urlcode.'"');
		$lid = $rasLinkEx['id'];
		$linkexchangetitle = stripslashes($rasLinkEx['title']);
		$metatitle = $linkexchangetitle." - Link Exchange - East & West International Tours and Travels";
		$metakeywords = $linkexchangetitle." - Link Exchange, Link Exchange with East & West International Tours and Travels, Exchange you links with East & West International Tours and Travels";
		$metadescription = $linkexchangetitle." - Exchange your links with East & West International Tours and Travels - Nepal Tour - Nepal travel agency for Nepal tour packages, Nepal short hiking, travel packages, Nepal trekking, Nepal Holidays.";
		$description = stripslashes($rasLinkEx['description']);
		$pagepath = 'includes/link-exchange-single.php';
	}
	elseif($urlcode=="news-and-events")
	{
		$metatitle = "Recent News and Events - East & West International Tours and Travels";
		$metakeywords = "Recent News and Events from Nepal, Recent News and Events - East & West International Tours and Travels";
		$metadescription = "Read recent news and events from Nepal - East & West International Tours and Travels.";
		$pagepath = 'includes/news-and-events.php';
	}
	elseif($urlcode=="book-the-trip")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		/*$metatitle = "Booking - ";
		$metakeywords = "Booking";
		$metadescription = "Booking";*/
		$pagepath = 'includes/template_book_the_trip.php';
	}
	elseif($urlcode=="book-the-trip-npr")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		/*$metatitle = "Booking - ";
		$metakeywords = "Booking";
		$metadescription = "Booking";*/
		$pagepath = 'includes/template_book_the_trip_npr.php';
	}
		elseif($urlcode=="book-the-trip-usd")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		/*$metatitle = "Booking - ";
		$metakeywords = "Booking";
		$metadescription = "Booking";*/
		$pagepath = 'includes/template_book_the_trip_usd.php';
	}
	elseif($urlcode=="payment-usd")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		/*$metatitle = "Booking - ";
		$metakeywords = "Booking";
		$metadescription = "Booking";*/
		$pagepath = 'includes/template_payment_usd.php';
	}
	
	elseif($urlcode=="payment-npr")
	{
		//$rasPackage = $mydb->getArray('title,duration','tbl_package','urlcode="'.$packagecode.'"');
		/*$metatitle = "Booking - ";
		$metakeywords = "Booking";
		$metadescription = "Booking";*/
		$pagepath = 'includes/template_payment_npr.php';
	}
	
	elseif($urlcode=="our-team")
	{
		$rasTeamMeta = $mydb->getArray('*','tbl_page','id="7"');
		$metatitle = $rasTeamMeta['metatitle'];
		$metakeywords = $rasTeamMeta['metakeywords'];
		$metadescription = 	$rasTeamMeta['metadescription'];
		$pagepath = 'includes/template_team.php';
	}
	elseif($urlcode=="trip-reviews")
	{
		$rasReviewMeta = $mydb->getArray('*','tbl_page','id="6"');
		$metatitle = $rasReviewMeta['metatitle'];
		$metakeywords = $rasReviewMeta['metakeywords'];
		$metadescription = 	$rasReviewMeta['metadescription'];
		$pagepath = 'includes/template_trip_reviews.php';
		
		
	}
	elseif($urlcode=="faqs")
	{
		$pagepath = 'includes/template_faqs.php';		
		$rasFaqsMeta = $mydb->getArray('*','tbl_page','id="5"');
		$metatitle = $rasFaqsMeta['metatitle'];
		$metakeywords = $rasFaqsMeta['metakeywords'];
		$metadescription = 	$rasFaqsMeta['metadescription'];
	}
}
?>