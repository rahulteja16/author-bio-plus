<?php
/*
Plugin Name: Author Bio Plus
Version: 2.0
Description: Adds author bio box at the end of the post.
Author: Teja Amilineni	
*/

/* Version check */
global $wp_version;
$exit_msg='Author Bio Plus requires WordPress 2.5 or newer.
<a href="http://codex.wordpress.org/Upgrading_WordPress">Please
update!</a>';
if (version_compare($wp_version,"2.5","<"))
{
exit ($exit_msg);
}
/* */
// Retrieve Author Data
function author_bio_plus()
{
	
	$a_fname = get_the_author_meta( first_name ); 
	$a_lname = get_the_author_meta( last_name ); 
	$a_email = get_the_author_meta( user_email ); 
	$a_fullname = $a_fname . " " . $a_lname; 
	$a_url   = get_the_author_meta( user_url );
	$a_bio   = get_the_author_meta( user_description );
	return "<div id='author-bio' style='border: 2px solid #CCC; height: 100%; padding: 5px; margin: 5px;'><b>Author: "
			.$a_fullname.
			"</b><br/>
			<a href='".$a_url."'>Visit ".$a_fname."'s Website</a> - <a href='mailto:".$a_email."'>Email ".$a_fname."</a> <br/>"
			.$a_bio.
			"</div>" ;
	}
// Return the Author Bio Box
function authorbioplus_ContentFilter($content)
{
return $content.author_bio_plus();
} 

  

add_filter('the_content', 'authorbioplus_ContentFilter');
?>
