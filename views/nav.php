<header id="header">
	<?php 
	$title = 'title';
	$navmenu = 'navmenu';
	if(LOGO_SHOW == 'yes')
	{echo '<a href="' . BASE_URL . 'index"><img class="logo" src="' . LOGO . '" alt="logo" /></a>';}
	else {	$title = 'titlenologo';
		$navmenu = 'navmenunologo';}
	if(TITLE_SHOW == 'yes')
		{echo '<a href="' . BASE_URL . 'index"><div id="' . $title . '">' . TITLE . '</div></a>';}
	
	Session::init();
	$email = Session::get('email');
	$hash = md5(strtolower(trim($email)));
	$break = "";
	$content = "content";
	$loginmenu = "";
	if(Session::get('loggedIn') == 'loggedIn') {$loginmenu = 'loginmenu';}
	else {$loginmenu = "loginmenunologg";}
	$toolmenu = "";
	if(GRAVATAR_SHOW == 'no'){$toolmenu = 'toolmenunogravatar';} else {$toolmenu = 'toolmenu';}
	$gravatar ="";
	if(GRAVATAR_SHOW == "yes")
		{$gravatar = '<a id=gravatar href=' . BASE_URL . 'dashboard><img class=gravatar2 src=http://www.gravatar.com/avatar/' . $hash . '.jpg?r=pg&amp;d=wavatar&amp; /></a>';}
	if(NAVMENU == 'vertical'){ 
		$break = '<br />';
		$content = "content2";
		if(Session::get('loggedIn') == 'loggedIn') {$loginmenu = 'loginmenu2';}
		else {$loginmenu = 'loginmenunologg2';}	
		$navmenu = 'navmenu2';
		if(GRAVATAR_SHOW == 'no'){$toolmenu = 'toolmenunogravatar2';} else {$toolmenu = 'toolmenu2';}
		if(GRAVATAR_SHOW == "yes")
		{$gravatar = '<a id=gravatar2 href=' . BASE_URL . 'dashboard><img class=gravatar2 src=http://www.gravatar.com/avatar/' . $hash . '.jpg?r=pg&amp;d=wavatar&amp; /></a>';}}
	
		$home = "";
		$guestbook = "";
		$blog = "";
		$articles = "";
		$contact = "";
		$page = "";
		$post = "";
		$trashcan = "";
		
		if(INDEX_SHOW == 'yes')
			{$home = '<a id="home-" href="' . BASE_URL . 'index">' . INDEX . '</a>' . $break;}
		if(GUESTBOOK_SHOW == 'yes')
			{$guestbook = '<a id="guestbook-" href="' . BASE_URL . 'guestbook">' . GUESTBOOK . '</a>' . $break;}
		if(BLOG_SHOW == 'yes')
			{$blog = '<a id="blog-" href="' . BASE_URL . 'posts/blog">' . BLOG . '</a>' . $break;}
		if(ARTICLES_SHOW == 'yes')
			{$articles = '<a id="articles-" href="' . BASE_URL . 'posts/articles">' . ARTICLES . '</a>' . $break;}
		if(CONTACT_SHOW == 'yes')
			{$contact = '<a id="contact-" href="' . BASE_URL . 'contact">' . CONTACT . '</a>' . $break;}
		if(PAGE_SHOW == 'yes')
			{$page = '<a id="page-" href="' . BASE_URL . 'page">' . PAGE . '</a>' . $break;}
		if(POST_SHOW == 'yes')	
			{if(BLOG_SHOW == 'yes' || ARTICLES_SHOW == 'yes')
				{$post = '<a id="post-" href="' . BASE_URL . 'posts/createpost">
				<img class="writebutton" src="' . BASE_URL . 'themes/images/write.png" alt="' . POST . '" /></a>';}}
		if(TRASHCAN_SHOW == 'yes')
			{if(GUESTBOOK_SHOW == 'yes' || BLOG_SHOW == 'yes' || ARTICLES_SHOW == 'yes')
				{$trashcan = '<a id="trashcan-" href="' . BASE_URL . 'posts/trashcan">
			<img class="trashcanbutton" src="' . BASE_URL . 'themes/images/trashcan.png" alt="' . TRASHCAN . '" /></a>';}}
		?>           

	<div id="<?php echo $navmenu ?>">
	<?php	echo $home;
		echo $guestbook;
		echo $blog;
		echo $articles;
		echo $contact;
		echo $page;
		
	?>
	</div>
		
	<?php if (Session::get('loggedIn') == false):?>
		<div id="<?php echo $toolmenu ?>">
		</div>

		<div id="<?php echo $loginmenu ?>">
		<a id="login-" href="<?php echo BASE_URL; ?>login"><?php echo LOGIN; ?></a>
		</div>
	<?php endif; ?>	
		
<?php if (Session::get('loggedIn') == true):?>
		
   	<?php if (Session::get('role') == 'admin'):?>
	
   		<div id="<?php echo $toolmenu ?>">
			
   			<?php echo $trashcan; ?>
			<?php echo $post; ?>
			<a id="config-" href="<?php echo BASE_URL; ?>config/index">
			<img class="configbutton" src="<?php echo BASE_URL; ?>themes/images/tools.png" alt="Config" /></a>
			<?php echo $gravatar; ?><br />
			
		</div>
		
		<div id="<?php echo $loginmenu ?>">
		
			<a href="<?php echo BASE_URL; ?>dashboard/logout"><?php echo LOGOUT; ?></a>		
			<a id="admin-" href="<?php echo BASE_URL; ?>user/admin"><?php echo ADMIN; ?></a>
			<a id="profile-" href="<?php echo BASE_URL; ?>user/useredit"><?php echo PROFILE; ?></a>
			
		</div>
		
	<?php endif; ?>
		
	<?php if (Session::get('role') !== 'admin'):?>
		   
		<div id="<?php echo $toolmenu ?>">
			
   			<?php echo $trashcan; ?>
			<?php echo $post; ?>
			<?php echo $gravatar; ?><br />
			
		</div>
		
		<div id="<?php echo $loginmenu ?>">
	
		<a href="<?php echo BASE_URL; ?>dashboard/logout"><?php echo LOGOUT; ?></a>
		<a id="profile-" href="<?php echo BASE_URL; ?>user/useredit"><?php echo PROFILE; ?></a>

		</div>
		
	<?php endif; ?>
		
<?php endif; ?>
		
	
</header>
	
<div id="<?php echo $content; ?>">
