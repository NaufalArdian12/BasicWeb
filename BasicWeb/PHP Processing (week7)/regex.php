<?php
// $pattern = '/[a-z]/'; //cocokan huruf kecil.
// $text = 'this is a sample text.';
// if (preg_match($pattern, $text)) {
//   echo "Huruf kecil ditemukan!";
// } else {
//   echo "Tidak ada huruf kecil!";
// }

// $pattern = '/[0-9]+/';
// $text = 'there are 123 apples .';
// if (preg_match($pattern, $text, $matches)){
//   echo "cocokan: " . $matches[0];
// } else {
//   echo "Tidak ada yang cocok!";
// }

// $pattern = '/apple/';
// $replacement = 'banana';
// $text = 'I Like apple pie.';
// $new_text = preg_replace($pattern, $replacement, $text);
// echo $new_text;

$pattern = '/go{1,2}d/';
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
  echo "Cocokan: " . $matches[0];
} else {
  echo "Tidak ada yang cocok!";
}