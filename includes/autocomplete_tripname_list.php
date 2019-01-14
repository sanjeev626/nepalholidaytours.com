<?php
require_once("../classes/call.php");
 $q=$_GET["term"];
 
 $query=mysql_query("SELECT id,title,duration,cost_npr FROM tbl_package WHERE title LIKE '$q%' ORDER BY title LIMIT 20");
 $json=array();
 
    while($rasTrip=mysql_fetch_array($query)){
    $json[]=array(
        'value'=> $rasTrip["title"],
        'label'=> $rasTrip["title"].' - '.$rasTrip["duration"],
        'duration'=> $rasTrip["duration"],
        'cost_npr'=> $rasTrip["cost_npr"]
        );
    }
 echo json_encode($json);

?> 