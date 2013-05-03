<?php 
$pageTitle = "Inställningar";
$pageId = "config";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$form ="configdatabaseform";
$message="configmessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $form ="configdatabaseform2";
				$message="configmessage2";}
			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<div class ="<?php echo $form; ?>">

<form method="post" action="<?php echo BASE_URL;?>config/savedatabase/<?php echo $this->database['id']; ?>">

	<p class="configtitle">Databasinställningar</p>
	<p class="configtext2">Skriv in uppgifterna för databasanslutningen.</p>
	<label class="label">Databas Typ</label><br />
	<input class="input" type="text" required name="db_type" value="<?php echo $this->database['db_type']; ?>" /><br />
	<label class="label">Databas Värd</label><br />
	<input class="input" type="text" required name="db_host" value="<?php echo $this->database['db_host']; ?>" /><br />
	<label class="label">Databas Namn</label><br />
	<input class="input" type="text" required name="db_name" value="<?php echo $this->database['db_name']; ?>" /><br />
	<label class="label">Användare</label><br />
	<input class="input" type="text" required name="db_user" value="<?php echo $this->database['db_user']; ?>" /><br />
	<label class="label">Lösenord</label><br />
	<label class="label">Typ</label><br />
	<input class="input" type="password" required name="db_pass" value="<?php echo $this->database['db_pass']; ?>" /><br />	
	
	
	<label>&nbsp;</label><input class ="submit configsubmit" value="Skicka" type="submit" /><br />
	
</form>
</div>

