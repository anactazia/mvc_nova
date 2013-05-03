<?php 
$pageTitle = TRASHCAN;
$pageId = "trashcan";

include("views/header.php"); 
include("views/nav.php"); 


Session::init();
$logged = Session::get('loggedIn');
$user = Session::get('nickname');
$userid = Session::get('id');
$role = Session::get('role');

$table='trashcantable';
$pagetitle="pagetitle";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			$table='trashcantable2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<div class="<?php echo $table; ?>">

<?php
	

echo '<hr /><p class="center uppercase">Gästbok</p><hr />';

	foreach($this->guestbookList as $key => $value) {
if($role == 'admin' || $userid == $value['userid']){		
$email = $value['useremail'];
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='guestbookgravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' alt='gravatar'/>";
		
if($value['deleted'] !== '0000-00-00 00:00:00')	{	
$date = '( Skapad: ' . $value['created'] . ' )';
$edited = '';
if($value['edited'] !== '0000-00-00 00:00:00')
	{$edited = '( Ändrad: ' . $value['edited'] . ' )';}
echo '<div class="paper">';
echo $gravatar;

echo '<div class="guestbookinfo">';
echo '<p class="guestbookauthor">Skrivet av<span class="bold uppercase"> ' . $value['author'] . '</span>';
if($value['showemail'] == 'yes'){
echo '( ' . $value['useremail'] . ' )';} 
echo '</p>';
echo '<p class="guestbookdate">' . $date . '<br />
	' . $edited . '</p>';
echo '</div>';		
echo '<div class="guestbooktext">';		

echo '<p class="title">' . $value['topic'] . '</p>';
echo '<p class="text">' . $value['text'] . '</p>';

echo '<a href="'.BASE_URL.'guestbook/restore/'.$value['id'].'"><span class="uppercase small">Återställ</span></a>';
echo ' ' . '<a href="'.BASE_URL.'guestbook/delete/'.$value['id'].'"><span class="uppercase small">Ta bort permanent</span></a>';
	echo '</div></div><br />';	}}}


echo '<hr /><p class="center uppercase">Blogg</p><hr />';	




	foreach($this->postsList as $key => $value) {

if($role == 'admin' || $userid == $value['userid']){	
if($value['type'] == 'post'){			
		
$email = $value['useremail'];
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='guestbookgravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' alt='gravatar'/>";
		
if($value['deleted'] !== '0000-00-00 00:00:00')	{	
$date = '( Skapad: ' . $value['created'] . ' )';
$edited = '';
if($value['edited'] !== '0000-00-00 00:00:00')
	{$edited = '( Ändrad: ' . $value['edited'] . ' )';}
echo '<div class="paper">';
echo $gravatar;

echo '<div class="guestbookinfo">';
echo '<p class="guestbookauthor">Skrivet av<span class="bold uppercase"> ' . $value['author'] . '</span>';
if($value['showemail'] == 'yes'){
echo '( ' . $value['useremail'] . ' )';} 
echo '</p>';
echo '<p class="guestbookdate">' . $date . '<br />
	' . $edited . '</p>';
echo '</div>';		
echo '<div class="guestbooktext">';		

echo '<p class="title">' . $value['title'] . '</p>';
echo '<p class="text">' . $value['text'] . '</p>';

echo '<a href="'.BASE_URL.'posts/restore/'.$value['id'].'"><span class="uppercase small">Återställ</span></a>';
echo ' ' . '<a href="'.BASE_URL.'posts/delete/'.$value['id'].'"><span class="uppercase small">Ta bort permanent</span></a>';
	echo '</div></div><br />';	}}}}


echo '<hr /><p class="center uppercase">Artiklar</p><hr />';



	foreach($this->postsList as $key => $value) {
		
if($role == 'admin' || $userid == $value['userid']){			
if($value['type'] == 'page'){	
		
$email = $value['useremail'];
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='guestbookgravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' alt='gravatar'/>";
		
if($value['deleted'] !== '0000-00-00 00:00:00')	{	
$date = '( Skapad: ' . $value['created'] . ' )';
$edited = '';
if($value['edited'] !== '0000-00-00 00:00:00')
	{$edited = '( Ändrad: ' . $value['edited'] . ' )';}
echo '<div class="paper">';
echo $gravatar;

echo '<div class="guestbookinfo">';
echo '<p class="guestbookauthor">Skrivet av<span class="bold uppercase"> ' . $value['author'] . '</span>';
if($value['showemail'] == 'yes'){
echo '( ' . $value['useremail'] . ' )';} 
echo '</p>';
echo '<p class="guestbookdate">' . $date . '<br />
	' . $edited . '</p>';
echo '</div>';		
echo '<div class="guestbooktext">';		

echo '<p class="title">' . $value['title'] . '</p>';
echo '<p class="text">' . $value['text'] . '</p>';

echo '<a href="'.BASE_URL.'posts/restore/'.$value['id'].'"><span class="uppercase small">Återställ</span></a>';
echo ' ' . '<a href="'.BASE_URL.'posts/delete/'.$value['id'].'"><span class="uppercase small">Ta bort permanent</span></a>';
	echo '</div></div><br />';	}}}}
	
?>	
</div>	
