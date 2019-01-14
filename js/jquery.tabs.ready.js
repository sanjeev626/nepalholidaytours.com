// JavaScript Document
$(document).ready(function() {
 
	//Default Action
	$(".tabContent").hide(); //Hide all content
	$("ul.tabNavigation li:first").addClass("active").show(); //Activate first tab
	
	$(".tabContent:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabNavigation li").click(function() {
		$("ul.tabNavigation li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tabContent").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
		
		
		
	});
	

 
});