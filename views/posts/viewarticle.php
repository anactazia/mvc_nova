<?php 
$pageTitle = ARTICLES;
$pageId = "article";

include("views/header.php"); 
include("views/nav.php"); 

Session::init();
$email = Session::get('email');
$author = Session::get('nickname');
$role = Session::get('role');
$logged = Session::get('loggedIn');
$userid = Session::get('id');
$pagetitle="pagetitle";
$viewarticletext="viewarticletext";
$viewarticleimage="viewarticleimage";
$viewarticleinfo="viewarticleinfo";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
		$viewarticletext="viewarticletext2";
		$viewarticleimage="viewarticleimage2";
		$viewarticleinfo="viewarticleinfo2";}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<?php
echo '<div class = "' . $viewarticletext . '">';
echo '<p class="viewtitle title">' . $this->posts['title'] . '</p>';
echo '<p class="viewtext text">' . $this->posts['text'] . '</p>';

if($this->posts['userid'] == $userid && $logged == 'loggedIn'){
echo '<a href="'.BASE_URL.'posts/edit/'.$this->posts['id'].'"><span class="uppercase small">Edit</span></a>';}
if($role == 'admin' || $this->posts['userid'] == $userid && $logged == 'loggedIn'){
echo ' ' . '<a href="'.BASE_URL.'posts/trasharticle/'.$this->posts['id'].'"><span class="uppercase small">Delete</span></a>';}

echo '</div>';

echo '<div class = "' . $viewarticleimage . '">';
echo '<img class="viewimage" src="'. $this->posts['image'] . '" alt="Bild"/>';

echo '</div>';
echo '<div class = "' . $viewarticleinfo . '">';

echo '<p class="author">Artikeln är skiven av <span class="bold">' . $this->posts['author'] . '</span>';

if($this->posts['showemail'] == 'yes'){
echo '<p class="email">( ' . $this->posts['useremail'] . ' )</p>';}
else {echo '</p>';}
$email = $this->posts['useremail'];
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='viewgravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' /></a>";
echo $gravatar;
echo '<p class="date">( Skapad: ' . $this->posts['created'] . ' )</p>';
if($this->posts['edited'] !== '0000-00-00 00:00:00'){
echo '<p class="date">( Senast ändrad: ' . $this->posts['edited'] . ' )</p>';}








  



?>

</div>

