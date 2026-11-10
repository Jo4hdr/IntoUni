<?php require_once __DIR__.'/config/config.php';
require_login();
$role=$_SESSION['user']['rol'];
if($role==='admin')redirect('/admin/index.php');
if($role==='universidad')redirect('/universidad/panel.php');
redirect('/aspirante/panel.php');
