<?php
class Database
{
    private $host = "localhost";
    private $dbname = "db_manajemen_proyek";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct()
    { // koneksi database 
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port; dbname=$this->dbname; charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }

    public function tampil_data_proyek()
    {
        $query = $this->conn->prepare("select * from proyek order by id_proyek");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_data_pekerja()
    {
        $query = $this->conn->prepare("select * from vw_pekerja");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_data_item()
    {
        $query = $this->conn->prepare("select * from item order by id_item");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_data_pengeluaran()
    {
        $query = $this->conn->prepare("select * from vw_pengeluaran order by id_pengeluaran");
        $query->execute();
        // mengambil banyak data dengan fetchAll
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tampil_data_id_proyek($id_proyek)
    {
        $query = $this->conn->prepare("select * from proyek where id_proyek=?");
        $query->execute(array($id_proyek));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_proyek, $data);
    }
    public function tampil_data_id_pekerja($id_pekerja)
    {
        $query = $this->conn->prepare("select * from vw_pekerja where id_pekerja=?");
        $query->execute(array($id_pekerja));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_pekerja, $data);
    }
    public function tampil_data_id_item($id_item)
    {
        $query = $this->conn->prepare("select * from item where id_item=?");
        $query->execute(array($id_item));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_item, $data);
    }
    public function tampil_data_id_pengeluaran($id_pengeluaran)
    {
        $query = $this->conn->prepare("select * from vw_pengeluaran where id_pengeluaran=?");
        $query->execute(array($id_pengeluaran));
        // mengambil satu data dengan fetch
        $data = $query->fetch(PDO::FETCH_ASSOC); // mengembalikan data
        return $data;
        // hapus variable dari memory
        $query->closeCursor();
        unset($id_pengeluaran, $data);
    }

    public function tambah_data_proyek($data)
    {
        $query = $this->conn->prepare("insert ignore into proyek (nama_proyek, lokasi_proyek, tgl_mulai, tgl_selesai) values (?,?,?,?)");
        $query->execute(array($data['nama_proyek'], $data['lokasi_proyek'], $data['tgl_mulai'], $data['tgl_selesai']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_data_proyek($data)
    {
        $query = $this->conn->prepare("update proyek set nama_proyek=?,  lokasi_proyek=?, tgl_mulai=?, tgl_selesai=? where id_proyek=?");
        $query->execute(array($data['nama_proyek'], $data['lokasi_proyek'], $data['tgl_mulai'], $data['tgl_selesai'], $data['id_proyek']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data_proyek($id_proyek)
    {
        $query = $this->conn->prepare("delete from proyek where id_proyek=?");
        $query->execute(array($id_proyek));
        $query->closeCursor();
        unset($id_proyek);
    }

    public function tambah_data_item($data)
    {
        $query = $this->conn->prepare("insert ignore into item (nama_item, satuan_item, harga_item, supplier) values (?,?,?,?)");
        $query->execute(array($data['nama_item'], $data['satuan_item'], $data['harga_item'], $data['supplier']));
        $query->closeCursor();
        unset($data);
    }
    public function ubah_data_item($data)
    {
        $query = $this->conn->prepare("update item set nama_item=?,  satuan_item=?, harga_item=?, supplier=? where id_item=?");
        $query->execute(array($data['nama_item'], $data['satuan_item'], $data['harga_item'], $data['supplier'], $data['id_item']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data_item($id_item)
    {
        $query = $this->conn->prepare("delete from item where id_item=?");
        $query->execute(array($id_item));
        $query->closeCursor();
        unset($id_item);
    }
    public function tambah_data_pekerja($data)
    {
        $query = $this->conn->prepare("insert ignore into pekerja (nama_pekerja, gaji, tanggal_masuk, id_proyek) values (?,?,?,?)");
        $query->execute(array($data['nama_pekerja'], $data['gaji'], $data['tanggal_masuk'], $data['id_proyek']));
        $query->closeCursor();
        unset($data);
    }
    public function ubah_data_pekerja($data)
    {
        $query = $this->conn->prepare("update pekerja set nama_pekerja=?,  gaji=?, tanggal_masuk=?, id_proyek=? where id_pekerja=?");
        $query->execute(array($data['nama_pekerja'], $data['gaji'], $data['tanggal_masuk'], $data['id_proyek'], $data['id_pekerja']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data_pekerja($id_pekerja)
    {
        $query = $this->conn->prepare("delete from pekerja where id_pekerja=?");
        $query->execute(array($id_pekerja));
        $query->closeCursor();
        unset($id_pekerja);
    }
    public function tambah_data_pengeluaran($data)
    {
        $query = $this->conn->prepare("insert ignore into pengeluaran (deskripsi, jumlah, tanggal_pengeluaran, id_proyek,id_item) values (?,?,?,?,?)");
        $query->execute(array($data['deskripsi'], $data['jumlah'], $data['tanggal_pengeluaran'], $data['id_proyek'], $data['id_item']));
        $query->closeCursor();
        unset($data);
    }
    public function ubah_data_pengeluaran($data)
    {
        $query = $this->conn->prepare("update pengeluaran set deskripsi=?,  jumlah=?, tanggal_pengeluaran=?, id_proyek=?, id_item=? where id_pengeluaran=?");
        $query->execute(array($data['deskripsi'], $data['jumlah'], $data['tanggal_pengeluaran'], $data['id_proyek'], $data['id_item'], $data['id_pengeluaran']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_data_pengeluaran($id_pengeluaran)
    {
        $query = $this->conn->prepare("delete from pengeluaran where id_pengeluaran=?");
        $query->execute(array($id_pengeluaran));
        $query->closeCursor();
        unset($id_pengeluaran);
    }
}
