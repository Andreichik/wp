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

function get_social_count($url)
{
/*
	//количество расшариваний на vk
	$vk_request = file_get_contents('http://vk.com/share.php?act=count&index=1&url=' . $url);
	$temp = array();
	preg_match('/^VK.Share.count\(1, (\d+)\);$/i', $vk_request, $temp);
	$vk = $temp[1];
	//в $temp[1] количество расшариваний, то есть сколько раз нажали "рассказать друзьям"
	
	//количество лайков в facebook
	$facebook_request = file_get_contents('http://graph.facebook.com/?id=' . $url);
	$fb_json = json_decode($facebook_request);
	$fb = 0;
	if(property_exists($fb_json, 'shares'))
	$fb = $fb_json->shares;
	// в $fb число расшариваний фейсбука
	
	//количество твитов в Twitter
	$twitter_request = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
	$twitter = json_decode($twitter_request);
	$tw = $twitter->count;
	// в $twitter->count число твитов
	
	//инфа по Одноклассникам
	$odnoklassniki_request = file_get_contents('http://www.odnoklassniki.ru/dk?st.cmd=extOneClickLike&uid=odklocs0&ref=' . $url);
	$temp = array();
	preg_match("/^ODKL.updateCountOC\('[\d\w]+','(\d+)','(\d+)','(\d+)'\);$/i", $odnoklassniki_request, $temp);
	$ok = $temp[1];
	//в $ok количество лайков на odnoklassniki.ru
	
	return $vk + $fb + $tw + $ok;
*/
	return 0;
}