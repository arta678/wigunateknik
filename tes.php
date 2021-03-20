<?php 
include_once 'config/config.php';

$number = 1;
if ($number<1) {
    echo number_format($number,1,",",",");
}else{
    echo number_format($number);
}

 ?>