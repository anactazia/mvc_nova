<?php 
$pageTitle = "Medlemssida";
$pageId = "user";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Du är inloggad som användare. <br/ > 
Här kan du skapa inlägg i bloggen eller lägga till artiklar.<br />
Tryck på Profil uppe i högra hörnet
för att ändra dina användaruppgifter!<br />
Du har även tillgång till papperskorgen där du kan återställa eller radera inlägg.</p>
