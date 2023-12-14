<?php
include "Client.php";

//Item
if ($_POST['aksi'] == 'tambah_item') {
    $data = array(
        "nama_item" => $_POST['nama_item'],
        "satuan_item" => $_POST['satuan_item'],
        "harga_item" => $_POST['harga_item'],
        "supplier" => $_POST['supplier'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_data_item($data);
    header('location:index.php?menu=item');
} else if ($_POST['aksi'] == 'ubah_item') {
    $data = array(
        "id_item" => $_POST['id_item'],
        "nama_item" => $_POST['nama_item'],
        "satuan_item" => $_POST['satuan_item'],
        "harga_item" => $_POST['harga_item'],
        "supplier" => $_POST['supplier'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_item($data);
    header('location:index.php?menu=item');
} else if ($_POST['aksi'] == 'hapus_item') {
    $data = array(
        "id_item" => $_POST['id_item'],
        "aksi" => $_POST['aksi']
    );
    $abc->hapus_data_item($data);
    header('location:index.php?menu=item');
}

//Pegawai
else if ($_POST['aksi'] == 'tambah_pekerja') {
    $data = array(
        "nama_pekerja" => $_POST['nama_pekerja'],
        "gaji" => $_POST['gaji'],
        "tanggal_masuk" => $_POST['tanggal_masuk'],
        "id_proyek" => $_POST['id_proyek'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_data_pekerja($data);
    header('location:index.php?menu=pegawai');
} else if ($_POST['aksi'] == 'ubah_pekerja') {
    $data = array(
        "id_pekerja" => $_POST['id_pekerja'],
        "nama_pekerja" => $_POST['nama_pekerja'],
        "gaji" => $_POST['gaji'],
        "tanggal_masuk" => $_POST['tanggal_masuk'],
        "id_proyek" => $_POST['id_proyek'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_pekerja($data);
    header('location:index.php?menu=pegawai');
} else if ($_POST['aksi'] == 'hapus_pekerja') {
    $data = array(
        "id_pekerja" => $_POST['id_pekerja'],
        "aksi" => $_POST['aksi']
    );
    $abc->hapus_data_pekerja($data);
    header('location:index.php?menu=pegawai');
}

// Proyek
else if ($_POST['aksi'] == 'tambah_proyek') {
    $data = array(
        "nama_proyek" => $_POST['nama_proyek'],
        "lokasi_proyek" => $_POST['lokasi_proyek'],
        "tgl_mulai" => $_POST['tgl_mulai'],
        "tgl_selesai" => $_POST['tgl_selesai'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_data_proyek($data);
    header('location:index.php?menu=proyek');
} else if ($_POST['aksi'] == 'ubah_proyek') {
    $data = array(
        "id_proyek" => $_POST['id_proyek'],
        "nama_proyek" => $_POST['nama_proyek'],
        "lokasi_proyek" => $_POST['lokasi_proyek'],
        "tgl_mulai" => $_POST['tgl_mulai'],
        "tgl_selesai" => $_POST['tgl_selesai'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_proyek($data);
    header('location:index.php?menu=proyek');
} else if ($_POST['aksi'] == 'hapus_proyek') {
    $data = array(
        "id_proyek" => $_POST['id_proyek'],
        "aksi" => $_POST['aksi']
    );
    $abc->hapus_data_proyek($data);
    header('location:index.php?menu=proyek');
}

// Pengeluaran
else if ($_POST['aksi'] == 'tambah_pengeluaran') {
    $data = array(
        "deskripsi" => $_POST['deskripsi'],
        "jumlah" => $_POST['jumlah'],
        "tanggal_pengeluaran" => $_POST['tanggal_pengeluaran'],
        "id_proyek" => $_POST['id_proyek'],
        "id_item" => $_POST['id_item'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_data_pengeluaran($data);
    header('location:index.php?menu=pengeluaran');
} else if ($_POST['aksi'] == 'ubah_pengeluaran') {
    $data = array(
        "id_pengeluaran" => $_POST['id_pengeluaran'],
        "deskripsi" => $_POST['deskripsi'],
        "jumlah" => $_POST['jumlah'],
        "tanggal_pengeluaran" => $_POST['tanggal_pengeluaran'],
        "id_proyek" => $_POST['id_proyek'],
        "id_item" => $_POST['id_item'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_pengeluaran($data);
    header('location:index.php?menu=pengeluaran');
} else if ($_POST['aksi'] == 'hapus_pengeluaran') {
    $data = array(
        "id_pengeluaran" => $_POST['id_pengeluaran'],
        "aksi" => $_POST['aksi']
    );
    $abc->hapus_data_pengeluaran($data);
    header('location:index.php?menu=pengeluaran');
}


unset($abc, $data);
