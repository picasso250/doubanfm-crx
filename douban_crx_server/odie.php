<?php

function odie_get($url, $data = null, $headers = null, $opts = null) {
    $tmp = '/tmp';
    if (is_dir($tmp) && isset($opts['cache']) && $opts['cache']) {
        $filename = $tmp.'/'.str_replace('/', '-', $url);
        if (file_exists($filename)) {
            return array(200, file_get_contents($filename));
        }
    }

    if (is_array($data)) {
        $data = http_build_query($data);
    }
    if ($data) {
        $url .= "?$data";
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($headers) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    if ($opts && isset($opts['follow']) && !$opts['follow']) {
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    }
    if ($opts && isset($opts['cookie']) && $opts['cookie']) {
        $cookie = __DIR__.'/cookie';
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    }
    // curl_setopt($ch, CURLOPT_HEADER, 1);    //取得返回头信息
    $content = curl_exec($ch);
    if ($errno = curl_errno($ch)) {
        $err = curl_error($ch);
        error_log("curl error $errno $err");
        return array($errno, $err);
    }
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (is_dir($tmp) && isset($opts['cache']) && $opts['cache'] && $code == 200) {
        file_put_contents($filename, $content);
    }
    // $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    // $header = substr($response, 0, $headerSize);
    // $body = substr($response, $headerSize);
    // var_dump($header);
    // var_dump($body);
    // exit();
    return array($code, $content);
}

function odie_post($url, $data, $headers = null) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $cookie = __DIR__.'/cookie';
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

    if ($headers) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $content = curl_exec($ch);
    if ($errno = curl_errno($ch)) {
        return array($errno, curl_error($ch));
    }

    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return array($code, $content);
}
