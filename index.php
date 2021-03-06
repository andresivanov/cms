<?php
include_once "settings.php";
session_start();
$CONNECT = mysqli_connect(HOST, USER, PASS, DB);

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

function MessageSend($p1, $p2) {
    if ($p1 == 1) $p1 = 'Ошибка';
    else if ($p1 == 2) $p1 = 'Подсказка';
    else if ($p1 == 3) $p1 = 'Информация';
    $_SESSION['message'] = '<div class="MessageBlock"><b>'.$p1.'</b>: '.$p2.'</div>';
    exit (header('Location: '.$_SERVER['HTTP_REFERER'].''));
}

function MessageShow() {
    if ($_SESSION['message']) $Message = $_SESSION['message'];
    echo $Message;
    $_SESSION['message'] = array();
}

if ($Page == 'index') include ('page/index.php');
    else if ($Page == 'login') include  ('page/login.php');
    else if ($Page == 'register') include ('page/register.php');
    else if ($Page == 'account') include ('form/account.php');

function FormChars ($p1) {
    return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}

function GenPass ($p1, $p2) {
    return md5('MRSHIFT'.md5('321'.$p1.'123').md5('678'.$p2.'890'));
}

function Head($p1) {
    echo '<!DOCTYPE html><html><head><meta charset="utf-8" /><title>'.$p1.'</title><meta name="keywords" content="" /><meta name="description" content="" /><link href="resource/style.css" rel="stylesheet"></head>';
}

function Menu () {
    echo '<div class="MenuHead"><a href="/"><div class="Menu">Главная</div></a><a href="/register"><div class="Menu">Регистрация</div></a><a href="/login"><div class="Menu">Вход</div></a></div>';
}

function Footer () {
    echo '<footer class="footer">Mr.Shift - <a href="http://sioce.ml">SIOCE.ml</a></footer>';
}
?>