<!DOCTYPE html>
<html>

<head>
    <title>Fake SpeedTest Gen-Amresh</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }

    .active {
        background-color: #4CAF50;
    }
    </style>
</head>

<body>

    <ul>
        <li><a class="active" href="" onclick="window.location.reload()">Home</a></li>
        <!--  <li><a target=_blank href="https://post4vps.com">Post4VPS</a></li><li><a target=_blank href="https://post4vps.com/user-1044.html">Contact</a></li> -->
        <li><a target=_blank href="https://www.speedtest.net/speedtest-servers-static.php">Server List</a></li>
        <li><a target=_blank href="https://www.speedtest.net/results?sh=e046fe9be0947576647d9878562862b4">Reults</a>
        </li>
        <li><a target=_blank href="https://github.com/tlmoe/Fake-SpeedTest-Generator">About</a></li>
    </ul>

<?php
$chip= curl_init("http://api.ipify.org/");
curl_setopt($chip,CURLOPT_RETURNTRANSFER,TRUE);
$curlip = curl_exec($chip);
$serveraddr = $_SERVER['SERVER_ADDR'];
$userip = $_SERVER['REMOTE_ADDR'];
echo "ServiceIP: $curlip | $serveraddr <br> UserIP: $userip ";

if(!isset($_POST['sub'])){
  echo "
  <h1>Generate real Ookla Speedtest results.</h1>
  <form action='' method='POST'>
  ServerID : <input type='number' placeholder='server id' name='server' value='1536'></input> <br>
  ISP_IP : <input type='text' placeholder='isp ip' name='isp_ip' value=$userip ></input> <br>
  Cookie : <input type='text' placeholder='cookie' name='cookie' value='stnetsid=6iuqtmcjobubo5lq67n0e2v60p'></input> <br>
  User-Agent : <input type='text' placeholder='user-agent' name='user-agent' id='user-agent'></input> <br>
  <input type='number' placeholder='Ping in ms' name='ping' value='19' ></input> ms<br> 
  <input type='number' placeholder='Download speed in mbps' name='down'value='499' step='0.01' ></input> mbps<br>
  <input type='number' placeholder='Upload speed in mbps' name='up' value='199' step='0.01' ></input> mbps<br>
  <button type='submit' value='Submit' name='sub' style='width: 175px;'>Submit</button> </form>
  <script>document.getElementById('user-agent').value=navigator.userAgent</script>
  ";
  die();
}
$down = $_POST['down'] * 1000;  
$up = $_POST['up'] * 1000; 
$ping = $_POST['ping'];
$server = $_POST['server'];
$accuracy = 8;
$hash = md5("$ping-$up-$down-297aae72");
$isp_ip = $_POST['isp_ip'];
$cookie = $_POST['cookie'];
$user_agent = $_POST['user-agent'];
$headers = Array(
      'POST /api/api.php HTTP/1.1',
      'Host: www.speedtest.net',
      'Origin: http://www.speedtest.net',
      'Referer: http://c.speedtest.net/flash/speedtest.swf',
      //"X-FORWARDED-FOR: $isp_ip",
      "CLIENT-IP: $isp_ip",
      "Cookie: $cookie",
      "User-Agent: $user_agent",
      'Content-Type: application/x-www-form-urlencoded',
      'Connection: Close'
    );

$post = "startmode=recommendedselect&promo=&accuracy=$accuracy&testmethod=http&recommendedserverid=$server&serverid=$server&upload=$up&ping=$ping&hash=$hash&download=$down";
//$post = urlencode($post);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.speedtest.net/api/api.php');
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
    $data = curl_exec($ch);
    foreach (explode('&', $data) as $chunk) {
      $param = explode("=", $chunk);
      if (urldecode($param[0])== "resultid"){
      print '<h1>Result generated</h1>
      <h3>DOWN: ' . $_POST['down'] . 'mbps, UP: ' . $_POST['up'] . 'mbps, PING: ' . $ping . '</h3>
      <a href="https://www.speedtest.net/result/'.urldecode($param[1]) . '" target="_BLANK">' . 'https://www.speedtest.net/result/'.urldecode($param[1]) . '</a> (Opens in new tab) <br>
      <a href="https://www.speedtest.net/result/'.urldecode($param[1]) . '.png" target="_BLANK">' . 'https://www.speedtest.net/result/'.urldecode($param[1]) . '.png</a> (Image Opens in new tab) <br>
      <img src="//www.speedtest.net/result/'.urldecode($param[1]) . '.png"><br><br>
      
      A script by <a href="https://github.com/jtay" target=_blank>Jaydon Taylor</a> and Modified and Customised by <a href="https://post4vps.com/user-1044.html">Amresh</a><br>
      <a href="" onclick="window.location.reload()">Click here to try another one!</a>
      ';
      }
    }
