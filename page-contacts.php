<?php
	global $gPageName;
	$gPageName = "contacts";
	
	$view_form = true;
	if (isset($_GET['msg']))
	{
		$view_form = false;
		if ($_GET['msg'] == 'ok')
		{
			$result = "Ваше сообщение успешно отправлено";
		}
		else
		{
			$result = "Ваше сообщение не было отправлено";
		}
	}
	//print_r($_GET);
	//print_r($_POST);
	
	$username = ''; $username_err = '';
	$email = ''; $email_err = '';
	$theme = ''; $theme_err = '';
	$text = ''; $text_err = '';
	
	if ($view_form && isset($_POST['submit']))
	{
		$username = $_POST['username'];
		list($username, $username_err, $valid1) = check_input($username, 'Необходимо указать имя пользователя', 100);
		
		$email = $_POST['email'];
		$valid2 = true;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$email_err = 'Email указан неверно';
			$valid2 = false;
		}
		
		$theme = $_POST['theme'];
		list($theme, $theme_err, $valid3) = check_input($theme, 'Необходимо указать тему сообщения', 100);
		
		$text = $_POST['text'];
		list($text, $text_err, $valid4) = check_input($text, 'Необходимо написать сообщение');
		
		if ($valid1 && $valid2 && $valid3 && $valid4)
		{
			//$view_form = false;
			$msg = '';
			if (send_email($username, $email, $theme, $text))
			{
				$msg = 'ok';
			}
			header("Location: " . home_url() . "/" . $gPageName . "?msg=$msg");
			exit();
		}
	}
?>
<?php
	get_header();
	$page_data = get_page_by_path($gPageName);
?>
<section>
    <div id="wrapper">
		<div id="contacts">
			<h1><?php echo $page_data->post_title;?></h1>
			<p><?php echo $page_data->post_content;?></p>
			
			<div id="feedback">
			<?php if ($view_form) {?>
				<h2>Форма обратной связи</h2>
				
				<form name="feedback-form" action="<?php echo home_url() . '/' . $gPageName; ?>" method="post">
					<div class="label">Ваше имя</div>
					<div class="value"><input class="input" name="username" type="text" value="<?php echo $username;?>" /></div>
					<div class="error"><?php echo $username_err;?></div>
					<div class="clear"></div>
					
					<div class="label">Email</div>
					<div class="value"><input class="input" name="email" type="text" value="<?php echo $email	;?>" /></div>
					<div class="error"><?php echo $email_err;?></div>
					<div class="clear"></div>
					
					<div class="label">Тема</div>
					<div class="value"><input class="input" name="theme" type="text" value="<?php echo $theme;?>" /></div>
					<div class="error"><?php echo $theme_err;?></div>
					<div class="clear"></div>
					
					<div class="label">Текст</div>
					<div class="value"><textarea name="text" cols="1" rows="7" /><?php echo $text;?></textarea></div>
					<div class="error"><?php echo $text_err;?></div>
					<div class="clear"></div>
					
					<div><input name="submit" value="Отправить" type="submit" class="button" /></div>
					<div class="clear"></div>
				</form>
			<?php } else { ?>
				<h2><?php echo $result;?></h2>
			<?php } ?>
			</div>
		</div>
		
		<div id="wrapper-clear"></div>
	</div>
</section>
<?php get_footer(); ?>