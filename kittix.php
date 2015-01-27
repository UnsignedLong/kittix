#!/usr/bin/php
<?php

//Size of source Image
$source_width = 250;
$source_height = 250;

//Meme target size
$width = 400;
$height = 400;

//obvious...
$fontSize = 17;
$font_path = '/absolute/path/to/meme.ttf';
$image = imagecreatefromjpeg('/absolute/path/to/meme.jpg');


$jpg_image = imagecreatetruecolor($width, $height);
imagecopyresampled($jpg_image, $image, 0, 0, 0, 0, $width, $height, $source_width, $source_height);

function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
 
    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
 
   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}

function doText($jpg_image,$y,$text) {
  global $fontSize, $font_path;
  $white = imagecolorallocate($jpg_image, 255, 255, 255);
  $black = imagecolorallocate($jpg_image, 0, 0, 0);
  $image_width = imagesx($jpg_image);  
  $image_height = imagesy($jpg_image);

  $text_box = imagettfbbox($fontSize,0,$font_path,$text);

  $text_width = $text_box[2]-$text_box[0];
  $text_height = $text_box[3]-$text_box[1];

  $x = ($image_width/2) - ($text_width/2);

  imagettfstroketext($jpg_image, $fontSize, 0, $x, $y, $white, $black, $font_path, $text, 1);

}

  doText($jpg_image,30,strtoupper("OH NOES on ".$argv[2]."!!!!"));
  doText($jpg_image,370,strtoupper($argv[3]));

  imagepng($jpg_image,$argv[1]);
  imagedestroy($jpg_image);
?>
