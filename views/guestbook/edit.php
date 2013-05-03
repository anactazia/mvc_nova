<?php 
$pageTitle = GUESTBOOK;
$pageId = "guestbook";
?>
<?php include("views/header.php"); ?>
<?php include("views/nav.php"); ?>
<?php

Session::init();
$email = Session::get('email');
$author = Session::get('nickname');

$pagetitle="pagetitle";
$guestbookeditform ="guestbookeditform";
$guestbookedittable ="guestbookedittable";
if(NAVMENU == 'vertical'){$pagetitle ='pagetitle2';
			  $guestbookeditform ='guestbookeditform2';
			  $guestbookedittable ='guestbookedittable2';}
?>
<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>


<div class = "<?php echo $guestbookedittable; ?>">

  <?php
  echo '<p class="text">Meddelandet du vill ändra:</p>';
  echo '<div class="paper"><p class="title">' . $this->guestbook['topic'] . '</p>';
  echo '<p class="text">' . $this->guestbook['text'] . '</p></div>';

  ?>

</div>

<?php 
$time = date ("Y-m-d H:i:s");

$showemail = "Ja";
if($this->guestbook['showemail'] == 'no'){$showemail = 'Nej';}
$readers = "Alla";	
if($this->guestbook['readers'] == 'users'){$showemail = 'Inloggade användare';}
if($this->guestbook['readers'] == 'admin'){$showemail = 'Administratören';}
?>
<div class = "<?php echo $guestbookeditform; ?>">

  <form method="post" action="<?php echo BASE_URL;?>guestbook/editSave/<?php echo $this->guestbook['id']; ?>">
  
	<label class="label"><span class="uppercase left">Ämne</span></label><br />
	<input class = "input" type="text" name="topic" value="<?php echo $this->guestbook['topic']; ?>" /><br />
	
	<label class="label"><span class="uppercase left">Meddelande</span></label><br />
	<textarea class = "textarea" required name="text"><?php echo $this->guestbook['text']; ?></textarea><br />
	
	<label class="label"><span class="uppercase left">Skribent</span></label><br />
	<input class="input" type="text" readonly name="author" value = "<?php echo $author; ?>"/><br />
	
	<label class="label"><span class="uppercase left">Email</span></label><br />
	<input class="input" type="text" name="useremail" value = "<?php echo $email; ?>"/><br />
	
	<input type="hidden" name="edited" value="<?php echo $time; ?>"/>
		
	<label class = "label"><span class="uppercase left">Visa Email i inlägget</span></label><br />
	<select class="select" name="showemail">
		<option value="<?php echo $this->guestbook['showemail']; ?>"><?php echo $showemail; ?></option>
		<option value="no">Nej</option>
		<option value="yes">Ja</option>
	</select><br />
	
		<label class = "label"><span class="uppercase left">Vilka får läsa inlägget</span></label><br />
	<select class="select" name="readers">
		<option value="<?php echo $this->guestbook['readers']; ?>"><?php echo $readers; ?></option>
		<option value="all">Alla</option>
		<option value="users">Inloggade användare</option>
		<option value="admin">Administratören</option>
	</select><br />

	<input type="hidden" name="userid" value="<?php echo $this->guestbook['userid']; ?>" /><br />
	
	<label>&nbsp;</label><input class="submit guestbookeditsubmit" type="submit" value="Skicka"/></p>	
	
  </form>
  
</div>
