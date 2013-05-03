<?php 
$pageTitle = CONTACT;
$pageId = "contact";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$form ="contactform";
$message="contactmessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $form ="contactform2";
				$message="contactmessage2";}
			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>
<p class="<?php echo $message; ?>">Skriv gärna till oss!</p>
<div class ="<?php echo $form; ?>">

<form method="post" action="<?php echo BASE_URL;?>contact/sendmail">


	<label class="label">Ämne</label><br />
	<input class="input" type="text" required name="subject" /><br />
	<label class="label">Meddelande</span></label><br />
	<textarea class = "textarea" required name="message"></textarea><br />
	<label class="label">Avsändare</label><br />
	<input class="input" type="text" required name="name"  /><br />
	<label class="label">Email</label><br />
	<input class="input" type="text" required name="email"  /><br />
	
	<label>&nbsp;</label><input class ="submit configsubmit" value="Skicka" type="submit" /><br />
	
</form>
</div>

