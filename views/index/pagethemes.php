<?php 
$pageTitle = "Ditt eget tema...";
$pageId = "";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$pagethemesimage='pagethemesimage';

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
$pagethemesimage='pagethemesimage2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<img id="<?php echo $pagethemesimage; ?>" src="../themes/images/pagethemes.png" alt="image" />


