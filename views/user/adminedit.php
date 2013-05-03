<?php 
$pageTitle = ADMIN;
$pageId = "admin";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$adminuseredittable ="adminuseredittable";
$adminusereditform ="adminusereditform";
$adminusereditmessage ="adminusereditmessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			$adminuseredittable ="adminuseredittable2";
			$adminusereditform ="adminusereditform2";
			$adminusereditmessage ="adminusereditmessage2";}
			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>
<p class="text message <?php echo $adminusereditmessage; ?>">Här kan du ändra användarens uppgifter:</p>
<div class="<?php echo $adminuseredittable; ?>">

<?php


echo '<p class="usertitle">Användarnamn:</p>';
echo '<p class="userdetail">' . $this->user['nickname'] . '</p>';
echo '<p class="usertitle">Namn:</p>';
echo '<p class="userdetail">' . $this->user['name'] . '</p>';
echo '<p class="usertitle">Email:</label></p>';
echo '<p class="userdetail">' . $this->user['email'] . '</p>';
echo '<p class="usertitle">Behörighet:</p>';
echo '<p class="userdetail">' . $this->user['role'] . '</p></div>';




?>
<div class="<?php echo $adminusereditform; ?>">

<form class="formuser" method="post" action="<?php echo BASE_URL;?>user/admineditSave/<?php echo $this->user['id']; ?>">
	<label class="label">Användarnamn</label><br />
	<input class="input" type="text" required name="nickname" value="<?php echo $this->user['nickname']; ?>" /><br />
	<label class="label">Namn</label><br />
	<input class="input" type="text" name="name" value="<?php echo $this->user['name']; ?>" /><br />
	<label class="label">E-Mail</label><br />
	<input class="input" type="email" name="email" value="<?php echo $this->user['email']; ?>" /><br />
	<label class="label">Behörighet</label><br />
		<select class="select" name="role" >
			<option value="user" <?php if($this->user['role'] == 'user') echo 'selected'; ?>>Användare</option>
			<option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected'; ?>>Administratör</option>
		</select><br />
	<label>&nbsp;</label><input class="submit adminusereditsubmit" type="submit" />

</form>
</div>