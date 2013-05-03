<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $pageTitle; ?></title>
	<link rel="shortcut icon" href="themes/images/logo.png">	
		
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>themes/css/<?php echo THEME; ?>.css" />
	<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700italic,700' rel='stylesheet' type='text/css'>

</head>

	<!-- The body id helps with highlighting current menu choice -->
	<body<?php if(isset($pageId)) echo " id='$pageId' "; ?>>
	

