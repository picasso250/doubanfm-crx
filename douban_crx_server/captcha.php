<?php

$base_url = 'http://douban.fm';

$url = "$base_url/j/new_captcha";
$headers = array(
    'Referer:http://douban.fm/',
    'User-Agent:Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36',
    'X-Requested-With:XMLHttpRequest'
);
$opts = array('cookie' => 1, 'follow' => 1);
list($code, $content) = odie_get($url, null, $headers, $opts);
error_log("$url $code $content");
// var_dump($content);
$captcha_id = json_decode($content);
// var_dump($captcha_id);
// exit();
$_SESSION['ses_captcha_id'] = $captcha_id;

$url = "$base_url/misc/captcha?size=m&id=" .$captcha_id;
// var_dump($url);
// exit();

header('Content-Type:image/jpeg');

$ch = curl_init($url);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$cookie = __DIR__.'/cookie';
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$content = curl_exec($ch);
if ($errno = curl_errno($ch)) {
    $err = curl_error($ch);
    error_log("curl error $errno $err");
    return array($errno, $err);
}
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
error_log("$url $code");
