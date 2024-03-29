<?php
session_start();
$image = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);

$content = "abcdefghijklmnopqrstuvwxyz123456789";
 
$_SESSION['captcha']="";
for ($i = 0; $i < 4; $i++) {
    $fontsize = 10;
    $fontcolor = imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
    $fontcontent = substr($content, mt_rand(0, strlen($content)), 1);
    $_SESSION['captcha'] .= $fontcontent;
    $x = ($i * 100 / 4) + mt_rand(5, 10);
    $y = mt_rand(5, 10);
    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}

for ($$i = 0; $i < 200; $i++) {
    $pointcolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imagesetpixel($image, mt_rand(1, 99), mt_rand(1, 29), $pointcolor);
}

header('content-type:image/png');

imagepng($image);
 
imagedestroy($image);
?>