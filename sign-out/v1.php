<?php
// unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
foreach($cookies as $cookie) {
$parts = explode('=', $cookie);
$name = trim($parts[0]);
setcookie($name, '', - 24 * 60 * 60);
setcookie($name, '', - 24 * 60 * 60, '/');
setcookie($name, '', - 24 * 60 * 60, '/', '.rovive.pro');
}
}
setcookie("access", "yes", time() + 24 * 60 * 60, "/", '.rovive.pro');
header("Location: https://www.rovive.pro");
exit();
?>