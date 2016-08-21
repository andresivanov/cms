<?php
include_once "settings.php";
session_start();
$CONNECT = mysqli_connect(HOST, USER, PASS, DB);

/*if ($CONNECT) echo 'OK';
    else echo 'ERROR';*/

if ($_SERVER['REQUEST_URI'] == '/') {
    $Page = 'index';
    $Module = 'index';
}
else {
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path,   ' /'));
    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);

    if (!empty($Module)) {
        $Param = array();
        for ($i = 0; $i < count($URL_Parts); $i++) {
            $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
        }
    }
}

if ($Page == 'index') include ('page/index.php');
else if ($Page == 'registr') include ('page/registr.php');
else if ($Page == 'login') include  ('page/login.php');

function Head ($p1) {
    echo '<html><head><meta charset="utf-8"><title>'.$p1.'</title><meta name="keywords" content=""><meta name="description" content=""><link href="/resource/style.css" rel="stylesheet"></head>';
}

function Menu () {
    echo '<div><a href="/"><div class="Menu">Главная</div></a><a href="/registr"><div class="Menu">Регистрация</div></a><a href="/login"><div class="Menu">Вход</div></a></div>';
}

function Footer () {
    echo '<footer class="footer">Mr.Shift Все права защищены - <a href="http://youtube.com" target="_blank">YouTube</a></footer>';
}
?>