<?php 
$pageTitle = GUESTBOOK;
$pageId = "guestbook";

include("views/header.php"); 
include("views/nav.php"); 

Session::init();
$logged = Session::get('loggedIn');
$user = Session::get('nickname');
$userid = Session::get('id');
$role = Session::get('role');
$email = Session::get('email');


$author = "";
if($logged == 'loggedIn'){$author = '<label class="label"><span class="uppercase left">Skribent</span></label><br />
<input class="input" type="text" readonly name="author" value="' . $user . '"/><br />';}
else {$author = '<label class="label"><span class="uppercase left">Skribent</span></label><br />
<input class ="input" type="text" name="author" value="Anonym" /><br />';}

$gbuserid = "";
if($logged == 'loggedIn'){$gbuserid = '<input type="hidden" name="userid" value="' . $userid . '"/>';}
else {$gbuserid = '<input type="hidden" name="userid" value="0" />';}

$gbwelcome = "gbwelcome";
$pagetitle="pagetitle";
$guestbookeditform ="guestbookform";
$guestbookedittable ="guestbooktable";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $guestbookform ="guestbookform2";
			  $guestbooktable ="guestbooktable2";
			  $gbwelcome = "gbwelcome2";}

$useremail = '<input class ="input" type="text" name="useremail" /><br />';
if($logged == 'loggedIn'){
$useremail = '<input class ="input" type="text" readonly name="useremail" value="' . $email . '"/><br />';}
			  
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>
<p class="<?php echo $gbwelcome; ?>">Välkommen<br />att skriva<br />i vår gästbok...</p>
<div class="<?php echo $guestbookform; ?>">

<form method="post" action="<?php echo BASE_URL;?>guestbook/create" >
	<label class="label"><span class="uppercase left">Ämne / Titel</span></label><br />
	<input class = "input" type="text" required name="topic" /><br />
	
	<label class="label"><span class="uppercase left">Meddelande</span></label><br />
	<textarea class = "textarea" required name="text"></textarea><br />
	
	<?php echo $author; ?> 
	
	<label class="label"><span class="uppercase left">Email</span></label><br />
	<?php echo $useremail; ?>
	
	<label class = "label"><span class="uppercase left">Visa Email i inlägget</span></label><br />
	<select class="select" name="showemail">
		<option value="no">Nej</option>
		<option value="yes">Ja</option>
	</select><br />
	
		<label class = "label"><span class="uppercase left">Vilka får läsa inlägget</span></label><br />
	<select class="select" name="readers">
		<option value="all">Alla</option>
		<option value="users">Inloggade användare</option>
		<option value="users">Administratören</option>
	</select><br />

	<?php echo $gbuserid; ?> 
	<p><label>&nbsp;</label><input class="submit guestbooksubmit" type="submit" value="Skicka"/></p>
</form>
</div>

<div class="<?php echo $guestbooktable; ?>">
<?php



	foreach($this->guestbookList as $key => $value) {
if($value['readers'] !== 'admin' && $value['readers'] !== 'users'){	
$email = $value['useremail'];
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='guestbookgravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' alt='gravatar'/>";
		
if($value['deleted'] == '0000-00-00 00:00:00')	{	
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


if($value['userid'] == $userid && $logged == 'loggedIn'){
echo '<a href="'.BASE_URL.'guestbook/edit/'.$value['id'].'"><span class="uppercase small">Edit</span></a>';}
if($role == 'admin' || $value['userid'] == $userid && $logged == 'loggedIn'){
echo ' ' . '<a href="'.BASE_URL.'guestbook/trash/'.$value['id'].'"><span class="uppercase small">Delete</span></a>';}	
echo '</div></div><br />';	}}}

?>
</div>
