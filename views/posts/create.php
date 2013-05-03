<?php 
$pageTitle = POST;
$pageId = "post";

include("views/header.php"); 
include("views/nav.php"); 


Session::init();
$logged = Session::get('loggedIn');
$user = Session::get('nickname');
$userid = Session::get('id');
$role = Session::get('role');
$email = Session::get('email');


$pagetitle="pagetitle";
$postsforma = "postsforma";
$postsformb = "postsformb";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			   $postsforma = "postsform2a";
			$postsformb = "postsform2b";}
			   
$useremail = '<label class="label"><span class="uppercase left">Email</span></label><br />
		<input class="input" type="text" name="useremail" /><br />';			   
if($logged = 'loggedIn') {
$useremail =  '<label class="label"><span class="uppercase left">Email</span></label><br />
		<input class="input" type="text" name="useremail" value="' . $email . '"/><br />';}	
?> 
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<form method="post" action="<?php echo BASE_URL;?>posts/create" >
<div class="<?php echo $postsforma; ?>">
	<label class="label"><span class="uppercase left">Ämne</span></label><br />
	<input class = "input" type="text" required name="title" /><br />
	
	<label class="label"><span class="uppercase left">Meddelande</span></label><br />
	<textarea class = "textarea" required name="text"></textarea><br />
	
        <label class="label"><span class="uppercase left">Skribent</span></label><br />
        <input class="input" type="text" readonly name="author" value="<?php echo $user; ?>"/><br />
</div>
<div class="<?php echo $postsformb; ?>">
        <?php echo $useremail; ?> 
        
        <label class = "label"><span class="uppercase left">Visa Email i inlägget</span></label><br />
	<select class="select" name="showemail">
		<option value="no">Nej</option>
		<option value="yes">Ja</option>
	</select><br />
        
        <label class = "label"><span class="uppercase left">Typ av inlägg</span></label><br />
		<select class="select" name="type">
			<option value="post">Blogg</option>
			<option value="page">Artikel</option>
		</select><br />	
		<label class="label"><span class="uppercase left">Bild <span class="small">( endast för artiklar )</span></span></label><br />
		<input class="input" type="text" name="image" value="http://www."/><br />
 
	<label class = "label"><span class="uppercase left">Vilka får läsa inlägget</span></label><br />
	<select class="select" name="readers">
		<option value="all">Alla</option>
		<option value="users">Inloggade användare</option>
		<option value="users">Administratören</option>
	</select><br />
	
        
	<input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
	
	<label>&nbsp;</label><input class="submit postsubmit" type="submit" value="Skicka"/>
</div>
</form>


