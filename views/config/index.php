<?php 
$pageTitle = "Inställningar";
$pageId = "config";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$configadmin = "configadmin";
$init = "init";
$config = "config";
if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
			$configadmin = "configadmin2";
			$init = "init2";
			$config = "config2";
			}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<p class="text message">Här kan du konfigurera ditt ramverk.<br />
Välj bland alternativen nedan.</p>

<div class="<?php echo $config; ?>">
<a href="config">
<img class="config_index_button" src="../themes/images/buttongreen.png" alt="Installera" />
</a>
<p class="text center">Jag vill ändra i inställningarna för temat.</p>

</div>

<div class="<?php echo $init; ?>">
<a href="init">
<img class="config_index_button" src="../themes/images/buttonorange.png" alt="Initiera databasen" />
</a>
<p class="text center">Jag vill skapa <br />
eller återställa tabellerna i databasen!</p>

</div>

<div class="<?php echo $configadmin; ?>">
<a href="configadmin">
<img class="config_index_button" src="../themes/images/buttonblue.png" alt="Ändra Inställningar" />
</a>
<p class="text center">Jag vill ändra namn och lösenord för administratören.</p>

</div>

