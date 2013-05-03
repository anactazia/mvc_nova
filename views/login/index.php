<?php 
$pageTitle = LOGIN;
$pageId = "login";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$loginform = 'loginform';
if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
			   $loginform = 'loginform2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>
<p class="text message">Välkommen att logga in!</p>
<div class="<?php echo $loginform; ?>">
<form action="login/run" method="post">
	
	<label class="label">Användarnamn</label><br />
	<input class="input" type="text" required name="nickname" /><br />
	<label class="label">Lösenord</label><br />
	<input class="input" type="password" required name="password" /><br />
	<label></label><input class="submit loginsubmit" value="Logga In"type="submit" />
</form>
<a href="user/usercreate"><span class="createlink">Skapa användarkonto</span></a>
</div>






