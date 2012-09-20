<?php 

$output = '';


global $atom_array;
$atom_array  = array('6212959', '6205203', '6206006', '6205932', '6206016', '6203899', '6205432', '6205940', '6205093', '6204635', '6204605', '6204456', '6203896', '5768045', '6199112', '6198631', '6198611', '6198151', '6198262', '6197011', '6205203', '6212959', '6205940', '6204605', '6204635', '6205093', '6203865', '6198151', '6198262', '6198631', '6197011', '6204456', '6198611', '6200799', '6200813', '6200806', '6199112', '6197709', '6200813', '6212959', '6203894', '6212068', '6203896', '6203899', '6203924', '6203922', '6203932', '6203923', '6203920', '6205932', '6212490','6293479', '6289628', '6288670', '6289643', '6288916', '6288895', '6285677', '6288914', '6285513', '6278958', '6279358', '6277187', '6272949', '6279348', '6279342', '6278420', '6278118', '6277944', '6277712', '6277859', '6277517', '6277303', '6277482', '6273076', '6277431', '6271510', '6271528', '6271208', '6270906', '6271142', '6269817', '6269815', '6266815', '6266474', '6266342', '6266243', '6264484', '6265390', '6265448', '6265445', '6288670', '6289628', '6288895', '6288916', '6285513', '6285677', '6278118', '6277944', '6277859', '6273076', '6271437', '6271528', '6271208', '6266815', '6266243', '6265445', '6265448', '6265390', '6260095', '6260642', '6259232', '6259646', '6258345', '6258496', '6253995', '6259239', '6272949', '6289643', '6288914', '6277517', '6270906', '6266342', '6260223', '6258916', '6290292', '6279378', '6288138', '6278454', '6266347', '6277712', '6278420', '6278134', '6278116', '6271510', '6269817', '6264484', '6264109', '6264120', '6259943', '6266474', '6264120', '6264109', '6278958', '6285677', '6289341', '6277482', '6271095', '6266058', '6264681', '6264877', '6277187', '6277303', '6277147', '6277195', '6277295', '6289475', '6279176', '6278254', '6277504', '6271142');


