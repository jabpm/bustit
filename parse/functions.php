<?php


function jb_slugs( $title ){

	$slugme = str_replace(' ', '-', $title);
	$slugme = str_replace('\'', '', $slugme);
	$slugme = str_replace('"', '', $slugme);
	$slugme = str_replace(',', '', $slugme);
	$slugme = str_replace('!', '', $slugme);
	$slugme = str_replace('(', '', $slugme);
	$slugme = str_replace(')', '', $slugme);
	$slugme = str_replace('.', '', $slugme);
	$slugme = str_replace('----', '', $slugme);
	$slugme = str_replace('---', '', $slugme);
	$slugme = str_replace('--', '', $slugme);
	$slugme = str_replace('--', '', $slugme);
	$slugme = str_replace(':', '', $slugme);
	$slugme = str_replace('?', '', $slugme);
	$slugme = str_replace('$', '', $slugme);
	$slugme = str_replace(';', '', $slugme);
	$slugme = str_replace('~', '-', $slugme);
	
	return $slugme;

}



function jb_puncfree( $title ){

	$slugme = str_replace('\'', '', $title);
	$slugme = str_replace('"', '', $slugme);
	$slugme = str_replace(',', '', $slugme);
	$slugme = str_replace('!', '', $slugme);
	$slugme = str_replace('(', '', $slugme);
	$slugme = str_replace(')', '', $slugme);
	$slugme = str_replace('.', '', $slugme);
	$slugme = str_replace(':', '', $slugme);
	$slugme = str_replace('’', '', $slugme);
	$slugme = str_replace('?', '', $slugme);
	$slugme = str_replace('$', '', $slugme);
	$slugme = str_replace(';', '', $slugme);
	$slugme = str_replace('~', ' ', $slugme);

	
	
	return $slugme;

}


function jb_postid($sourcelink) {
	
	$myid = preg_split ('/content\=/', $sourcelink );
	return $myid[1];
		
}

function jb_entities ($fixme) {
	
	$fixed = str_replace('&', '&amp;', $fixme);
	$fixed = str_replace('’', '\'', $fixed);
	
	return $fixed;
	
	
}

function jb_featureimage($enclosure_link) {
	
	$myimage = str_replace('http://www2.dose.ca/', '', $enclosure_link );
	return $myimage;
		
}



function jb_featureimage_id($enclosure_link) {
	
	$myimage = str_replace('http://www2.dose.ca/', '', $enclosure_link );
	return $myimage;
		
}



function wp_friendly_time($time){

	$time = str_replace( 'T', ' ', $time );
	$time = str_replace( 'Z', '', $time );
	$format = 'Y-m-d H:i:s';
	$date = DateTime::createFromFormat($format, $time);
	return $date->format('D, d M Y H:i:s +0000');

}


function get_atom_id($atom_id){

		$story_id = str_replace ( 'tag:www.dose.ca:content=', '', $atom_id ) ;
		return $story_id;
	
}


?>