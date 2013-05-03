<?php 
$pageTitle = "Who's to say...";
$pageId = "";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$sunsetimage='sunsetimage1';
$sunsettext='sunsettext1';

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
$sunsetimage='sunsetimage12';
$sunsettext='sunsettext12';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<img id="<?php echo $sunsetimage; ?>" src="../themes/images/sunset.png" alt="sunset" />
<div id="<?php echo $sunsettext; ?>">
<p>Who's to say<br />
What's impossible<br />
Well they forgot<br />
This world keeps spinning<br />
And with <br />each new day<br />
I can feel a change in everything</p>
</div>














