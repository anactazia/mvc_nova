<?php 

$pageTitle = "Inställningar";
$pageId = "config";

include("views/header.php"); 
include("views/nav.php"); 


$pagetitle="pagetitle";
$form ="configform";
$table ="configtable";
$message="configmessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $form ="configform2";
			  $table ="configtable2";
				$message="configmessage2";}		  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<?php
$title_show =""; 	
if($this->config['title_show'] == 'yes') {$title_show = 'Visa Titel';} else {$title_show = 'Dölj Titel';}
$logo_show =""; 	
if($this->config['logo_show'] == 'yes') {$logo_show = 'Visa Logo';} else {$title_show = 'Dölj Logo';}
$footer_show =""; 	
if($this->config['footer_show'] == 'yes') {$footer_show = 'Visa Footer';} else {$footer_show = 'Dölj Footer';}
$gravatar_show =""; 	
if($this->config['gravatar_show'] == 'yes') {$gravatar_show = 'Visa Gravatar';} else {$gravatar_show = 'Dölj Gravatar';}
$index_show =""; 	
if($this->config['index_show'] == 'yes') {$index_show = 'Visa Index';} else {$index_show = 'Dölj Index';}
$guestbook_show =""; 	
if($this->config['guestbook_show'] == 'yes') {$guestbook_show = 'Visa Gästbok';} else {$guestbook_show = 'Dölj Gästbok';}
$blog_show =""; 	
if($this->config['blog_show'] == 'yes') {$blog_show = 'Visa Blogg';} else {$blog_show = 'Dölj Blogg';}
$articles_show =""; 	
if($this->config['articles_show'] == 'yes') {$articles_show = 'Visa Artiklar';} else {$articles_show = 'Dölj Artiklar';}
$contact_show =""; 	
if($this->config['contact_show'] == 'yes') {$contact_show = 'Visa Kontakt';} else {$contact_show = 'Dölj Kontakt';}
$page_show =""; 	
if($this->config['page_show'] == 'yes') {$page_show = 'Visa Sida';} else {$page_show = 'Dölj Sida';}
$post_show =""; 	
if($this->config['post_show'] == 'yes') {$post_show = 'Visa Skriv Inlägg';} else {$post_show = 'Dölj Skriv Inlägg';}
$trashcan_show =""; 	
if($this->config['trashcan_show'] == 'yes') {$trashcan_show = 'Visa Papperskorg';} else {$trashcan_show = 'Dölj Papperskorg';}
$navmenu =""; 	
if($this->config['navmenu'] == 'horisontal') {$navmenu = 'Horisontal Meny';} else {$navmenu = 'Vertikal Meny';}
$theme =""; 	
if($this->config['theme'] == 'default') {$theme = 'Standard Tema';}
if($this->config['theme'] == 'blue') {$theme = 'Blått Tema';}
if($this->config['theme'] == 'red') {$theme = 'Rött Tema';}
if($this->config['theme'] == 'green') {$theme = 'Grönt Tema';}
if($this->config['theme'] == 'yellow') {$theme = 'Gult Tema';}
?>
<div class ="<?php echo $form; ?>">

