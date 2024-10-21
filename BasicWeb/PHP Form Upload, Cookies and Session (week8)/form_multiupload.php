<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiupload Dokumen</title>
</head>
<body>
  <h2>File Dokumen</h2>
  <form action="proses_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" multiple="multiple" accept=".png, .jpg, .jpeg">
    <input type="submit" name="unggah">
  </form>
</body>
</html>