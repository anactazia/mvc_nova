<?php 
$pageTitle = ADMIN;
$pageId = "admin";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Du är inloggad som administratör. <br/ >
Här kan du skapa inlägg i bloggen eller lägga till artiklar.<br />
Tryck på Admin uppe i högra hörnet för att lägga till, ändra eller ta bort användare!<br />
Du har även tillgång till papperskorgen där du kan återställa eller radera inlägg.</p>