?>

    <br><br>
    <script type="text/javascript" src="//rf.revolvermaps.com/0/0/1.js?i=5bn2va120zp&amp;m=7&amp;s=320&amp;c=e63100"
        async="async"></script>

    <script>
    // Set the number of snowflakes (more than 30 - 40 not recommended)
    var snowmax = 35

    // Set the colors for the snow. Add as many colors as you like
    var snowcolor = new Array("#aaaacc", "#ddddFF", "#ccccDD")

    // Set the fonts, that create the snowflakes. Add as many fonts as you like
    var snowtype = new Array("Arial Black", "Arial Narrow", "Times", "Comic Sans MS")

    // Set the letter that creates your snowflake (recommended:*)
    var snowletter = "*"

    // Set the speed of sinking (recommended values range from 0.3 to 2)
    var sinkspeed = 0.6

    // Set the maximal-size of your snowflaxes
    var snowmaxsize = 22

    // Set the minimal-size of your snowflaxes
    var snowminsize = 8

    // Set the snowing-zone
    // Set 1 for all-over-snowing, set 2 for left-side-snowing 
    // Set 3 for center-snowing, set 4 for right-side-snowing
    var snowingzone = 3

    ///////////////////////////////////////////////////////////////////////////
    // CONFIGURATION ENDS HERE
    ///////////////////////////////////////////////////////////////////////////


    // Do not edit below this line
    var snow = new Array()
    var marginbottom
    var marginright
    var timer
    var i_snow = 0
    var x_mv = new Array();
    var crds = new Array();
    var lftrght = new Array();
    var browserinfos = navigator.userAgent
    var ie5 = document.all && document.getElementById && !browserinfos.match(/Opera/)
    var ns6 = document.getElementById && !document.all
    var opera = browserinfos.match(/Opera/)
    var browserok = ie5 || ns6 || opera

    function randommaker(range) {
        rand = Math.floor(range * Math.random())
        return rand
    }

    function initsnow() {
        if (ie5 || opera) {
            marginbottom = document.body.clientHeight
            marginright = document.body.clientWidth
        } else if (ns6) {
            marginbottom = window.innerHeight
            marginright = window.innerWidth
        }
        var snowsizerange = snowmaxsize - snowminsize
        for (i = 0; i <= snowmax; i++) {
            crds[i] = 0;
            lftrght[i] = Math.random() * 15;
            x_mv[i] = 0.03 + Math.random() / 10;
            snow[i] = document.getElementById("s" + i)
            snow[i].style.fontFamily = snowtype[randommaker(snowtype.length)]
            snow[i].size = randommaker(snowsizerange) + snowminsize
            snow[i].style.fontSize = snow[i].size
            snow[i].style.color = snowcolor[randommaker(snowcolor.length)]
            snow[i].sink = sinkspeed * snow[i].size / 5
            if (snowingzone == 1) {
                snow[i].posx = randommaker(marginright - snow[i].size)
            }
            if (snowingzone == 2) {
                snow[i].posx = randommaker(marginright / 2 - snow[i].size)
            }
            if (snowingzone == 3) {
                snow[i].posx = randommaker(marginright / 2 - snow[i].size) + marginright / 4
            }
            if (snowingzone == 4) {
                snow[i].posx = randommaker(marginright / 2 - snow[i].size) + marginright / 2
            }
            snow[i].posy = randommaker(2 * marginbottom - marginbottom - 2 * snow[i].size)
            snow[i].style.left = snow[i].posx
            snow[i].style.top = snow[i].posy
        }
        movesnow()
    }

    function movesnow() {
        for (i = 0; i <= snowmax; i++) {
            crds[i] += x_mv[i];
            snow[i].posy += snow[i].sink
            snow[i].style.left = snow[i].posx + lftrght[i] * Math.sin(crds[i]);
            snow[i].style.top = snow[i].posy

            if (snow[i].posy >= marginbottom - 2 * snow[i].size || parseInt(snow[i].style.left) > (marginright - 3 *
                    lftrght[i])) {
                if (snowingzone == 1) {
                    snow[i].posx = randommaker(marginright - snow[i].size)
                }
                if (snowingzone == 2) {
                    snow[i].posx = randommaker(marginright / 2 - snow[i].size)
                }
                if (snowingzone == 3) {
                    snow[i].posx = randommaker(marginright / 2 - snow[i].size) + marginright / 4
                }
                if (snowingzone == 4) {
                    snow[i].posx = randommaker(marginright / 2 - snow[i].size) + marginright / 2
                }
                snow[i].posy = 0
            }
        }
        var timer = setTimeout("movesnow()", 50)
    }

    for (i = 0; i <= snowmax; i++) {
        document.write("<span id='s" + i + "' style='position:absolute;top:-" + snowmaxsize + "'>" + snowletter +
            "</span>")
    }
    if (browserok) {
        window.onload = initsnow
    }
    </script>


</body>




</HTML>