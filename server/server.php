<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow_Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    //proyek
    $id_proyek2 = $data->id_proyek;
    $nama_proyek = $data->nama_proyek;
    $lokasi_proyek = $data->lokasi_proyek;
    $tgl_mulai = $data->tgl_mulai;
    $tgl_selesai = $data->tgl_selesai;
    //item
    $id_item2 = $data->id_item;
    $nama_item = $data->nama_item;
    $harga_item = $data->harga_item;
    $satuan_item = $data->satuan_item;
    $supplier = $data->supplier;
    //pekerja
    $id_pekerja = $data->id_pekerja;
    $nama_pekerja = $data->nama_pekerja;
    $gaji = $data->gaji;
    $tanggal_masuk = $data->tanggal_masuk;
    $id_proyek = $data->id_proyek;
    //pengeluaran
    $id_pengeluaran = $data->id_pengeluaran;
    $deskripsi = $data->deskripsi;
    $jumlah = $data->jumlah;
    $tanggal_pengeluaran = $data->tanggal_pengeluaran;
    $id_proyek1 = $data->id_proyek;
    $id_item = $data->id_item;


    $aksi = $data->aksi;

    if ($aksi == 'tambah_proyek') {
        $data2 = array(
            'nama_proyek' => $nama_proyek,
            'lokasi_proyek' => $lokasi_proyek,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
        );
        $abc->tambah_data_proyek($data2);
    } else if ($aksi == 'ubah_proyek') {
        $data2 = array(
            'id_proyek' => $id_proyek,
            'nama_proyek' => $nama_proyek,
            'lokasi_proyek' => $lokasi_proyek,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
        );
        $abc->ubah_data_proyek($data2);
    } else if ($aksi == 'hapus_proyek') {
        $abc->hapus_data_proyek($id_proyek);
    } else if ($aksi == 'tambah_item') {
        $data2 = array(
            'nama_item' => $nama_item,
            'satuan_item' => $satuan_item,
            'harga_item' => $harga_item,
            'supplier' => $supplier,
        );
        $abc->tambah_data_item($data2);
    } else if ($aksi == 'ubah_item') {
        $data2 = array(
            'id_item' => $id_item,
            'nama_item' => $nama_item,
            'satuan_item' => $satuan_item,
            'harga_item' => $harga_item,
            'supplier' => $supplier,
        );
        $abc->ubah_data_item($data2);
    } else if ($aksi == 'hapus_item') {
        $abc->hapus_data_item($id_item);
    } else if ($aksi == 'tambah_pengeluaran') {
        $data2 = array(
            'deskripsi' => $deskripsi,
            'jumlah' => $jumlah,
            'tanggal_pengeluaran' => $tanggal_pengeluaran,
            'id_proyek' => $id_proyek,
            'id_item' => $id_item,
        );
        $abc->tambah_data_pengeluaran($data2);
    } else if ($aksi == 'ubah_pengeluaran') {
        $data2 = array(
            'id_pengeluaran' => $id_pengeluaran,
            'deskripsi' => $deskripsi,
            'jumlah' => $jumlah,
            'tanggal_pengeluaran' => $tanggal_pengeluaran,
            'id_proyek' => $id_proyek,
            'id_item' => $id_item,
        );
        $abc->ubah_data_pengeluaran($data2);
    } else if ($aksi == 'hapus_pengeluaran') {
        $abc->hapus_data_pengeluaran($id_pengeluaran);
    } else if ($aksi == 'tambah_pekerja') {
        $data2 = array(
            'nama_pekerja' => $nama_pekerja,
            'gaji' => $gaji,
            'tanggal_masuk' => $tanggal_masuk,
            'id_proyek' => $id_proyek,
        );
        $abc->tambah_data_pekerja($data2);
    } else if ($aksi == 'ubah_pekerja') {
        $data2 = array(
            'id_pekerja' => $id_pekerja,
            'nama_pekerja' => $nama_pekerja,
            'gaji' => $gaji,
            'tanggal_masuk' => $tanggal_masuk,
            'id_proyek' => $id_proyek,
        );
        $abc->ubah_data_pekerja($data2);
    } else if ($aksi == 'hapus_pekerja') {
        $abc->hapus_data_pekerja($id_pekerja);
    }
    unset($postdata, $data, $data2, $id_proyek, $nama_proyek, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil-proyek') and (isset($_GET['id_proyek']))) {
        $id_proyek = filter($_GET['id_proyek']);
        $data = $abc->tampil_data_id_proyek($id_proyek);
        echo json_encode($data);
    } else if (($_GET['aksi'] == 'tampil-pekerja') and (isset($_GET['id_pekerja']))) {
        $id_pekerja = filter($_GET['id_pekerja']);
        $data = $abc->tampil_data_id_pekerja($id_pekerja);
        echo json_encode($data);
    } else if (($_GET['aksi'] == 'tampil-item') and (isset($_GET['id_item']))) {
        $id_item = filter($_GET['id_item']);
        $data = $abc->tampil_data_id_item($id_item);
        echo json_encode($data);
    } else if (($_GET['aksi'] == 'tampil-pengeluaran') and (isset($_GET['id_pengeluaran']))) {
        $id_pengeluaran = filter($_GET['id_pengeluaran']);
        $data = $abc->tampil_data_id_pengeluaran($id_pengeluaran);
        echo json_encode($data);
    } elseif ($_GET['aksi'] == 'tampil-pekerja') {
        // $data = $abc->tampil_data_proyek();
        $data = $abc->tampil_data_pekerja();
        echo json_encode($data);
    } elseif ($_GET['aksi'] == 'tampil-proyek') {
        // $data = $abc->tampil_data_proyek();
        $dataproyek = $abc->tampil_data_proyek();
        echo json_encode($dataproyek);
    } elseif ($_GET['aksi'] == 'tampil-item') {
        // $data = $abc->tampil_data_item();
        $dataitem = $abc->tampil_data_item();
        echo json_encode($dataitem);
    } elseif ($_GET['aksi'] == 'tampil-pengeluaran') {
        // $data = $abc->tampil_data_item();
        $datapengeluaran = $abc->tampil_data_pengeluaran();


        echo json_encode($datapengeluaran);
    }
    unset($postdata, $data, $id_proyek, $abc);
}
