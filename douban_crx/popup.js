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

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        console.log(JSON.parse(xmlhttp.responseText));
        var ret = (JSON.parse(xmlhttp.responseText));

        document.getElementById('loginPage').style.display = 'none';
        var userInfo = document.getElementById('userInfo');
        var spans = userInfo.getElementsByTagName('span');
        for (var i = 0; i < spans.length; i++) {
          for (k in ret) {

          }
          if (spans[i].class == 'name');
        };
      }
    }
    xmlhttp.open("POST","http://localhost/douban_crx_server/api.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(data);
  });

  var img = document.getElementById('captcha');
  img.addEventListener('click', function () {
    img.src += '&t='+Date.now();
  });
  console.log(img);
});
document.addEventListener('click', function () {
  var img = document.getElementById('captcha')
  console.log(img);
});

