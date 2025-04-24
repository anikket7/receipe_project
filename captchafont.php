<?php
    session_start();
    header ("Content-type: image/png");
	 
	 
	 $text = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
	 $_SESSION["vercode"] = $text;
	 $font  = 'KGMakesYouStronger.ttf';
	
     $im = ImageCreate(100,30);
     $grey = ImageColorAllocate($im, 230, 230, 230);
     $black = ImageColorAllocate($im, 0, 0, 0);
   
     ImageTTFText($im, 20, 0, 10, 25, $black, $font,$text);
     ImagePng($im);
     ImageDestroy($im); 
?>

