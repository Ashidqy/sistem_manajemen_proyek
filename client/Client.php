<?php
error_reporting(1);
class Client
{
    private $url;

    // function yan pertama kali di load saat class dipanggil 
    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }





    // Function Item
    public function tampil_semua_data_item()
    {
        $client = curl_init($this->url . '?aksi=tampil-item');
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }

    public function tampil_data_id_item($id_item)
    {
        $id_item = $this->filter($id_item);
        $client = curl_init($this->url . "?aksi=tampil-item&id_item=" . $id_item);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_item, $client, $response, $data);
    }

    public function tambah_data_item($data)
    {
        $data = '{  "nama_item":"' . $data['nama_item'] . '",
                    "satuan_item":"' . $data['satuan_item'] . '",
                    "harga_item":"' . $data['harga_item'] . '",
                    "supplier":"' . $data['supplier'] . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data_item($data)
    {
        $data = '{  "id_item":"' . $data['id_item'] . '",
                    "nama_item":"' . $data['nama_item'] . '",
                    "satuan_item":"' . $data['satuan_item'] . '",
                    "harga_item":"' . $data['harga_item'] . '",
                    "supplier":"' . $data['supplier'] . '",
                    "aksi":"' . $data['aksi'] . '"
                 }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_data_item($data)
    {
        $id_item = $this->filter($data['id_item']);
        $data = '{  "id_item":"' . $id_item . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_item, $data, $c, $response);
    }

    // Function Proyek
    public function tampil_semua_data()
    {
        $client = curl_init($this->url . '?aksi=tampil-proyek');
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }
    public function tampil_data_id_proyek($id_proyek)
    {
        $id_proyek = $this->filter($id_proyek);
        $client = curl_init($this->url . "?aksi=tampil-proyek&id_proyek=" . $id_proyek);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_proyek, $client, $response, $data);
    }

    public function tambah_data_proyek($data)
    {
        $data = '{  "nama_proyek":"' . $data['nama_proyek'] . '",
                    "lokasi_proyek":"' . $data['lokasi_proyek'] . '",
                    "tgl_mulai":"' . $data['tgl_mulai'] . '",
                    "tgl_selesai":"' . $data['tgl_selesai'] . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data_proyek($data)
    {
        $data = '{  "id_proyek":"' . $data['id_proyek'] . '",
                    "nama_proyek":"' . $data['nama_proyek'] . '",
                    "lokasi_proyek":"' . $data['lokasi_proyek'] . '",
                    "tgl_mulai":"' . $data['tgl_mulai'] . '",
                    "tgl_selesai":"' . $data['tgl_selesai'] . '",
                    "aksi":"' . $data['aksi'] . '"
                 }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_data_proyek($data)
    {
        $id_proyek = $this->filter($data['id_proyek']);
        $data = '{  "id_proyek":"' . $id_proyek . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_item, $data, $c, $response);
    }




    // Function Pekerja
    public function tampil_semua_data_pekerja()
    {
        $client = curl_init($this->url . '?aksi=tampil-pekerja');
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }
    public function tampil_data_id_pekerja($id_pekerja)
    {
        $id_pekerja = $this->filter($id_pekerja);
        $client = curl_init($this->url . "?aksi=tampil-pekerja&id_pekerja=" . $id_pekerja);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_pekerja, $client, $response, $data);
    }

    public function tambah_data_pekerja($data)
    {
        $data = '{  "nama_pekerja":"' . $data['nama_pekerja'] . '",
                    "gaji":"' . $data['gaji'] . '",
                    "tanggal_masuk":"' . $data['tanggal_masuk'] . '",
                    "id_proyek":"' . $data['id_proyek'] . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data_pekerja($data)
    {
        $data = '{  "id_pekerja":"' . $data['id_pekerja'] . '",
                    "nama_pekerja":"' . $data['nama_pekerja'] . '",
                    "gaji":"' . $data['gaji'] . '",
                    "tanggal_masuk":"' . $data['tanggal_masuk'] . '",
                    "id_proyek":"' . $data['id_proyek'] . '",
                    "aksi":"' . $data['aksi'] . '"
                 }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_data_pekerja($data)
    {
        $id_pekerja = $this->filter($data['id_pekerja']);
        $data = '{  "id_pekerja":"' . $id_pekerja . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_item, $data, $c, $response);
    }

    // Function Pengeluaran
    public function tampil_semua_data_pengeluaran()
    {
        $client = curl_init($this->url . '?aksi=tampil-pengeluaran');
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data 
        return $data;
        // menghapus variabel dari memory 
        unset($data, $client, $response);
    }
    public function tampil_data_id_pengeluaran($id_pengeluaran)
    {
        $id_pengeluaran = $this->filter($id_pengeluaran);
        $client = curl_init($this->url . "?aksi=tampil-pengeluaran&id_pengeluaran=" . $id_pengeluaran);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        unset($id_pekerja, $client, $response, $data);
    }

    public function tambah_data_pengeluaran($data)
    {
        $data = '{  "deskripsi":"' . $data['deskripsi'] . '",
                    "jumlah":"' . $data['jumlah'] . '",
                    "tanggal_pengeluaran":"' . $data['tanggal_pengeluaran'] . '",
                    "id_proyek":"' . $data['id_proyek'] . '",
                    "id_item":"' . $data['id_item'] . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data_pengeluaran($data)
    {
        $data = '{  "id_pengeluaran":"' . $data['id_pengeluaran'] . '",
                    "deskripsi":"' . $data['deskripsi'] . '",
                    "jumlah":"' . $data['jumlah'] . '",
                    "tanggal_pengeluaran":"' . $data['tanggal_pengeluaran'] . '",
                    "id_proyek":"' . $data['id_proyek'] . '",
                    "id_item":"' . $data['id_item'] . '",
                    "aksi":"' . $data['aksi'] . '"
                 }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_data_pengeluaran($data)
    {
        $id_pengeluaran = $this->filter($data['id_pengeluaran']);
        $data = '{  "id_pengeluaran":"' . $id_pengeluaran . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_item, $data, $c, $response);
    }


    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }
}

$url = 'http://localhost/SI/server/server.php';
// buat objek baru dari class client
$abc = new Client($url);
