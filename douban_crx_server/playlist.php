<?php

$url = "$base_url/j/mine/playlist";

$data['type'] = 'n';
list($code, $content) = $arr = odie_get($url, $data);
if ($code != 200) {
    echo_json(1, "code $code");
    exit();
}
// "{"r":0,"song":[{"album":"\/subject\/25817137\/","picture":"http:\/\/img5.douban.com\/mpic\/s27216639.jpg","ssid":"ad84","artist":"Guided by Voices","url":"http:\/\/mr3.douban.com\/201402251039\/cd8fae25fd3bbf7dcbd2bba111b3fb6d\/view\/song\/small\/p2031237.mp3","company":"Not On Label","title":"I Am Columbus","rating_avg":3,"length":174,"subtype":"","public_time":"2014","sid":"2031237","aid":"25817137","sha256":"2fdfba52bfdee19e308f3c9ee8a7c02c7f92e5bb84ee1ae75d1b0e8942712e4c","kbps":"64","albumtitle":"Motivational Jump...","like":false},{"album":"\/subject\/25817137\/","picture":"http:\/\/img5.douban.com\/mpic\/s27216639.jpg","ssid":"3b31","artist":"Guided by Voices","url":"http:\/\/mr3.douban.com\/201402251039\/eb13940aed6614eea05db576092fd427\/view\/song\/small\/p2031245.mp3","company":"Not On Label","title":"Until Next Time","rating_avg":3,"length":88,"subtype":"","public_time":"2014","sid":"2031245","aid":"25817137","sha256":"13e66157c5d0a18daef3911edfbca2b004519afa244264d2e31693a20ad976d5","kbps":"64","albumtitle":"Motivational Jump...","like":false},{"album":"\/subject\/25833305\/","picture":"http:\/\/img5.douban.com\/mpic\/s27224947.jpg","ssid":"f201","artist":"Silversun Pickups","url":"http:\/\/mr3.douban.com\/201402251039\/4098d64398c0c449476b08232f183ad0\/view\/song\/small\/p2031086.mp3","company":"Dangerbird Records","title":"Lazy Eye","rating_avg":3.36692,"length":354,"subtype":"","public_time":"2014","sid":"2031086","aid":"25833305","sha256":"755df8a24ea5185aa4ade3f0e969f095648490fed811073e49da0a7f47039512","kbps":"64","albumtitle":"The Singles Colle...","like":false},{"album":"\/subject\/4889144\/","picture":"http:\/\/img3.douban.com\/mpic\/s4397463.jpg","ssid":"8c89","artist":"Sin","url":"http:\/\/mr3.douban.com\/201402251039\/14e9f7c5f54daf691c2f2c26be7ad9a6\/view\/song\/small\/p2031218.mp3","company":"Warner","title":"Too Much To Ignore","rating_avg":3.53048,"length":280,"subtype":"","public_time":"2010","sid":"2031218","aid":"4889144","sha256":"a639d7a5ee68e3ff943432f98ce09275ad1aa9cb57432c6ebf47bf8f1310bcea","kbps":"64","albumtitle":"SiN","like":false},{"album":"\/subject\/25829138\/","picture":"http:\/\/img3.douban.com\/mpic\/s27220462.jpg","ssid":"b713","artist":"CNBLUE","url":"http:\/\/mr3.douban.com\/201402251039\/99abf2a41fbe51a06eb98609a3d3477d\/view\/song\/small\/p2031349.mp3","company":"CJ E&M","title":"아이의 노래 (Like A Child)","rating_avg":4.32636,"length":229,"subtype":"","public_time":"2014","sid":"2031349","aid":"25829138","sha256":"3d9339be3db1ad78fdfc3bd1797de81e6a22f9d85d75563e90755ae7685a518c","kbps":"64","albumtitle":"Can't Stop","like":false},{"album":"\/subject\/3286090\/","picture":"http:\/\/img5.douban.com\/mpic\/s3347247.jpg","ssid":"315a","artist":"Robert Crumb","url":"http:\/\/mr4.douban.com\/201402251039\/90cef37970bcb945e4a88eefda36ac36\/view\/song\/small\/p2031193.mp3","company":"EMI Int'l","title":"Sing Song Girl","rating_avg":4.24087,"length":196,"subtype":"","public_time":"1999","sid":"2031193","aid":"3286090","sha256":"7eeba6a2067c7c179ab74178cb95536ea8b486d4d86c3975f0f9c12832046724","kbps":"64","albumtitle":"That's What I Cal...","like":false},{"album":"\/subject\/4934078\/","picture":"http:\/\/img3.douban.com\/mpic\/s4431655.jpg","ssid":"d642","artist":"David Sylvian","url":"http:\/\/mr3.douban.com\/201402251039\/ace35be12bfa12273d99472c852b931c\/view\/song\/small\/p2031175.mp3","company":"Samadhisound","title":"Playground Martyrs","rating_avg":3.84477,"length":159,"subtype":"","public_time":"2010","sid":"2031175","aid":"4934078","sha256":"1b5beff23b960bfc44211e0386b8d9fecf09f847914dcee80d3bde8110eff49b","kbps":"64","albumtitle":"Sleepwalkers","like":false},{"album":"\/subject\/25774534\/","picture":"http:\/\/img3.douban.com\/mpic\/s27144693.jpg","ssid":"282e","artist":"Neneh Cherry","url":"http:\/\/mr3.douban.com\/201402251039\/d62184e7c4862f10cb2213f3546c30bc\/view\/song\/small\/p2031267.mp3","company":"Republic of Music","title":"Cynical","rating_avg":3.95663,"length":251,"subtype":"","public_time":"2014","sid":"2031267","aid":"25774534","sha256":"80ff513abf5b1a70752f0e31f3c901c52a6f35bd1fd107f52dab7ba13e80fda7","kbps":"64","albumtitle":"Blank Project","like":false},{"album":"\/subject\/3161079\/","picture":"http:\/\/img3.douban.com\/mpic\/s3200445.jpg","ssid":"4fe0","artist":"小虎队","url":"http:\/\/mr3.douban.com\/201402251039\/f82c7d502ae7a60bc8905fb636e8d8b2\/view\/song\/small\/p2031055.mp3","company":"正东唱片","title":"记住你的香","rating_avg":4.62531,"length":220,"subtype":"","public_time":"1996","sid":"2031055","aid":"3161079","sha256":"39194808522d19846d1f0d2f65c6f968ec06ea4eed7f4e095d54891b78d0dedd","kbps":"64","albumtitle":"小虎队虎啸龙腾狂...","like":false},{"album":"\/subject\/6384597\/","picture":"http:\/\/img5.douban.com\/mpic\/s6331148.jpg","ssid":"78ae","artist":"小皮","url":"http:\/\/mr3.douban.com\/201402251039\/5711dd2534dd1edcd09b0e52ce020846\/view\/song\/small\/p2031477.mp3","company":"时间音乐","title":"生活","rating_avg":4.02372,"length":306,"subtype":"","public_time":"2011","sid":"2031477","aid":"6384597","sha256":"c163110f0622f794c2a6daf671ea7a62b22517c7831ab0d4f1536e06db7f5c80","kbps":"64","albumtitle":"我们都是岁月的孩子","like":false}]}"
$ret = json_decode($content, true);
if ($ret['r'] != 0) {
    echo_json(1, $ret['err_msg']);
    exit();
}

