<?php 
$pageTitle = "Inställningar";
$pageId = "config";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$users = "initusers";
$guestbook = "initguestbook";
$posts = "initposts";
$config = "initconfig";
if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
			$users = "initusers2";
			$guestbook = "initguestbook2";
			$posts = "initposts2";
			$config = "initconfig2";
			}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Här kan du återställa dina tabeller i databasen.<br />
Välj bland alternativen nedan.</p>

<div class="<?php echo $users; ?>">
<a href="initusers">
<img class="config_index_button" src="../themes/images/database_red.png" alt="Init nova_users" />
</a>
<p class="text center">Jag vill återställa tabellen för användare <span class="small">(nova_users)</span></p>

</div>

<div class="<?php echo $guestbook; ?>">
<a href="initguestbook">
<img class="config_index_button" src="../themes/images/database_yellow.png" alt="Init nova_guestbook" />
</a>
<p class="text center">Jag vill återställa tabellen för gästboken <span class="small">(nova_guestbook)</span></p>

</div>

<div class="<?php echo $posts; ?>">
<a href="initposts">
<img class="config_index_button" src="../themes/images/database_green.png" alt="Init nova_posts" />
</a>
<p class="text center">Jag vill återställa tabellen för blogg och artiklar <span class="small">(nova_posts)</span></p>

</div>

<div class="<?php echo $config; ?>">
<a href="initconfig">
<img class="config_index_button" src="../themes/images/database_blue.png" alt="Init nova_config" />
</a>
<p class="text center">Jag vill återställa tabellen för inställningar <span class="small">(nova_config)</span></p>

</div>
<div class="initmessage">
<p class= "message2 text uppercase bold">Du har återställt tabellen nova_users</p>
</div>

