  <?php
    $targetdir = "documents/";

    if (!file_exists($targetdir)) {
      mkdir($targetdir,077, true);
    }

    if($_FILES["file"]["name"] [0]) {
      $totalfiles = count($_FILES["file"]["name"]);
      
      for ($i = 0; $i < $totalfiles; $i++) {
        $filename = $_FILES["file"]["name"][$i];
        $targetfile = $targetdir . $filename;

        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetfile)) {
          echo "file $filename uploaded <br>";
        } else {
          echo "file $filename not uploaded <br>";
        }
      }
    } else {
      echo "No file selected";
    }
  ?>