<form method="post" action="<?php echo BASE_URL;?>config/saveconfig/<?php echo $this->config['id']; ?>">

	<p class="configtitle">Titel</p>
	<p class="configtext">Här kan du byta sidans titel och välja om den skall visas eller ej.</p>
	
	<input class="input" type="text" name="title" value="<?php echo $this->config['title']; ?>" />
	
	<select class="select" name="title_show">
		<option value="<?php echo $this->config['title_show']; ?>"><?php echo $title_show; ?></option>
		<option value="yes">Visa Titel</option>
		<option value="no">Dölj Titel</option>
	</select><br />
	
	<p class="configtitle">Logo</p>
	<p class="configtext">Här kan du byta sidans Logo och välja om den skall visas eller ej.</p>
	<p class="configtext2">Skriv in sökvägen till bilden.</p>
	<input class="input" type="text" name="logo" value="<?php echo $this->config['logo']; ?>" />
	
	<select class="select" name="logo_show">
		<option value="<?php echo $this->config['logo_show']; ?>"><?php echo $logo_show; ?></option>
		<option value="yes">Visa Logo</option>
		<option value="no">Dölj Logo</option>
	</select><br />	
	
	
	<p class="configtitle">Gravatar</p>
	<p class="configtext">Här kan välja om det skall visas en gravatar eller ej när någon är inloggad.</p>
		<select class="select" name="gravatar_show">
		<option value="<?php echo $this->config['gravatar_show']; ?>"><?php echo $gravatar_show; ?></option>
		<option value="yes">Visa Gravatar</option>
		<option value="no">Dölj Gravatar</option>
	</select><br />	
	
	
	<p class="configtitle">Navigeringsmeny</p>
	<p class="configtext">Välj hur du vill visa din navigeringsmeny.</p>
	<select class="select" name="navmenu">
		<option value="<?php echo $this->config['logo_show']; ?>"><?php echo $navmenu; ?></option>
		<option value="horisontal">Horisontal Meny</option>
		<option value="vertical">Vertikal Meny</option>
	</select><br />	
	
	<p class="configtitle">Footer</p>
	<p class="configtext">Här kan du byta texten i sidans Footer och välja om den skall visas eller ej.</p>
	<input class="input" type="text" name="footer" value="<?php echo $this->config['footer']; ?>" />
	
	<select class="select" name="footer_show">
		<option value="<?php echo $this->config['footer_show']; ?>"><?php echo $footer_show; ?></option>
		<option value="yes">Visa Footer</option>
		<option value="no">Dölj Footer</option>
	</select><br />

	<p class="configtitle">Tema</p>
	<p class="configtext">Välj vilken färg du vill ha på ditt temat.</p>
	<select class="select" name="theme">
		<option value="<?php echo $this->config['theme']; ?>"><?php echo $theme; ?></option>
		<option value="default">Standard Tema</option>
		<option value="blue">Blått Tema</option>
		<option value="red">Rött Tema</option>
		<option value="yellow">Gult Tema</option>
	</select><br />	
	
	<p class="configtitle">Rotkatalog</p>
	<p class="configtext">Skriv in sökvägen till sidans rotkatalog. (OBS! Viktigt!)</p>
	<input class="input" type="text" name="base_url" value="<?php echo $this->config['base_url']; ?>" /><br />	

	<p class="configtitle">Email</p>
	<p class="configtext">Email adressen skickas med i aktiveringsmail när någon skapar ett konto.</p>
	<input class="input" type="text" name="email" value="<?php echo $this->config['email']; ?>" /><br />

	<p class="configtitle">Index</p>
	<p class="configtext">Byt namn på sidan och välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="index_name" value="<?php echo $this->config['index_name']; ?>" />
	
	<select class="select" name="index_show">
		<option value="<?php echo $this->config['index_show']; ?>"><?php echo $index_show; ?></option>
		<option value="yes">Visa Index</option>
		<option value="no">Dölj Index</option>
	</select><br />
	
	<p class="configtitle">Gästbok</p>
	<p class="configtext">Byt namn på sidan och välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="guestbook" value="<?php echo $this->config['guestbook']; ?>" />
	
	<select class="select" name="guestbook_show">
		<option value="<?php echo $this->config['guestbook_show']; ?>"><?php echo $guestbook_show; ?></option>
		<option value="yes">Visa Gästbok</option>
		<option value="no">Dölj Gästbok</option>
	</select><br />	
	
	<p class="configtitle">Blogg</p>
	<p class="configtext">Byt namn på sidan och välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="blog" value="<?php echo $this->config['blog']; ?>" />
	
	<select class="select" name="blog_show">
		<option value="<?php echo $this->config['blog_show']; ?>"><?php echo $blog_show; ?></option>
		<option value="yes">Visa Blogg</option>
		<option value="no">Dölj Blogg</option>
	</select><br />	
	
	<p class="configtitle">Artiklar</p>
	<p class="configtext">Byt namn på sidan och välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="articles" value="<?php echo $this->config['articles']; ?>" />
	
	<select class="select" name="articles_show">
		<option value="<?php echo $this->config['articles_show']; ?>"><?php echo $articles_show; ?></option>
		<option value="yes">Visa Artiklar</option>
		<option value="no">Dölj Artiklar</option>
	</select><br />	
	
	<p class="configtitle">Kontakt</p>
	<p class="configtext">Byt namn på sidan och välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="contact" value="<?php echo $this->config['contact']; ?>" />
	
	<select class="select" name="contact_show">
		<option value="<?php echo $this->config['contact_show']; ?>"><?php echo $contact_show; ?></option>
		<option value="yes">Visa Kontakt</option>
		<option value="no">Dölj Kontakt</option>
	</select><br />	
	
	<p class="configtitle">Extrasida</p>
	<p class="configtext">Byt namn på sidan och välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="page" value="<?php echo $this->config['page']; ?>" />
	
	<select class="select" name="page_show">
		<option value="<?php echo $this->config['page_show']; ?>"><?php echo $page_show; ?></option>
		<option value="yes">Visa Sida</option>
		<option value="no">Dölj Sida</option>
	</select><br />	
	
	<p class="configtitle">Inlägg</p>
	<p class="configtext">En sida för att skriva blogginlägg och artiklar.</p>
	<p class="configtext2">Byt namn på den eller välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="post" value="<?php echo $this->config['post']; ?>" />
	
	<select class="select" name="post_show">
		<option value="<?php echo $this->config['post_show']; ?>"><?php echo $post_show; ?></option>
		<option value="yes">Visa Skriv Inlägg</option>
		<option value="no">Dölj Skriv Inlägg</option>
	</select><br />	
	
	<p class="configtitle">Papperskorg</p>
	<p class="configtext">Byt namn på sidan eller välj om du vill visa den eller ej.</p>
	<input class="input" type="text" name="trashcan" value="<?php echo $this->config['trashcan']; ?>" />
	
	<select class="select" name="trashcan_show">
		<option value="<?php echo $this->config['trashcan_show']; ?>"><?php echo $trashcan_show; ?></option>
		<option value="yes">Visa Papperskorg</option>
		<option value="no">Dölj Papperskorg</option>
	</select><br />	
	
	<p class="configtitle">Admin</p>
	<p class="configtext">Administratörens sidor.</p>
	<p class="configtext2">Du kan byta namn på sidan.</p>
	<input class="input" type="text" name="admin" value="<?php echo $this->config['admin']; ?>" /><br />	
	
	<p class="configtitle">Profil</p>
	<p class="configtext">En sida för att ändra sina användaruppgifter.</p>
	<p class="configtext2">Du kan byta namn på sidan.</p>
	<input class="input" type="text" name="profile" value="<?php echo $this->config['profile']; ?>" /><br />
	
	<p class="configtitle">Login</p>
	<p class="configtext">Du kan byta namn på sidan.</p>
	<input class="input" type="text" name="login" value="<?php echo $this->config['login']; ?>" /><br />
	
	<p class="configtitle">Logout</p>
	<p class="configtext">Du kan byta namn på sidan.</p>
	<input class="input" type="text" name="logout" value="<?php echo $this->config['logout']; ?>" /><br />

	<label>&nbsp;</label><input class ="submit configsubmit" value="Skicka" type="submit" /><br />
	
</form>
</div>

