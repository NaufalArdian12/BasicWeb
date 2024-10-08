<?php
$myArray = array(); //Arraynya Kosong
if (empty($myArray)) {
  echo"Array tidak terdefinisi atau kosong. <br>";
} else {
  echo"Array terdefinisi dan tidak kosong.<br>";
}

if (empty($nonExistentVar)) {
  echo "Variabel tidak terdefinisi atau kosong.<br>";
} else {
  echo "Variabel terdefinisi dan tidak kosong.<br>";
}