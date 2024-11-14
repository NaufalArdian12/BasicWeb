<?php
function antiInjection($koneksi, $data) {
    // Clean the input by removing special characters and slashes
    $sanitized_data = htmlspecialchars(strip_tags(stripslashes($data)), ENT_QUOTES);

    // Escape the input for safe database interaction
    $filtered_sql = mysqli_real_escape_string($koneksi, $sanitized_data);

    return $filtered_sql;
}
