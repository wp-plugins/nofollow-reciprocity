<?php

/*
Plugin Name: Nofollow reciprocity
Plugin URI: http://www.inverudio.com/programs/WordPressBlog/NofollowReciprocity.php
Description: Searches for links to large sites using 'nofollow' tags for external links, and puts the same tag on links to those sites (Wikipedia.org, StumbleUpon.com, and similar)
Author: Lazar Kovacevic(based on 2 plugins quoted below)
Version: 1.5
Author URI: http://www.inverudio.com
*/

/* Based on:

Plugin Name: Wikipedia nofollow
Plugin URI: http://whatjapanthinks.com/wikipedia-nofollow/
Description: Searches for links to Wikipedia.org, and adds a rel="nofollow" tag if necessary
Author: Ken Yasumoto-Nicolson (based on Identify External Links by Mark Jaquith)
Version: 1.0
Author URI: http://whatjapanthinks.com


Plugin Name: Identify External Links
Plugin URI: http://txfx.net/code/wordpress/identify-external-links/
Description: Searches the text for links outside of the domain of the blog.	 To these, it adds <strong>class="extlink"</strong> (and optionally, <strong>target="_blank"</strong>).
Author: Mark Jaquith
Version: 1.3
Author URI: http://txfx.net/
*/

/*	Copyright 2005	Mark Jaquith (email: mark.gpl@txfx.net)
   Additional changes Copyright 2007 Ken Yasumoto-Nicolson (email: seron@whatjapanthinks.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function wp_get_domain_name_from_uri($uri){
	preg_match("/^(http:\/\/)?([^\/]+)/i", $uri, $matches);
	$host = $matches[2];
	preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
	return $matches[0];	   
}

function wp_has_no_rel_nofollow($text)
{
	if ( preg_match("/rel=[\"\'].*?nofollow.*?[\"\']/i", $text ) )
		return false;
	else
		return true;
}

function wp_inarray($needle, $array, $searchKey = false)
{
   if ($searchKey) {
       foreach ($array as $key => $value)
           if (stristr($key, $needle)) {return $key;}
       }
   else {
       foreach ($array as $value)
           if (stristr($value, $needle)) {return $value;}
       }
   return '';
}

function parse_nofollow_reciprocity($matches)
{

	//add in next line's array sites that you think do not deserve credit because they don't give it to other sites.
	if ( 	wp_inarray(wp_get_domain_name_from_uri($matches[3]), array("wikipedia.org","del.icio.us","stumbleupon.com","ma.gnolia.com","simply.com","blinklist.com","startaid.com","netvouz.com","facebook.com","shadows.com","yahoo.com","google.com","thisnext.com-removed-due-to-users-feedback","linkter.hu","segnalo.alice.it","addthis.com","youtube.com","blogger.com")) &&
		  wp_has_no_rel_nofollow( $matches[1] ) &&
		  wp_has_no_rel_nofollow( $matches[4] ) )
	{
		return '<a rel="nofollow" href="' . $matches[2] . '//' . $matches[3] . '" ' . $matches[1] . $matches[4] . '>' . $matches[5] . '</a>';
	}
	else
	{
		// Do nothing
		return '<a href="' . $matches[2] . '//' . $matches[3] . '" ' . $matches[1] . $matches[4] . '>' . $matches[5] . '</a>';
	}
}
	

function wp_nofollow_reciprocity($text) 
{
	$pattern = '/<a (.*?)href=[\"\'](.*?)\/\/(.*?)[\"\'](.*?)>(.*?)<\/a>/i';
	$text = preg_replace_callback($pattern,'parse_nofollow_reciprocity',$text);
	return $text;
}

// filters have high priority to make sure that any markup plugins like Textile or Markdown have already created the HTML links
add_filter('the_content', 'wp_nofollow_reciprocity', 999);
add_filter('the_excerpt', 'wp_nofollow_reciprocity', 999);

// delete this one if you don't want it run on comments
add_filter('comment_text', 'wp_nofollow_reciprocity', 999);

?>
