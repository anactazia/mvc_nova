<?php 
$pageTitle = "Gästbok och Blogg...";
$pageId = "";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$pageguestblogimage='pageguestblogimage';

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
$pageguestblogimage='pageguestblogimage2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<img id="<?php echo $pageguestblogimage; ?>" src="../themes/images/pageguestblog.png" alt="image" />


