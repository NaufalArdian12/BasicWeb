<?php
require_once 'database.php';

class crud
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  // Create
  public function create($jabatan, $keterangan)
  {
    $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";
    $result = $this->db->conn->query($query);

    return $result;
  }

  // Read 
  public function read()
  {
    $query = "SELECT * FROM jabatan";
    $result = $this->db->conn->query($query);

    $data = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;
  }

  //read by id

  public function readById($id)
  {
    $query = "SELECT * FROM jabatan WHERE id = '$id'";
    $result = $this->db->conn->query($query);
    if ($result->num_rows == 1) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

  // Update
  public function update($id, $jabatan, $keterangan)
  {
    $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";
    $result = $this->db->conn->query($query);

    return $result;
  }

  // Delete
  public function delete($id)
  {
    $query = "DELETE FROM jabatan WHERE id = '$id'";
    $result = $this->db->conn->query($query);

    return $result;
  }
}
