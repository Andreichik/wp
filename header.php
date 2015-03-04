<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?></title>
	<!-- Для мобильных устройств -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0" />
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" rel="stylesheet">
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:300&subset=cyrillic' rel='stylesheet' type='text/css'>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
	<?php global $gPageName; ?>
	<?php if ($gPageName == "single-project") {?>
	<link  href="<?php echo get_template_directory_uri(); ?>/styles/fotorama.css" rel="stylesheet">
	<script src="<?php echo get_template_directory_uri(); ?>/js/fotorama.js"></script>
	<?php }?>
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<?php if ($gPageName == "main") {?><header id="header"><?php } ?>
		<nav id="navigation" class="nav<?php if ($gPageName == "main") {?> nav-main<?php }?>">
			<div id="wrapper-menu">
				<div id="menu">
					<div class="item-menu">
						<?php if ($gPageName == "projects") {?>
						<div class="item-menu-active">Проекты</div>
						<?php } else if ($gPageName == "single-project") {?>
						<a href="<?php echo home_url(); ?>/projects" class="menu-active">Проекты</a>
						<?php } else {?>
						<a href="<?php echo home_url(); ?>/projects">Проекты</a>
						<?php }?>
					</div>
					<div class="item-menu">
						<a href="#">Друзья</a>
					</div>
					<div class="item-menu">
						<?php if ($gPageName == "authors") {?>
						<div class="item-menu-active">О Нас</div>
						<?php } else if ($gPageName == "single-author") {?>
						<a href="<?php echo home_url(); ?>/authors" class="menu-active">О Нас</a>
						<?php } else {?>
						<a href="<?php echo home_url(); ?>/authors">О Нас</a>
						<?php }?>
					</div>
					<div class="item-menu">
						<?php if ($gPageName == "contacts") {?>
						<div class="item-menu-active">Контакты</div>
						<?php } else {?>
						<a href="<?php echo home_url(); ?>/contacts">Контакты</a>
						<?php }?>
					</div>
				</div>
				<div id="<?php if ($gPageName == "main") {?>m<?php }?>logo">
					<a href="<?php echo home_url(); ?>" class="logo"></a>
				</div>
			</div>
		</nav>
	<?php if ($gPageName == "main") {?></header><?php } ?>