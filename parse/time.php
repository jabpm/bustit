<?php


function wp_friendly_time($time){

	$time = str_replace( 'T', ' ', $time );
	$time = str_replace( 'Z', '', $time );
	$format = 'Y-m-d H:i:s';
	$date = DateTime::createFromFormat($format, $time);
	echo $date->format('D, d M Y H:i:s +0000');

}


wp_friendly_time ( '2012-02-22T16:07:52Z' );

?>


