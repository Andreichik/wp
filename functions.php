<?php
function check_input($data, $msg_err, $max_len = 0)
{
	$data = trim($data);
	$data = strip_tags($data);
	//$data = htmlspecialchars($data, ENT_QUOTES);
	
	$valid = false;
	if (strlen($data) > 0)
	{
		if ($max_len > 0)
		{
			if (strlen($data) <= $max_len)
			{
				$valid = true;
				$msg_err = '';
			}
			else
			{
				$msg_err = "Длина не должна превышать $max_len символов";
			}
		}
		else
		{
			$valid = true;
			$msg_err = '';
		}
	}
	return array($data, $msg_err, $valid);
}

function send_email($username, $email, $subject, $text)
{
	$to = get_option('admin_email');
	$msg = $text . "\r\n\r\nОтправитель: " . $username;
	
	return mail($to, $subject, $msg, "Content-type:text/plain; charset = UTF-8\r\nFrom:$email");
}