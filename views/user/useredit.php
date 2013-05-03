<?php 
$pageTitle = "Medlemssida";
$pageId = "user";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$userform ="userform";
$usertable ="usertable";
$message="usermessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			  $userform ="userform2";
			  $usertable ="usertable2";
				$message="usermessage2";}
			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>


<?php

echo '<p class="text message ' . $message . '">Här kan du ändra dina användaruppgifter:</p>';
echo '<div class="' . $usertable . '">';

echo '<p class="usertitle">Användarnamn:</p>';
echo '<p class="userdetail">' . $this->user['nickname'] . '</p>';
echo '<p class="usertitle">Namn:</p>';
echo '<p class="userdetail">' . $this->user['name'] . '</p>';
echo '<p class="usertitle">Email:</p>';
echo '<p class="userdetail">' . $this->user['email'] . '</p>';

echo '</div>';

?>
<div class ="<?php echo $userform; ?>">
<form class="formuser" method="post" action="<?php echo BASE_URL;?>user/usereditSave/<?php echo $this->user['id']; ?>">
	<label class="postslabel">Användarnamn</label><br />
	<input class="input" type="text" required name="nickname" value="<?php echo $this->user['nickname']; ?>" /><br />
	<label>Lösenord</label><br />
	<input class="input" type="password" required name="password"  /><br />
	<label>Namn</label><br />
	<input class="input" type="text" name="name" value="<?php echo $this->user['name']; ?>" /><br />
	<label>E-Mail</label><br />
	<input class="input" type="email" name="email" value="<?php echo $this->user['email']; ?>" /><br />
	<input type="hidden" name="role" value="<?php echo $this->user['role']; ?>" /><br />
	<label>&nbsp;</label><input class ="submit usersubmit" value="Skicka" type="submit" /><br />
	<?php echo '<a href="'.BASE_URL.'user/userdelete/'.$this->user['id'].'"><span class="delete">Ta bort konto</span></a>';
?>
	
</form>
</div>
