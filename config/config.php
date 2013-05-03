<?php
/**
* Site configuration
*/
// Error reporting
// 
error_reporting(E_ALL | E_STRICT);
mysql_error();

/**
* Set database(s).
*/

define('DB_TYPE', 'mysql');
define('DB_HOST', 'blu-ray.student.bth.se');  
define('DB_NAME', 'xxxxxx'); 
define('DB_USER', 'xxxxxx');
define('DB_PASS', 'xxxxxxxx');

/**
* Settings
*/

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die (mysql_error ());
mysql_select_db(DB_NAME) or die(mysql_error());	



$query = "SELECT * FROM nova_config WHERE id = '1'";

$config = mysql_query($query);

while($row = @mysql_fetch_array($config)){
$title 		= $row['title'];	
$title_show 	= $row['title_show'];
$logo 		= $row['logo'];	
$logo_show 	= $row['logo_show'];
$navmenu	= $row['navmenu'];			
$footer		= $row['footer'];
$footer_show 	= $row['footer_show'];
$theme		= $row['theme'];
$base_url	= $row['base_url'];
$email		= $row['email'];
$index_name	= $row['index_name'];
$index_show 	= $row['index_show'];
$guestbook 	= $row['guestbook'];
$guestbook_show	= $row['guestbook_show'];
$blog	 	= $row['blog'];
$blog_show 	= $row['blog_show'];
$articles 	= $row['articles'];
$articles_show 	= $row['articles_show'];
$contact 	= $row['contact'];
$contact_show 	= $row['contact_show'];
$page	 	= $row['page'];
$page_show 	= $row['page_show'];
$post	 	= $row['post'];
$post_show 	= $row['post_show'];
$trashcan	= $row['trashcan'];
$trashcan_show 	= $row['trashcan_show'];
$gravatar_show	= $row['gravatar_show'];
$admin		= $row['admin'];
$profile	= $row['profile'];
$login		= $row['login'];
$logout		= $row['logout'];

}
mysql_close();

define('TITLE', 	@$title		); // Title of the site
define('TITLE_SHOW', 	@$title_show	); // yes / no // Shows or hides Title of the site		
define('LOGO', 		@$logo		); // URL to logo image  
define('LOGO_SHOW', 	@$logo_show	); // yes / no // Shows or hides Logo image			
define('NAVMENU', 	@$navmenu	); // horisontal / vertical // How to display menubar		
define('FOOTER', 	@$footer		); // Footer of the site	
define('FOOTER_SHOW', 	@$footer_show	); // yes / no // Shows or hides Footer of the site	
define('THEME', 	@$theme		); // default / green / blue / red / yellow // Choose color of the theme
define('BASE_URL', 	@$base_url	); //URL to root catalogue
define('EMAIL', 	@$email		); // Email adress (shows in activation mail when signing up for a new useraccount)
define('INDEX', 	@$index_name	); // Name of the Index page
define('INDEX_SHOW', 	@$index_show	); // yes / no // Shows or hides Index page
define('GUESTBOOK' , 	@$guestbook	); // Name of the Guestbook page
define('GUESTBOOK_SHOW',@$guestbook_show	); // yes / no // Shows or hides Guestbook page
define('BLOG', 		@$blog		); // Name of the Blog page
define('BLOG_SHOW', 	@$blog_show	); // yes / no // Shows or hides Blog page
define('ARTICLES', 	@$articles	); // Name of the Articles page
define('ARTICLES_SHOW', @$articles_show	); // yes / no // Shows or hides Articles page
define('CONTACT', 	@$contact	); // Name of the Contact Page
define('CONTACT_SHOW', 	@$contact_show	); // yes / no // Shows or hides Contact page
define('PAGE', 		@$page		); // Name of the extra page
define('PAGE_SHOW', 	@$page_show	); // yes / no // Shows or hides extra page
define('POST', 		@$post		); // Name of the page where you can write posts and articles
define('POST_SHOW', 	@$post_show	); // yes / no // Shows or hides page where you can write posts and articles
define('TRASHCAN', 	@$trashcan	); // Name of the Trashcan page
define('TRASHCAN_SHOW', @$trashcan_show	); // yes / no // Shows or hides Trashcan icon
define('GRAVATAR_SHOW', @$gravatar_show	); // yes / no // Shows or hides Gravatar
define('ADMIN', 	@$admin		); // Name of the Admin page
define('PROFILE', 	@$profile	); // Name of the page where you can cange your accountsettings
define('LOGIN', 	@$login		); // Name of the Login pages
define('LOGOUT', 	@$logout		); // Name of the Logoutpages