// [9]=>
//     array(17) {
//       ["album"]=>
//       string(17) "/subject/6384597/"
//       ["picture"]=>
//       string(40) "http://img5.douban.com/mpic/s6331148.jpg"
//       ["ssid"]=>
//       string(4) "78ae"
//       ["artist"]=>
//       string(6) "小皮"
//       ["url"]=>
//       string(96) "http://mr3.douban.com/201402251039/5711dd2534dd1edcd09b0e52ce020846/view/song/small/p2031477.mp3"
//       ["company"]=>
//       string(12) "时间音乐"
//       ["title"]=>
//       string(6) "生活"
//       ["rating_avg"]=>
//       float(4.02372)
//       ["length"]=>
//       int(306)
//       ["subtype"]=>
//       string(0) ""
//       ["public_time"]=>
//       string(4) "2011"
//       ["sid"]=>
//       string(7) "2031477"
//       ["aid"]=>
//       string(7) "6384597"
//       ["sha256"]=>
//       string(64) "c163110f0622f794c2a6daf671ea7a62b22517c7831ab0d4f1536e06db7f5c80"
//       ["kbps"]=>
//       string(2) "64"
//       ["albumtitle"]=>
//       string(27) "我们都是岁月的孩子"
//       ["like"]=>
//       bool(false)
//     }

echo json_encode(array('code' => 0, 'data' => $ret['song']));
