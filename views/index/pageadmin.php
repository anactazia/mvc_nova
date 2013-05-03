<?php 
$pageTitle = "Ett administrativt gränssnitt...";
$pageId = "";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$pageadminimage='pageadminimage';

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
$pageadminimage='pageadminimage2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<img id="<?php echo $pageadminimage; ?>" src="../themes/images/pageadmin.png" alt="image" />


