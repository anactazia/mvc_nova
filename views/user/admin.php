<?php 
$pageTitle = ADMIN;
$pageId = "admin";

include("views/header.php"); 
include("views/nav.php"); 

$pagetitle="pagetitle";
$adminusertable ="adminusertable";
$adminuserform ="adminuserform";
$adminusermessage="adminusermessage";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			 $adminusertable ="adminusertable2";
				$adminuserform ="adminuserform2";
			$adminusermessage="adminusermessage2";}
			  
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>
<p class="text message <?php echo $adminusermessage; ?>">Här kan du lägga till, ändra eller ta bort användare.</p>
<div class="<?php echo $adminuserform; ?>">



<form method="post" action="<?php echo BASE_URL;?>user/acreate">
	<label class="label">Användarnamn</label><br />
	<input class="input" required type="text" name="nickname" /><br />
	<label class="label">Namn</label><br />
	<input class="input" required type="text" name="name" /><br />
	<label class="label">Lösenord</label><br />
	<input class="input" required type="password" name="password" /><br />
	<label class="label">E-Mail</label><br />
	<input class="input" type="email" name="email" /><br />
	<label class="label">Behörighet</label><br />
		<select class="select" name="role">
			<option value="user">Användare</option>
			<option value="admin">Administratör</option>
		</select><br />
	<label>&nbsp;</label><input class="submit adminusersubmit" type="submit" />
</form>
</div>

<div class="<?php echo $adminusertable; ?>">

<?php 	
echo '<div class="paper">';
echo '<table class="admintable"><tr class="background">';
echo '<td><span class="label">Användarnamn</span></td>';
echo '<td><span class="label">Namn</span></td>';
echo '<td><span class="label">Email</span></td>';
echo '<td><span class="label">Behörighet</span></td>';
echo '<td><span class="label">Ändra / Ta Bort</span></td>';
echo '</tr>';



 	foreach($this->userList as $key => $value) {
		
echo '<tr>';
echo '<td><span class="">' . $value['nickname'] . '</span></td>';
echo '<td><span class="">' . $value['name'] . '</span></td>';
echo '<td><span class="">' . $value['email'] . '</span></td>';
echo '<td><span class="">' . $value['role'] . '</span></td>';
echo '<td><a href="'.BASE_URL.'user/edit/'.$value['id'].'">
<span class="uppercase small">Edit</span></a>' . ' / ' . ' 
<a href="'.BASE_URL.'user/delete/'.$value['id'].'">
<span class="uppercase small">Delete</span></a><span></td>';
echo '</tr>';
	}
echo '</table></div>';	
?>

</div>