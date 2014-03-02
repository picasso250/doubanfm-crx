$ = {};
$.ajax = function (url, settings) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      var ret = (JSON.parse(xmlhttp.responseText));
      var success = settings.success;
      success(ret, xmlhttp.status, xmlhttp);
    }
  };
  xmlhttp.open(settings.type,url,true);
  if (settings.type == 'POST') {
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  };
  if ((typeof settings.data) == 'object') {
    var query = [];
    for (key in settings.data) {
      query.push(key+'='+settings.data[key]);
    }
    settings.data = query.join('&');
  };
  xmlhttp.send(settings.data);
};
$.get = function (url, data, success) {
  $.ajax(url, {
    type: 'GET',
    data: data,
    success: success
  });
};
$.post = function(url, data, success) {
  $.ajax(url, {
    type: 'POST',
    data: data,
    success: success
  });
};

var playlist = function () {
  $.get('http://localhost/douban_crx_server/api.php?act=playlist', {}, function (ret) {
    console.log(ret);
    if (ret.code == 0) {
      var song = ret.data[0];
      console.log(song);
      console.log(song.artist);
      var songImg = document.getElementById('songImg');
      songImg.src = song.picture;
      var playerAudio = document.getElementById('playerAudio');
      playerAudio.src = song.url;
    };
  });
};

var img = document.getElementById('captcha');
var changeImage = function () {
  img.src = 'http://localhost/douban_crx_server/api.php?act=captcha&t='+Date.now();
};

document.addEventListener('DOMContentLoaded', function () {
  // console.log('ss');
  var form = (document.getElementsByTagName('form')[0]);
  form.addEventListener('submit', function (e) {
    e.preventDefault();

    var arr = Array.prototype.map.call(form.getElementsByTagName('input'), function (e) {
      return (e.name+'='+e.value);
    });
    var data = arr.join('&');
    console.log(data);

    $.post('http://localhost/douban_crx_server/api.php', data, function (ret) {
      if (ret.code == 0) {
          document.getElementById('loginPage').style.display = 'none';
          var userInfo = document.getElementById('userInfo');
          var spans = userInfo.getElementsByTagName('span');
          var span;
          for (var i = 0; i < spans.length; i++) {
            span = spans[i];
            if (spans[i].class == 'name') {
              spans[i].innerHtml = ret.data.name;
            } else if (span.class == 'liked') {
              span.innerHtml = ret.data.play_record.liked;
            } else if (span.class == 'played') {
              span.innerHtml = ret.data.play_record.played;
            }
          };
          playlist();
        } else {
          document.getElementById('formMsg').innerHtml(ret.msg);
        }
    });
  });

  img.addEventListener('click', changeImage);
  // console.log(img);
});
document.getElementById('startBtn').addEventListener('click', function () {
  $.get('http://localhost/douban_crx_server/api.php?act=has_login', {}, function (ret) {
    console.log(ret);
    if (console.log(ret.code == 0)) {
      playlist();
    } else {
      document.getElementById('loginPage').style.display = 'block';
      changeImage();
    }
  });
});

