<?php 
$pageTitle = ARTICLES;
$pageId = "articles";

include("views/header.php"); 
include("views/nav.php"); 

Session::init();
$logged = Session::get('loggedIn');
$user = Session::get('nickname');
$userid = Session::get('id');
$role = Session::get('role');


$pagetitle="pagetitle";
$poststable = "poststable";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $poststable = "poststable2";}
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<div class="<?php echo $poststable; ?>">
<?php

foreach($this->postsList as $key => $value) {
		
if($value['type'] == 'page'){
if($value['deleted'] == '0000-00-00 00:00:00')	{	

if($value['edited'] !== '0000-00-00 00:00:00'){$edited = '( Ändrad: ' . $value['edited'] . ')';}
echo '<div class="paper">';
echo '<div class="articletext">';	
echo '<p class="title">' . $value['title'] . '</p>';
echo '<p><span class="text">' . substr($value['text'], 0, 100) . '...</span>	
<a href="'.BASE_URL.'posts/viewarticle/'.$value['link'].'"><span class="postdate">Visa Artikel</span></a></p>';	
echo ' ';
if($value['userid'] == $userid && $logged == 'loggedIn'){
echo '<a href="'.BASE_URL.'posts/edit/'.$value['id'].'"><span class="uppercase small">Edit</span></a>';}
if($role == 'admin' || $value['userid'] == $userid && $logged == 'loggedIn'){
echo ' ' . '<a href="'.BASE_URL.'posts/trasharticle/'.$value['id'].'"><span class="uppercase small">Delete</span></a>';}	
	echo '</div></div><br />';	}}}
?>
</div>
