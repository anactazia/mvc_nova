<?php 
$pageTitle = "Skapa användarkonto";
$pageId = "login";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$usercreateform ="usercreateform";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $usercreateform ="usercreateform2";}
$hash = md5( rand(0,1000) );  			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Här kan du skapa ett användarkonto.</p>
<div class="<?php echo $usercreateform; ?>">
<form method="post" action="<?php echo BASE_URL;?>user/ucreate" class="formuser">
	<label class="label">Användarnamn</label><br />
	<input class="input" type="text" required name="nickname" /><br />
	<label class="label">Lösenord</label><br />
	<input class="input" type="password" required name="password" /> <br />
	<label class="label">E-Mail</label><br />
	<input class="input" type="email" required name="email" /> <br />
	<input type="hidden" name="hash" value="<?php echo $hash; ?>" />
	<input type="hidden" name="active" value="no" />
	<input type="hidden" name="role" value="user" />
	<label>&nbsp;</label><input class="submit usercreatesubmit" type="submit" />
</form>
</div>
