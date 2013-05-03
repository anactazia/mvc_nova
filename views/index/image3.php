<?php 
$pageTitle = "Here comes the sun...";
$pageId = "";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$sunsetimage="sunsetimage3";
$sunsettext="sunsettext3";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
$sunsetimage="sunsetimage32";
$sunsettext="sunsettext32";}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<img id="<?php echo $sunsetimage; ?>" src="../themes/images/winter.png" alt="sunset" />
<div id="<?php echo $sunsettext; ?>">
<p>Little darling,<br />
it's been a long cold lonely winter<br />
Little darling, <br />
it feels like years since it's been here<br />
Here comes the sun<br />
Here comes the sun, <br />and I say<br />
It's all right</p>
</div>

