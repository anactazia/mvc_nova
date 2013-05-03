<?php 
$pageTitle = PAGE;
$pageId = "page";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";

if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>
<div id="requirements">
<p class="text message2">Ramverket NOVA är skapat som examensuppgift för kursen PHPMVC på Blekinge Tekniska Högskola.</p>
<br />
<p class="text message2">För att ladda ner NOVA till din dator kan du antingen klona från GitHub med följande kommando:</p>
<br />
<p class="center"><code>git clone git://github.com/anactazia/mvc_nova.git</code></p>
<br />
<p class="text message2">Eller så hämtar du hem det genom att trycka på länken nedan:</p>
<p class = "download">
<a href="https://github.com/anactazia/mvc_nova/archive/master.zip" target="_blank">
<img class="download" src="themes/images/download.png" alt="Ladda ner NOVA" /></a></p> 

<p class="source">Novas källkod kan du se <a href="https://github.com/anactazia/mvc_nova">här</a></p>
<br />
<p class="text message2 uppercase bold">Vad behöver jag ha innan jag laddar ner NOVA?</p>

<p class="text message2">Du behöver ha php version 5.3.3 eller senare, en server med databas<br /> samt en klient för att kunna ladda
upp bilder om inte servern är lokal.</p>
<br />
<?php

if (version_compare(phpversion(), "5.3.3", ">=")) {
echo '<p class="text message2 red bold uppercase">Grattis!<br /> På den här datorn finns rätt version installerad!<br />
       Din php version är: ' . phpversion() . '</p>';
} else {
echo '<p class="text message2 red bold uppercase">Tyvärr har du inte rätt version installerad.<br />
       Din php version är: ' . phpversion() . '</p>';}
?>
<br />
<br />
<table class="requirements">
<tr><td colspan="2"><p class="text uppercase bold">Server med databas</p></td></tr>
<tr><td class="requirementsalign"><a href="http://www.wampserver.com/en/#download-wrapper">
<img class="requirementsimage" src="themes/images/WampServer.png" alt="WampServer" /></a></td>
    <td><p class="text">Du behöver en server att ladda upp NOVA till. Det behövs 
    även en databas för att NOVAs gästbok, blogg, artiklar samt hantering av användare skall 
    kunna fungera. Om du inte har en server installerad så rekommenderar vi WampServer.
    Med WampServer installeras PHPMyAdmin, där du enkelt kan sköta din databas.
    Tryck på länken för att komma till sidan där du kan ladda ner WampServer.</p></td></tr>
</table> 

<table class="requirements">
<tr><td colspan="2"><p class="text uppercase bold">Klient för att kunna ladda upp bilder</p></td></tr>
<tr><td class="requirementsalign"><a href="http://sourceforge.net/projects/filezilla/files/FileZilla_Client/3.6.0.2/FileZilla_3.6.0.2_win32-setup.exe/download?accel_key=57%3A1367476402%3Ahttps%253A//filezilla-project.org/download.php%253Ftype%253Dclient%3A38f45982%24b776632ccbf62f26501c35973d7d83ab8d2395b8&click_id=2f96ba0a-b2f2-11e2-877e-0200ac1d1d8a&source=accel">
<img class="requirementsimage" src="themes/images/filezilla.png" alt="WampServer" /></a></td>
    <td><p class="text">För att kunna ladda upp bilder till din server så behöver du en klient. 
    Om du inte redan har en installerad så rekommenderar vi FileZillas klient.
    Tryck på länken för att ladda ner FileZilla.</p></td></tr>
</table>   
</div>
