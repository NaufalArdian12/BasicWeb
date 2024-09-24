<?php
  $loremIpsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem reprehenderit nobis veritatis commodi fugiat molestias impedit unde ipsum voluptatum, corrupti minus sit excepturi nostrum quisquam? Quos impedit eum nulla optio.";

  // Output the original string wrapped in <p> tags
  echo "<p>{$loremIpsum}</p>";
  
  // Display the length of the string (number of characters)
  echo "Panjang karakter: " . strlen($loremIpsum) . "<br>";
  
  // Display the number of words in the string
  echo "Panjang kata: " . str_word_count($loremIpsum) . "<br>";
  
  // Convert the string to uppercase and display it
  echo "<p>" . strtoupper($loremIpsum) . "</p>";
  
  // Convert the string to lowercase and display it
  echo "<p>" . strtolower($loremIpsum) . "</p>";
  ?>  