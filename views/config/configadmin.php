<?php 
$pageTitle = "Inställningar";
$pageId = "config";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$form ="configadminform";
$message="configmessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $form ="configadminform2";
				$message="configmessage2";}			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<div class ="<?php echo $form; ?>">

<form method="post" action="<?php echo BASE_URL;?>config/saveadmin/<?php echo $this->admin['id']; ?>">

	<p class="configtitle">Administratör</p>
	<p class="configtext">Standard inloggningsuppgifter för administratören är:</p>
	<p class="configtext2">Användarnamn: admin</p>
	<p class="configtext2">Lösenord: password</p>
	<p class="configtext2">Här kan du ändra användarnamn och lösenord på administratören.</p>
	<label class="label">Användarnamn</label><br />
	<input class="input" type="text" required name="nickname" value="<?php echo $this->admin['nickname']; ?>" /><br />
	<label class="label">Lösenord</label><br />
	<input class="input" type="password" required name="password" /><br />	
	<input type="hidden" required name="role" value="admin" /><br />	
	
	
	<label>&nbsp;</label><input class ="submit configsubmit" value="Skicka" type="submit" /><br />
	
</form>
</div>

