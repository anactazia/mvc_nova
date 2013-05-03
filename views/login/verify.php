<?php 
$pageTitle = LOGIN;
$pageId = "login";

include("views/header.php");
include("views/nav.php");

$pagetitle="pagetitle";
$loginform = 'loginform';
if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
			   $loginform = 'loginform2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>

<?php  
// Connect to the database.         
mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());   
mysql_select_db(DB_NAME) or die(mysql_error()); 
              
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){  
 
$email = mysql_escape_string($_GET['email']);
$hash = mysql_escape_string($_GET['hash']); 
                  
$search = mysql_query("SELECT email, hash, active FROM nova_users WHERE email='".$email."' AND hash='".$hash."' AND active='no'") or die(mysql_error());   
$match  = mysql_num_rows($search);  
                  
if($match > 0){  

	mysql_query("UPDATE nova_users SET active='yes' WHERE email='".$email."' AND hash='".$hash."' AND active='no'") or die(mysql_error());  
        
	echo '<div class="text message">Ditt konto har blivit aktiverat, välkommen att logga in!</div>';  
    	
	} else {echo '<div class="text message">Länken är felaktig eller så är kontot redan aktiverat.</div>';}  
        }
else 
{echo '<div class="text message">Vänligen använd länken 
	som har blivit skickad till din email för att aktivera ditt konto.</div>';}  
?>
