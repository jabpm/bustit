<?php 


//require('functions.php');



// good ones -- , '959893', '2043465', '981251', '960850', '977134', '2040180', '2043524', '960290', '960585', '2043533', '2040386', '4412352', '981388', '2043436'
global $feed_array; 
$feed_array = array('2040443', '959893', '2043465', '981251', '960850', '977134', '2040180', '2043524', '960290', '960585', '2043533', '2040386', '4412352', '981388', '2043436');

global $atom_array;
$atom_array = array();




foreach ( $feed_array as $feed_me ){
	
	//load simplexml atom for each
	$xml = simplexml_load_file("http://www.dose.ca/".$feed_me.".atom");

	//load simplexml atom for 2040443 
	//$xml = simplexml_load_file("http://www.dose.ca/2040443.atom");

	//show what list we are looking at - we dont want photo galleries just yet.
	//echo '<h1>'. $feed_me .' - '. $xml->title .'</h1>';

		foreach ($xml->entry as $x) {
			
			//get the atom for each non blog post coming need for dose redesign.
			
				//look for title="[ more ]" && href="blogs.dose.ca" contains ------ tab=PHOT
							
				if ( $x->link['title'] == '[ more ]' && !strstr( $x->link['href'], 'blogs.dose.ca' ) && !strstr( $x->link['href'], 'photogallery' ) && !strstr( $x->link['href'], 'tab=PHOT' )){
		
					$push = get_atom_id($x->id);
					//echo $push."</br>";
					array_push( $atom_array, $push );
					
					//check link for gallery
		
				} elseif ( strstr( $x->link['href'], 'photogallery' ) ){
					
					//echo 'Photo gallery - skipping</br>';
				
				}
				
			
		}


// do this for each list, comment out for now until parser is ready.
}


//print_r($atom_array);



foreach ( $atom_array as $grab_them_cakes ) {
	
	
	//load each atom article and get the proper tags, images, image captions etc. this could take a while. save locally,
	//http://www.dose.ca/4906693.atom
	
	$xml_articles = simplexml_load_file("http://www.dose.ca/" . $grab_them_cakes . ".atom");
	
		foreach ($xml_articles->entry as $article_details){
			
			//let's see all of the article titles
			echo $article_details -> title."<br/>";
			
		}
	
}







?>