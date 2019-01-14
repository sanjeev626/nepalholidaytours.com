<?php   
$resItinerary = $mydb->getQuery('*','tbl_itinerary');		
while($rasItinerary = $mydb->fetch_array($resItinerary))
{
	$pid = $rasItinerary['pid'];
	$itid = $rasItinerary['id'];
	$services=explode('---',$rasItinerary['services']);
	for($i=0;$i<count($services);$i++)
	{
		if(!empty($services[$i]))
		{
			$data = array(			
			    "pid" => $pid,
			    "itinerary_id" => $itid,
			    "service" => $services[$i],
			);
			//print_r($data); echo "<br>";
			$mydb->insertQuery('tbl_itinerary_services',$data);
		}
	}
}
?>