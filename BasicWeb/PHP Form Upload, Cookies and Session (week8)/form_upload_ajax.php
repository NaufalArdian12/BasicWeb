<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah File Dokumen</title>
</head>
<body>
    <main>
        <h1>Unggah File Dokumen</h1>
        <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
            <label for="file">Pilih file:</label>
            <input type="file" name="file" id="file" accept=".jpeg, .jpg, .png" required>
            <button type="submit" name="submit">Unggah</button>
        </form>
        <div id="status" aria-live="polite"></div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload.js"></script>
</body>
</html>