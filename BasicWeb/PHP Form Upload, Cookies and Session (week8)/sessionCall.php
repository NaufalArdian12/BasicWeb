<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
    ?>
</body>
</html>
