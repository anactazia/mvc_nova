<?php 
$pageTitle = BLOG;
$pageId = "blog";

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

$email = $value['useremail'];
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='bloggravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' /></a>";
		
if($value['type'] == 'post'){
if($value['deleted'] == '0000-00-00 00:00:00')	{	
$date = '( Skapad: ' . $value['created'] . ')';
$edited = '';
if($value['edited'] !== '0000-00-00 00:00:00'){$edited = '( Ändrad: ' . $value['edited'] . ')';}
echo '<div class="paper">';
echo $gravatar;

echo '<div class="bloginfo">';
echo '<p class="blogauthor">Skrivet av <span class="bold uppercase"> ' . $value['author'] . ' </span>';
if($value['showemail'] == 'yes'){
echo '( ' . $value['useremail'] . ' )';} 
echo '</p>';
echo '<p class="blogdate">' . $date . '<br />
	' . $edited . '</p>';
echo '</div>';	
echo '<div class="blogtext">';	
echo '<p class="title">' . $value['title'] . '</p>';
echo '<p class="text">' . $value['text'] . '</p>';	
	

if($value['userid'] == $userid && $logged == 'loggedIn'){
echo '<a href="'.BASE_URL.'posts/edit/'.$value['id'].'"><span class="uppercase small">Edit</span></a>';}
if($role == 'admin' || $value['userid'] == $userid && $logged == 'loggedIn'){
echo ' ' . '<a href="'.BASE_URL.'posts/trashblog/'.$value['id'].'"><span class="uppercase small">Delete</span></a>';}	
	echo '</div></div><br />';	}}}
?>
</div>
