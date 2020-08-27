<?php 
$angka = 2705000;
$diskon1 = 22;
$diskon2 = 2;
$diskon3 = 6;
$diskon4 = 0;

$a = $angka-$angka*$diskon1/100;
$b = $a-$a*$diskon2/100;
$jumSetelahDiskon = $b-$b*$diskon3/100; 


$bb = $angka - $b;
$cc = $angka - $jumSetelahDiskon;

$jumDis1 = $angka - $a;
$jumDis2 = $bb-$jumDis1;
$jumDis3 = $cc - $bb;

echo $a;
echo " ".$jumDis1;
echo "<hr>";
echo $b;
echo " ".$jumDis2;
echo "<hr>";
echo $jumSetelahDiskon;
echo " ".$jumDis3;
echo "<hr>";
?>