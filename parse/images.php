<?php 

require('functions.php');

global $feed_array;

//monday feb 27
//$feed_array = array('6212959', '6205203', '6206006', '6205932', '6206016', '6203899', '6205432', '6205940', '6205093', '6204635', '6204605', '6204456', '6203896', '5768045', '6199112', '6198631', '6198611', '6198151', '6198262', '6197011', '6205203', '6212959', '6205940', '6204605', '6204635', '6205093', '6203865', '6198151', '6198262', '6198631', '6197011', '6204456', '6198611', '6200799', '6200813', '6200806', '6199112', '6197709', '6200813', '6212959', '6203894', '6212068', '6203896', '6203899', '6203924', '6203922', '6203932', '6203923', '6203920', '6205932', '6212490');

//tuesday feb 28
//$feed_array = array('6216841', '6216457', '6216033', '6215963', '6215913', '6212184', '6216033', '6216457', '6215963', '6215913', '6212184', '6205643');

//tuesday mar 6 


//tuesday march 13
$feed_array = array('6293479', '6289628', '6288670', '6289643', '6288916', '6288895', '6285677', '6288914', '6285513', '6278958', '6279358', '6277187', '6272949', '6279348', '6279342', '6278420', '6278118', '6277944', '6277712', '6277859', '6277517', '6277303', '6277482', '6273076', '6277431', '6271510', '6271528', '6271208', '6270906', '6271142', '6269817', '6269815', '6266815', '6266474', '6266342', '6266243', '6264484', '6265390', '6265448', '6265445', '6288670', '6289628', '6288895', '6288916', '6285513', '6285677', '6278118', '6277944', '6277859', '6273076', '6271437', '6271528', '6271208', '6266815', '6266243', '6265445', '6265448', '6265390', '6260095', '6260642', '6259232', '6259646', '6258345', '6258496', '6253995', '6259239', '6272949', '6289643', '6288914', '6277517', '6270906', '6266342', '6260223', '6258916', '6290292', '6279378', '6288138', '6278454', '6266347', '6277712', '6278420', '6278134', '6278116', '6271510', '6269817', '6264484', '6264109', '6264120', '6259943', '6266474', '6264120', '6264109', '6278958', '6285677', '6289341', '6277482', '6271095', '6266058', '6264681', '6264877', '6277187', '6277303', '6277147', '6277195', '6277295', '6289475', '6279176', '6278254', '6277504', '6271142');


// Function to save all image to loac directory for wordpress 'security' reasons.
echo '<h1>images</h1>';
//print_r($atom_array);

//exit();

foreach ( $feed_array as $feed_me ){
	
	$xml = simplexml_load_file($feed_me.".atom");
	
	foreach ($xml->entry as $x) {
	
		foreach ( $x-> link as $linktype ){
	
			if ( $linktype['type'] == 'image/jpeg' ){
			
				$image_bin = str_replace ( '.bin', '', jb_featureimage ( $linktype['href'] ) );
				$image_caption = $linktype['title'];
				
			} else{
			
					
				
			}
	
		}

		$url = 'http://app.canada.com/SouthPARC/mobile.svc/Binary/'.$image_bin.'?.jpg';
		$img = $image_bin.'.jpg';
		file_put_contents($img, file_get_contents($url));
		
}	







}



/*

global $missing_array;
$missing_array = array();




// Function to save all image to loac directory for wordpress 'security' reasons.

foreach ( $feed_array as $feed_me ){
	
	$xml = simplexml_load_file("http://www.dose.ca/".$feed_me.".atom");
	
	foreach ($xml->entry as $x) {
	
		foreach ( $x-> link as $linktype ){
	
			if ( $linktype['type'] == 'image/jpeg' ){
			 
			 
				
			} else{
			
				array_push( $missing_array,  str_replace ( '.bin', 'tag:www.dose.ca:content=', $x->id ) );
				
			}
	
		}

		
}	

}


print_r($missing_array);

foreach ($missing_array as $savethisimage ){
	
		$url = 'http://app.canada.com/SouthPARC/mobile.svc/Binary/'.$image_bin.'?.jpg';
		$img = $savethisimage.'.jpg';
		file_put_contents($img, file_get_contents($url));

}

*/

?>

