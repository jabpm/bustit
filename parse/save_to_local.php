<?php 

require('functions.php');


echo '<h1>Save to local</h1>';

//this is the sp6 list of articles
global $local_feed_array; 
$local_feed_array = array('2040443', '959893', '2043465', '981251', '960850', '977134', '2040180', '2043524', '960290', '960585', '2043533', '2040386', '4412352', '981388', '2043436');


//save the lists to local
foreach ($local_feed_array as $savethisfeed ){
	
		$url = 'http://www.dose.ca/'.$savethisfeed.'.atom';
		$feed = $savethisfeed.'.atom';
		file_put_contents($feed, file_get_contents($url));
		
}

global $atom_array;
$atom_array = array();

foreach ( $local_feed_array as $feed_me ){
	
		//load simplexml atom for each
		$xml = simplexml_load_file($feed_me.".atom");
	
		//load simplexml atom for 2040443 
		//$xml = simplexml_load_file("http://www.dose.ca/2040443.atom");
	
		//show what list we are looking at - we dont want photo galleries just yet.
		//echo '<h1>'. $feed_me .' - '. $xml->title .'</h1>';
	
			foreach ($xml->entry as $x) {
				
				//get the atom for each non blog post coming need for dose redesign.
				
					//look for title="[ more ]" && href="blogs.dose.ca" contains ------ tab=PHOT
								
					if ( $x->link['title'] == '[ more ]' && !strstr( $x->link['href'], 'blogs.dose.ca' ) && !strstr( $x->link['href'], 'photogallery' ) && !strstr( $x->link['href'], 'tab=PHOT' )){
			
						$push = get_atom_id($x->id);
						
						// feed file exists?
						$feed_local = $push . ".atom";
						
						// if the atom feed for each new article doesn't exist locally, we need it in the new array. 
						if ( !file_exists( $feed_local ) ){
						
						//echo $push."</br>";
						array_push( $atom_array, $push );
						
						} else {
							
							//echo "file exists: $feed_local<br/>";
							
						}
						
						//check link for gallery
			
					} elseif ( strstr( $x->link['href'], 'photogallery' ) ){
						
						//echo 'Photo gallery - skipping</br>';
					
					}
					
				
			}
			
	


// do this for each list, comment out for now until parser is ready.
}

print_r( $atom_array );

//exit();
//save the lists to local
foreach ( $atom_array  as $savethisfeed ){
	
		$url = 'http://www.dose.ca/'.$savethisfeed.'.atom';
		$feed = $savethisfeed.'.atom';	
		file_put_contents($feed, file_get_contents($url));

}





?>