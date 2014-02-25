<?php

function odie_get($url, $data = null, $opts = null) {
    $tmp = '/tmp';
    if (is_dir($tmp)) {
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
    $content = curl_exec($ch);
    if ($errno = curl_errno($ch)) {
        return array($errno, curl_error($ch));
    }
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (is_dir($tmp) && $code == 200) {
        file_put_contents($filename, $content);
    }
    return array($code, $content);
}

function odie_post($url, $data, $opts = null) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    if ($opts) {
        $headers = array();
        foreach ($opts as $key => $value) {
            $headers[] = "$key:$value";
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $content = curl_exec($ch);
    if ($errno = curl_errno($ch)) {
        return array($errno, curl_error($ch));
    }

    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return array($code, $content);
}
