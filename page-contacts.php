<?php
	global $gPageName;
	$gPageName = "contacts";
	get_header();
?>
<section>
    <div id="wrapper">
	<?php
		$page_data = get_page_by_path($gPageName); 
		//print_r($page_data);
		//print_r($_POST);
		$username = ''; $username_err = '';
		$email = ''; $email_err = '';
		$theme = ''; $theme_err = '';
		$text = ''; $text_err = '';
		$view_form = true;
		$result = '';
		
		if (isset($_POST['submit']))
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
				$view_form = false;
				if (send_email($username, $email, $theme, $text))
				{
					$result = "Ваше сообщение успешно отправлено на $email";
				}
				else
				{
					$result = "Ваше сообщение не было отправлено на $email";
				}
			}
		}
	?>
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
				<script>
					var time = 1;
					function Redirect()
					{
						if (time-- <= 0) location.href = '<?php echo home_url() . '/' . $gPageName;?>';
					}
					setInterval(Redirect, 1000);
				</script>
			<?php } ?>
			</div>
		</div>
		
		<div id="wrapper-clear"></div>
	</div>
</section>
<?php get_footer(); ?>