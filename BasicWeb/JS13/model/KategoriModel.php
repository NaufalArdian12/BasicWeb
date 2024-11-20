<?php include('Model.php');

class KategoriModel extends Model
{
  private $db;
  private $table = 'm_kategori';

  public function __construct()
  {
    include_once('../lib/Connection.php');

    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function insertData($data)
  {
    // prepare statement untuk query insert
    $query = $this->db->prepare("insert into {$this->table} (kategori_kode, kategori_nama) values(?,?)");

    // binding parameter ke query, "s" berarti string, "ss" berarti dua string
    $query->bind_param('ss', $data['kategori_kode'], $data['kategori_nama']);

    // eksekusi query untuk menyimpan ke database
    $query->execute();
  }
  public function getData()
  {
    // query untuk mengambil data dari tabel bank_soal
    return $this->db->query("select * from {$this->table}");
  }

  public function getDataById($id)
  {

    // query untuk mengambil data berdasarkan id
    $query = $this->db->prepare("select * from {$this->table} where kategori_id = ?");

    // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
    $query->bind_param('i', $id);

    // eksekusi query
    $query->execute();

    // ambil hasil query
    return $query->get_result()->fetch_assoc();
  }

  public function updateData($id, $data)
  {
    // query untuk update data
    $query = $this->db->prepare("update {$this->table} set kategori_kode = ?, kategori_nama = ? where kategori_id = ?");

    // binding parameter ke query
    $query->bind_param('ssi', $data['kategori_kode'], $data['kategori_nama'], $id);

    // eksekusi query
    $query->execute();
  }

  public function deleteData($id)
  {
    // query untuk delete data
    $query = $this->db->prepare("delete from {$this->table} where kategori_id = ?");

    // binding parameter ke query
    $query->bind_param('i', $id);

    // eksekusi query
    $query->execute();
  }
}
