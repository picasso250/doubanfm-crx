<?php

$base_url = 'http://douban.fm';

$url = "$base_url/j/new_captcha";
list($code, $content) = odie_get($url);
$captcha_id = trim($content, '"');
$_SESSION['ses_captcha_id'] = $captcha_id;

$url = "$base_url/misc/captcha?size=m&id=" .$captcha_id;

header('Content-Type:image/jpeg');

$ch = curl_init($url);
$content = curl_exec($ch);
if ($errno = curl_errno($ch)) {
    return array($errno, curl_error($ch));
}
