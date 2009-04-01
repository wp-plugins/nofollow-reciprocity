=== Nofollow Reciprocity ===
Contributors: lakinekaki
Donate link: http://www.explore-ideas.com/
Tags: blog,comment,comments,google,link,links,nofollow,dofollow,page,pages,plugin,Post,posts,seo,social,url,wordpress,pagerank
Requires at least: 1.5
Tested up to: 2.7.1
Stable tag: trunk

Improves your blog PageRank and search engines rankings (search engine optimization).

== Description ==

This is much more than a search engine optimization plugin. 

Most big sites by default use 'nofollow' tags therefore not trusting external links nor users that post those links there. This means that they don't give any credit (in the form of PageRank) to those links and are essentially considering them spam (as that was 'officially' the purpose of 'nofollow' tag introduction - actually messing with the blogging community search engine rankings was the real purpose). This results in their pages appearing higher in search engine results and your pages appearing lower.

This plugin detects links to above mentioned sites, and puts 'nofollow' tags on them. 'Do unto others as you would have others do unto you.' WordPress is a major blogging platform, with millions of users. If many people using WordPress use this plugin, other big sites may reconsider their 'nofollow' strategy. This plugin expands on Wikipedia nofollow plugin hacked by a revolted blogger. 

**[Download now!](http://downloads.wordpress.org/plugin/nofollow-reciprocity.zip)**

See **[nofollow PageRank](http://www.inverudio.com/programs/WordPressBlog/NofollowReciprocity.php)** screenshot

Some features:

* Increases your blog rankings in Search Engines
* [Redistributes PageRank to small Websites](http://www.inverudio.com/programs/WordPressBlog/NofollowReciprocity.php)
* Instead of only dozen famous sites, plugin now has a list of top 1000 sites from quantcast -- most of which use nofollow.

== Installation ==

1. Unzip and upload to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Remember to delete WP-Cache if you have that plugin active. Otherwise, you may not see effect of this plugin immediately.
4. If you want to add nofollow in comment author's url's whose link point to blacklisted sites, add at the end of the code in 'nofollow-reciprocity.php' file this line: `<?php add_filter('get_comment_author_link', 'wp_nofollow_reciprocity', 999); ?>`

That's it! Watch the blog traffic statistics. 


== Frequently Asked Questions ==

= Why is site X on the list when it does not use nofollow? =

Blacklisted sites are from the 'Top 1000' Quantcast list. Most of random sites from the list that I checked use nofollow. 

= How do I add or remove sites from the list? =

You can add or remove sites directly in the 'nofollow-reciprocity.php' file. 

Although you can add individual sites to this blacklist, the intention of this plugin is to create a massive effect. Instead of adding a handful of websites, consider adding many. You are welcome to [send me lists](http://www.inverudio.com/contact.php) of bad sites you find, or good ones that are on the current list. Eventually, we will have an ultimate list of nofollow sites.

= Do you think this plugin will have a significant effect? =

On your blog, yes. On the web, only if you spread the word and blog about it.

== Other ==

* This plugin is based on [Wikipedia nofollow](http://whatjapanthinks.com/wikipedia-nofollow/) and [Identify External Links](http://txfx.net/code/wordpress/identify-external-links/).
* I also recommend [Antisocial](http://andybeard.eu/2007/07/sphinn-sociable-wordpress-plugin.html)

