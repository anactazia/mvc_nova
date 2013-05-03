<?php 
$pageTitle = "Ändra ett inlägg";
$pageId = "post";

include("views/header.php"); 
include("views/nav.php"); 

Session::init();
$email = Session::get('email');
$author = Session::get('nickname');
$pagetitle="pagetitle";
$postsedittable = "postsedittable";
$postseditform = "postseditform";
if(NAVMENU == 'vertical'){$pagetitle ="pagetitle2";
			$postsedittable = "postsedittable2";
				$postseditform = "postseditform2";	}
?>

<h1 class="<?php echo $pagetitle; ?>"><?php echo $pageTitle; ?></h1>


<?php 
$time = date ("Y-m-d H:i:s");
$option = "";
if($this->posts['type'] == 'post'){$option = 'Blogg';}
if($this->posts['type'] == 'page'){$option = 'Artikel';}

$showemail = "Ja";
if($this->posts['showemail'] == 'no'){$showemail = 'Nej';}
$readers = "Alla";	
if($this->posts['readers'] == 'users'){$readers = 'Inloggade användare';}
if($this->posts['readers'] == 'admin'){$readers = 'Administratören';}

?>
<div class = "<?php echo $postseditform; ?>">

  <form method="post" action="<?php echo BASE_URL;?>posts/editSave/<?php echo $this->posts['id']; ?>">
  
	<label class="label"><span class="uppercase left">Ämne</span></label><br />
	<input class = "input" type="text" name="title" value="<?php echo $this->posts['title']; ?>" /><br />
	
	<label class="label"><span class="uppercase left">Meddelande</span></label><br />
	<textarea class = "textarea" required name="text"><?php echo $this->posts['text']; ?></textarea><br />
	
	<label class="label"><span class="uppercase left">Skribent</span></label><br />
	<input class = "input" type="text" name="author" readonly value="<?php echo $author; ?>" /><br />
	
	<label class="label"><span class="uppercase left">Email</span></label><br />
	<input class = "input" type="text" name="useremail" readonly value="<?php echo $email; ?>" /><br />

        <label class = "label"><span class="uppercase left">Visa Email i inlägget</span></label><br />
	<select class="select" name="showemail">
		<option value="<?php echo $this->posts['showemail']; ?>"><?php echo $showemail; ?></option>
		<option value="no">Nej</option>
		<option value="yes">Ja</option>
	</select><br />
	
	<label class="label"><span class="uppercase left">Bild <span class="small">( endast för artiklar )</span></label><br />
        <input class="input" type="text" name="image" value="<?php echo $this->posts['image']; ?>"/><br />	
	
	<label class = "label"><span class="uppercase left">Typ av inlägg</span></label><br />
	<select class="select" name="type">
		<option value="<?php echo $this->posts['type']; ?>"><?php echo $option; ?></option>
		<option value="post">Blogg</option>
		<option value="page">Artikel</option>
	</select><br />
		
	<label class = "label"><span class="uppercase left">Vilka får läsa inlägget</span></label><br />
	<select class="select" name="readers">
		<option value="<?php echo $this->posts['readers']; ?>"><?php echo $readers; ?></option>
		<option value="all">Alla</option>
		<option value="users">Inloggade användare</option>
		<option value="admin">Administratören</option>
	</select><br />
	
	<input type="hidden" name="author" value = "<?php echo $this->posts['author']; ?>"/>
	
	<input type="hidden" name="edited" value="<?php echo $time; ?>"/>
	
	<label>&nbsp;</label><input class="submit postsubmit" type="submit" value="Skicka"/>
  </form>
  
</div>

<div class = "<?php echo $postsedittable; ?>">

  <?php
  echo '<div class="paper">';
  echo '<p class="title">' . $this->posts['title'] . '</p>';
  echo '<p class="text">' . $this->posts['text'] . '</p></div>';
  ?>

</div>
