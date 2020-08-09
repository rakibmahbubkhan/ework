<?php
// include 'connect.php';
// $temp = 'includes/templates/';
// $css = 'layout/css/';
// $js =  'layout/js/';
// $lang ='includes/languages/';
// 


// include $lang.'english.php';
// include $temp.'header.php';
// $temp.'navbar.php';

// if (!isset($noNavbar)) {
// 	include $temp.'navbar.php';
// }


include 'connect.php';
$temp = 'template/';
$css = 'layout/css/';
$js = 'layout/js/';
$img = 'layout/image/';
$func = 'functions/';

include $temp.'header.php';
include $temp.'navbar.php';
include $func.'function.php';

?> 