<?php
function set_flashdata($key = "", $value = "")
{
    if (!empty($key) && !empty($value)) {
        $_SESSION['_flashdata'][$key] = $value;
        return true;
    }
    return false;
}

function get_flashdata($key = "")
{
    if (!empty($key) && isset($_SESSION['_flashdata'][$key])) {
        $data = $_SESSION['_flashdata'][$key];
        unset($_SESSION['_flashdata'][$key]);
        return $data;
    } else {
        echo "<script> alert('Flash Message \"{$key}\" is not defined.');</script>";
    }
}

function pesan($key = "", $pesan = "")
{
    $alertTemplate = "<div class='alert alert-%s alert-dismissible fade show' role='alert'>
                        <strong>%s</strong> %s
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";

    if ($key == "info") {
        set_flashdata('info', sprintf($alertTemplate, 'primary', 'Info!', $pesan));
    } elseif ($key == "success") {
        set_flashdata('success', sprintf($alertTemplate, 'success', 'Berhasil!', $pesan));
    } elseif ($key == "danger") {
        set_flashdata('danger', sprintf($alertTemplate, 'danger', 'Gagal!', $pesan));
    } elseif ($key == "warning") {
        set_flashdata('warning', sprintf($alertTemplate, 'warning', 'Peringatan!', $pesan));
    }
}
