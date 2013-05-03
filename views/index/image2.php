<?php 
$pageTitle = "I'll share this love...";
$pageId = "";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$sunsetimage="sunsetimage2";
$sunsettext="sunsettext2";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
$sunsetimage="sunsetimage22";
$sunsettext="sunsettext22";}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<img id="<?php echo $sunsetimage; ?>" src="../themes/images/tropic_sunset.png" alt="sunset" />
<div id="<?php echo $sunsettext; ?>">
<p>I'll find the things they say just can't be found<br />
I'll share this love I find with everyone<br />
We'll sing and dance to Mother Nature's songs<br />
I don't want this feeling <br />to go away</p>
</div>

