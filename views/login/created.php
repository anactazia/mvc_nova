<?php 
$pageTitle = LOGIN;
$pageId = "login";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Ett nytt användarkonto har skapats<br />
Välkommen som medlem!<br />Ett mail har skickats till din epostadress.</p>


