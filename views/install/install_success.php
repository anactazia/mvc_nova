<?php 
$pageTitle = "Installation";
$pageId = "install";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Du är färdig med installationen <br />
och kan börja använda NOVA!</p>


