<?php 
$pageTitle = INDEX;
$pageId = "home";

$featured_first = "featured-first";
$primary = "primary";
if(NAVMENU == 'vertical'){
	$featured_first = "featured-first2";
	$primary = "primary2";}

include("views/header.php"); 
include("views/nav.php"); 
?>

<div id='outer-wrap-featured'>
<div id='inner-wrap-featured'>
<div id='<?php echo $featured_first; ?>'><a href="index/image1"><img src="themes/images/sunset.png" alt="sunset" /></a>
</div>
<div id='featured-first'><a href="index/image2"><img src="themes/images/tropic_sunset.png" alt="sunset" /></a>
</div>
<div id='featured-first'><a href="index/image3"><img src="themes/images/winter.png" alt="sunset" /></a>
</div>
</div>
</div>

<div id='outer-wrap-main'>
<div id='inner-wrap-main'>

<div id='<?php echo $primary; ?>'><p class="welcome">Välkommen till Nova!</p>
<p class="welcome2">- ett mvc ramverk byggt för dina behov!</p>
</div>
<div id='sidebar'><p class="sidebartext">Ladda ner Nova</p>
<p class = "download">
<a href="https://github.com/anactazia/mvc_nova/archive/master.zip" target="_blank">
<img class="download" src="themes/images/download.png" alt="Ladda ner NOVA" /></a></p> 

<p class="source">Novas källkod kan du se <a href="https://github.com/anactazia/mvc_nova">här</a></p>




</div>
</div>
</div>


<div id='outer-wrap-triptych'>
<div id='inner-wrap-triptych'>
<a href="index/pageguestblog"><div id='triptych-first'><p class="triphead">Gästbok och Blogg</p><p class="triptext">Lämna hälsningar och dela med dig av dina upplevelser.</p>
</div></a>
<a href="index/pagethemes"><div id='triptych-middle'><p class="triphead">Ditt eget Tema</p><p class="triptext">Anpassa Novas tema efter dina egna önskemål.</p>
</div></a>
<a href="index/pageadmin"><div id='triptych-last'><p class="triphead">Admin</p><p class="triptext">Ett administrativt gränssnitt som låter dig hantera din sidas användare.</p>
</div></a>
</div>
</div>

