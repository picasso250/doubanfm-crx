<?php

$url = "$base_url/j/login";

$username = _req('username');
$password = _req('password');
$captcha_solution = _req('captcha_solution');
if (empty($username) || empty($password) || empty($captcha_solution)) {
    $msg = '请填写用户名/密码/验证码';
    echo json_encode(array('code' => 1, 'msg' => $msg));
    exit();
}

$data = array(
    'source' => 'radio',
    'alias' => $username,
    'form_password' => $password,
    'remember' => 'on',
    'task' => 'sync_channel_list',
    'captcha_id' => $_SESSION['ses_captcha_id'],
    'captcha_solution' => $captcha_solution,
);

$headers = array(
    'Origin: http://douban.fm',
);

list($code, $content) = $arr = odie_post($url, $data, $headers);
if ($code != 200) {
    error_log("post $url ".http_build_query($data)." $code $content");
    echo_json(1, "code $code");
    exit();
}
// "{"user_info":{"ck":"tEZ9","play_record":{"fav_chls_count":7,"liked":425,"banned":97,"played":10162},"is_new_user":0,"uid":"xiaochi2","third_party_info":null,"url":"http:\/\/www.douban.com\/people\/xiaochi2\/","is_dj":false,"id":"2778286","is_pro":false,"name":"小池·水"},"r":0}"
$ret = json_decode($content, true);
if ($ret['r'] != 0) {
    echo_json(1, $ret['err_msg']);
    exit();
}

echo json_encode(array('code' => 0, 'data' => $ret['user_info']));
