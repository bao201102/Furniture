<?php
define("HOST", "localhost");
define("DB", "db_furniture");
define("USER", "root");
define("PASSWORD", "");

//Lấy hosing hiện tại

// if (isset($_SERVER['HTTPS']) &&
//     ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
//     isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
//     $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
//   $path = 'https://';
// }
// else {
//   $path = 'http://';
// }

$isSecure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $isSecure = true;
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
    $isSecure = true;
}
$path = $isSecure ? 'https://' : 'http://';

// if (!empty($_SERVER['HTTPS'])) {
//     $path = "https://";
// } else {
//     $path = "http://";
// }

if (strlen(dirname($_SERVER['PHP_SELF'])) > 1) {
    $selfpath = dirname($_SERVER['PHP_SELF']);
} else {
    $selfpath = '';
}
$path .= $_SERVER['HTTP_HOST'] . $selfpath;

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', $path);
define('IMAGE', URLROOT . '/public/img');
define('JSFILE', URLROOT . '/public/js');
define('CSSFILE', URLROOT . '/public/css');