foreach ( $atom_array as $feed_me ){



$atom = simplexml_load_file( $feed_me . ".atom" );


foreach ($atom->entry as $x) {

	foreach ($x->category as $tagname) {
		
		 //&& ( $catlink['title'] == '[ more ]' )
		
		
		//echo $catlink['title'];
		if ( !empty ( $tagname['term'] ) && ( $tagname['label'] == 'ConTopic' )){
			array_push( $tag_array, $tagname['term']  );
		
		
		
		}
	}





$tag_array = array_unique($tag_array);


foreach ( $tag_array as $tag => $tname){

	//echo $first .' last='. $last;
	//exit();
	$output .= "<wp:tag>\n\n

<wp:term_id>".$tag_id."</wp:term_id>\r\n

<wp:tag_slug>". strtolower( jb_slugs ( $tname ) )."</wp:tag_slug>\r\n

<wp:tag_name>".  ucfirst( $tname ) ."</wp:tag_name>\r\n

</wp:tag>\r\n\n";
	
	$tag_id++;
	
}



$output .= '<generator>http://wordpress.org/?v=3.3.1</generator>';

/**
	
	Setup the content
	
	**/


foreach ($xml->entry as $x) {

$output .= "<item>

<title>".$x -> title."</title>\n\n

<pubDate>". wp_friendly_time ( $x -> updated )/*Tue, 21 Feb 2012 18:14:08 +0000*/ ."</pubDate>\n\n

<dc:creator>admin</dc:creator>\n\n

<guid isPermaLink=\"false\">http://localhost/dose3/?p=". jb_postid ( $x -> id )  ."</guid>\n\n

<description></description>\n\n

<content:encoded><![CDATA[" . jb_entities ( $x -> content ). "]]></content:encoded>\n\n

<excerpt:encoded><![CDATA[" . jb_entities ( $x -> summary ). "]]></excerpt:encoded>\n\n\n

<wp:post_id>". jb_postid ( $x-> id )  ."</wp:post_id>\n\n

<wp:post_date>".wp_friendly_time ( $x -> updated )."</wp:post_date>\n\n

<wp:post_date_gmt>".wp_friendly_time ( $x -> updated )."</wp:post_date_gmt>\n\n

<wp:comment_status>open</wp:comment_status>\n\n";


// cleanup the title for a nice looking slug



$output .= "<wp:ping_status>open</wp:ping_status>\n
<wp:post_name>". strtolower( jb_slugs ( $x->title ) ) ."</wp:post_name>\n
<wp:status>publish</wp:status>\n
<wp:post_parent>0</wp:post_parent>\n
<wp:menu_order>0</wp:menu_order>\n
<wp:post_type>post</wp:post_type>\n
<wp:post_password></wp:post_password>\n
<wp:is_sticky>0</wp:is_sticky>\n\n









<category domain=\"post_tag\" nicename=\"". jb_puncfree( strtolower( jb_slugs ( $x -> title ) ) ) ."\"><![CDATA[" . jb_puncfree ( $x -> title ). "]]></category>\n\n

<category domain=\"category\" nicename=\"".strtolower( jb_slugs ( $x->category['term'] ) )."\"><![CDATA[".jb_puncfree ( $x->category['term'] )."]]></category>\n\n


<wp:postmeta>
			<wp:meta_key>_edit_last</wp:meta_key>
			<wp:meta_value><![CDATA[1]]></wp:meta_value>
		</wp:postmeta>		
		
		<wp:postmeta>\n\n

<wp:meta_key>_thumbnail_id</wp:meta_key>\n\n

<wp:meta_value><![CDATA[";

/*
foreach ( $x-> link as $linktype ){


if ( $linktype['type'] == 'image/jpeg' ){

$output .= str_replace ( '.bin', '', jb_featureimage ( $linktype['href'] ) );

}


} */

$output .= "]]></wp:meta_value>

</wp:postmeta>\n\n\r

</item>\n\n\n\n\n\n\n";



//exit();
// Setup the image attachment post









// grab the image number - used for title, image url attachment url etc.
foreach ( $x-> link as $linktype ){

	if ( $linktype['type'] == 'image/jpeg' ){
	
		$image_bin = str_replace ( '.bin', '', jb_featureimage ( $linktype['href'] ) );
	    $image_caption = $linktype['title'];
	}

}


//echo $x->link;
//exit();

$output .= "<item>

		<title>".$image_bin."title</title>
        
		<link>http://localhost/dose2/?attachment_id=".$image_bin."</link>
        
		<pubDate>".wp_friendly_time ( $x -> updated )."</pubDate>
        
		<dc:creator>admin</dc:creator>
        
		<guid isPermaLink=\"false\">http://localhost/dose2/parse/". $image_bin.".jpg</guid>
        
		<description>". jb_entities ( $image_caption )."</description>
        
		<content:encoded><![CDATA[ ". jb_entities ( $image_caption ) . " ]]></content:encoded>

		<excerpt:encoded><![CDATA[ " .  jb_entities ( $image_caption ). " ]]></excerpt:encoded>
        
		<wp:post_id>" .  $image_bin. " </wp:post_id>
        
		<wp:post_date>" .  wp_friendly_time ( $x -> updated ). " </wp:post_date>
        
		<wp:post_date_gmt>" .  wp_friendly_time ( $x -> updated ). " </wp:post_date_gmt>
        
		<wp:comment_status>open</wp:comment_status>
        
		<wp:ping_status>open</wp:ping_status>
		
        <wp:post_name>" .  $image_bin. "  post</wp:post_name>
		
        <wp:status>inherit</wp:status>
		
        <wp:post_parent>0</wp:post_parent>
		
        <wp:menu_order>0</wp:menu_order>
		
        <wp:post_type>attachment</wp:post_type>
		
        <wp:post_password></wp:post_password>
		
        <wp:is_sticky>0</wp:is_sticky>
		
        <wp:attachment_url>http://localhost/dose2/parse/" .  $image_bin. ".jpg</wp:attachment_url>
		
        <wp:postmeta>
			<wp:meta_key>_wp_attached_file</wp:meta_key>
			<wp:meta_value><![CDATA[2012/02/" .  $image_bin. ".jpg]]></wp:meta_value>
		</wp:postmeta>
        
		<wp:postmeta>
			<wp:meta_key>_wp_attachment_metadata</wp:meta_key>
			<wp:meta_value>";
			$output .= "<![CDATA[a:6:{s:5:\"width\";s:3:\"542\";s:6:\"height\";s:3:\"400\";s:14:\"hwstring_small\";s:23:\"height='94' width='128'\";s:4:\"file\";s:14:\"2012/02/" .  $image_bin. ".jpg\";s:5:\"sizes\";a:5:{s:9:\"thumbnail\";a:3:{s:4:\"file\";s:14:\"" .  $image_bin. "-150x150.jpg\"";
			$output .= ";s:5:\"width\";s:3:\"150\";s:6:\"height\";s:3:\"150\";}s:6:\"medium\";a:3:{s:4:\"file\";s:14:\"" .  $image_bin."-300x221.jpg\";s:5:\"width\";s:3:\"300\";s:6:\"height\";s:3:\"221\";}s:14:\"post-thumbnail\";a:3:{s:4:\"file\";s:14:\"" .  $image_bin. "-542x288.jpg\";s:5:\"width\";s:3:\"542\";s:6:\"height\";s:3:\"288\";}s:13:\"large-feature\";a:3:{s:4:\"file\";s:14:\"" .  $image_bin. "-542x288.jpg\";s:5:\"width\";s:3:\"542\";s:6:\"height\";s:3:\"288\";}s:13:\"small-feature\";a:3:{s:4:\"file\";s:14:\"" .  $image_bin. "-406x300.jpg\";s:5:\"width\";s:3:\"406\";s:6:\"height\";s:3:\"300\";}}";
			$output .= "s:" .  $image_bin. ":\"image_meta\";a:" .  $image_bin. ":{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";}}]]></wp:meta_value>
		</wp:postmeta>
	</item>";
	
	

	
	
}












































}



echo $output;


exit();








/*




foreach ($xml->entry as $x) {
echo '<item>';
echo '<title>'.$x->title.'</title>';
echo '<pubDate>'.$x->published.'</pubDate>';
echo '<link>'.$x->link[0].'</link>';
echo '<dc:creator>'.$x->author->name.'</dc:creator>';

foreach ($x->category as $cat) {

	echo '<category domain="post_tag" nicename="'. strtolower($cat['term']).'"><![CDATA['.$cat['term'].']]></category>';

}

$linki = 0;
foreach ($x->link as $link) {
if ( $linki == 0 ){
	echo 'Abstract='.$link['Abstract'].'<br/>';
}
	if ($link['type']=='image/jpeg'){
		echo 'Link= <img src="http://www.dose.ca/'.$link['href'].'"/>-'.$link['Abstract'].'<br/>';
	}
	

	
	if (stristr($link['href'], 'photogallery', true)){
	
	
		//this will need to be converted into a scraper for photogalleries from the dose feed
		//echo '<h1>Photogallery= '.$link['href'].'</h1><br/>';
		
		
	}
	
		$linki++;
}

foreach ($x->content as $content) {


echo '<content:encoded><![CDATA[\''.$content->div.'\']]><content:encoded>';


}



echo '</item>';
}


*/
}
?>
</channel>
</rss>