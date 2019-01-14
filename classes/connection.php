<?php

if($_SERVER['HTTP_HOST'] == 'nepalholidaytours.dac' || $_SERVER['HTTP_HOST'] == '127.0.0.1')

{

	define("DBSERVER","localhost");

	define("DBUSER","root");

	define("DBPASSW",'');

	define("DBNAME","nepalholidaytours");

}

else
{
	define("DBSERVER","localhost");

	define("DBUSER","clprj036_nepalho");

	define("DBPASSW",'3&8(aR[QpXis');

	define("DBNAME","clprj036_nepalholidaytours");
}

	

?>