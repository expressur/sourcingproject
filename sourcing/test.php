<?php
$file = "a
b
c
d";
$remplace = array("\r\n", "\n", "\r");
$out = str_replace($remplace,"<br><br> ", $file);
echo $out;


