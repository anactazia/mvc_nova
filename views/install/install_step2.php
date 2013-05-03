<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Installation</title>
	<link rel="shortcut icon" href="../themes/images/buttongreen.png">	
		
	<link rel="stylesheet" href="../themes/css/default.css" />

</head>

<body class="install_step2_box">
<h1>Installation</h1>

<p class="text uppercase">Steg 2 av 2. <br/ >

<div class="install_step2_table">
<p class="text message2">Följande tabeller har skapats i databasen:</p>
<p class="text message2">nova_users</p>
<p class="text message2">nova_guestbook</p>
<p class="text message2">nova_posts</p>
<p class="text message2">nova_config</p>
</div>

<div class ="install_step2_form">

  <form method="post" action="install_success/<?php echo $this->install['id']; ?>">
<p class="text message2 uppercase bold">Skapa en administratör.</p>

	<label class="label">Namn</label><br />
	<input class="input" type="text" required name="nickname" value="admin" /><br />
	<label class="label">Lösenord</label><br />
	<input class="input" type="password" required name="password" value="password"/><br />
	
	<label>&nbsp;</label><input class ="submit configsubmit" value="Skicka" type="submit" /><br />
	<br />
	<br />
<p>Om du väljer att inte ändra uppgifterna så kan du logga in med följande uppgifter:<br />
Användare: admin<br />
Lösenord: password<br />
Det går att ändra uppgifterna senare genom att gå in i inställningarna.</p>

</form>
</div>
</body>

