<!DOCTYPE html>
<html lang="en">
<?php
include 'Client.php';
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'default';

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Manajemen Proyek Konstruksi
    </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SISTER 2023</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?menu=item">
                    <i class="fas fa-fw fa-cloud-download-alt"></i>
                    <span>Data Bahan Baku</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Database
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=proyek">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Proyek</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=pegawai">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Keuangan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?menu=pengeluaran">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Pengeluaran</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Anggota Kelompok SISTER</span>
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Moch Hasbi Ashidqy</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Firda Arinda Eka Putri</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if ($menu == 'item') {
                    ?>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Data Item</h1>
                        <p class="mb-4">
                            Tabel Data bahan baku proyek adalah kumpulan informasi yang merinci semua komponen dasar yang digunakan dalam pelaksanaan suatu proyek. Data ini mencakup berbagai jenis material, sumber daya alam, atau barang mentah yang diperlukan untuk memulai, melanjutkan, dan menyelesaikan proyek.</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Item</h6>
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah"><span class="fa-solid fa-plus"></span> Tambah Item</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Bahan Baku</th>
                                                <th>Satuan Bahan Baku</th>
                                                <th>Harga Bahan Baku</th>
                                                <th>Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Bahan Baku</th>
                                                <th>Satuan Bahan Baku</th>
                                                <th>Harga Bahan Baku</th>
                                                <th>Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $data_array = $abc->tampil_semua_data_item();
                                            foreach ($data_array as $r) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>
                                                        <?= $r->nama_item ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->satuan_item ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->harga_item ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->supplier ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">
                                                            <span class="fa-solid fa-recycle"></span> Ubah
                                                        </a>
                                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><span class="fa-solid fa-trash"></span> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $r2 = $abc->tampil_data_id_item($r->id_item);
                                                ?>
                                                <!-- Awal Modal Ubah-->
                                                <div class=" modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Bahan Baku</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form form action="proses.php" method="post">
                                                                <input type="hidden" name="id_item" value="<?= $r2->id_item ?>" />
                                                                <input type="hidden" name="aksi" value="ubah_item" />
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-3">
                                                                        <label for="itm">Nama Bahan Baku</label>
                                                                        <input type="text" class="form-control" id="itm" value="<?= $r2->nama_item ?>" name="nama_item">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="lokasi">Satuan Bahan Baku</label>
                                                                        <input type="text" class="form-control" id="lokasi" value="<?= $r2->satuan_item ?>" name="satuan_item">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="ht">Harga Bahan Baku</label>
                                                                        <input type="text" class="form-control" id="dt2" value="<?= $r2->harga_item ?>" name="harga_item">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="sp">Supplier Bahan Baku</label>
                                                                        <input type="text" class="form-control" id="sp" value="<?= $r2->supplier ?>" name="supplier">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="btnubah_item">Ubah</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Ubah -->

                                                <!-- Awal Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Bahan Baku</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses.php" method="post">
                                                                <input type="hidden" name="id_item" value="<?= $r2->id_item ?>">
                                                                <input type="hidden" name="aksi" value="hapus_item" />
                                                                <div class="modal-body">
                                                                    <h5 class="text-center">Apakah Anda yakin menghapus Bahan Baku ini?</h5>
                                                                    <span class="text-danger"><?= $r2->nama_item ?></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="bhapus_item">Ya, Hapus saja</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $no++;
                                            }

                                            unset($data_array, $r, $no);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Awal Modal -->
                        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Bahan Baku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="proses.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="aksi" value="tambah_item" />
                                            <div class="form-group mb-3">
                                                <label for="itm">Nama Bahan Baku</label>
                                                <input type="text" class="form-control" id="itm" placeholder="Nama Item" name="nama_item">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lokasi">Satuan Bahan Baku</label>
                                                <input type="text" class="form-control" id="lokasi" placeholder="Jenis" name="satuan_item">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="ht">Harga Bahan Baku</label>
                                                <input type="text" class="form-control" id="dt2" placeholder="Rp" name="harga_item">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="sp">Supplier </label>
                                                <input type="text" class="form-control" id="sp" placeholder="Nama Supplier" name="supplier">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bsimpan_item">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->
                    <?php
                    } elseif ($menu == 'pegawai') { ?>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Pekerja</h1>
                        <p class="mb-4">Tabel Pekerja adalah komponen kunci dalam Sistem Manajemen Proyek Konstruksi ini,
                            menyediakan basis data yang lengkap untuk mengelola informasi terkait tim pekerja yang terlibat
                            dalam pelaksanaan proyek konstruksi. Tabel ini mencakup detail-detail yang diperlukan untuk memahami
                            dan mengelola sumber daya manusia dalam konteks proyek.</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah"><span class="fa-solid fa-plus"></span> Tambah Data Pegawai</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pekerja</th>
                                                <th>Gaji</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Nama Proyek</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pekerja</th>
                                                <th>Gaji</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Nama Proyek</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $data_array = $abc->tampil_semua_data_pekerja();
                                            foreach ($data_array as $r) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>
                                                        <?= $r->nama_pekerja ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->gaji ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->tanggal_masuk ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->nama_proyek ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">
                                                            <span class="fa-solid fa-recycle"></span> Ubah
                                                        </a>
                                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><span class="fa-solid fa-trash"></span> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $r2 = $abc->tampil_data_id_pekerja($r->id_pekerja);
                                                ?>
                                                <!-- Awal Modal Ubah-->
                                                <div class=" modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Pekerja</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form form action="proses.php" method="post" novalidate>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_pekerja" value="<?= $r2->id_pekerja ?>" />
                                                                    <input type="hidden" name="aksi" value="ubah_pekerja" />
                                                                    <div class="form-group mb-3">
                                                                        <label for="itm">Nama Pekerja</label>
                                                                        <input type="text" class="form-control" id="itm1" value="<?= $r2->nama_pekerja ?>" name="nama_pekerja">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="lokasi">Gaji</label>
                                                                        <input type="text" class="form-control" id="lokasi1" value="<?= $r2->gaji ?>" name="gaji">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="ht">Tanggal Mulai Bekerja</label>
                                                                        <input type="date" class="form-control" id="dt21" value="<?= $r2->tanggal_masuk ?>" name="tanggal_masuk">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="sp">Nama Proyek</label>
                                                                        <select class="form-control" id="proyek1" name="id_proyek">
                                                                            <?php
                                                                            $dataku = $abc->tampil_semua_data();
                                                                            foreach ($dataku as $r) { ?>
                                                                                <option value="<?= $r->id_proyek ?>"><?= $r->nama_proyek ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="btnubah_pekerja">Ubah</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Ubah -->

                                                <!-- Awal Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Proyek</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses.php" method="post">
                                                                <input type="hidden" name="id_pekerja" value="<?= $r2->id_pekerja ?>">
                                                                <input type="hidden" name="aksi" value="hapus_pekerja" />
                                                                <div class="modal-body">
                                                                    <h5 class="text-center">Apakah Anda yakin menghapus Pegawai ini?</h5>
                                                                    <span class="text-danger"><?= $r2->nama_pekerja ?></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="bhapus_pekerja">Ya, Hapus saja</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $no++;
                                            }
                                            unset($data_array, $r, $no);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Awal Modal -->
                        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Pekerja</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="proses.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="aksi" value="tambah_pekerja" />
                                            <div class="form-group mb-3">
                                                <label for="desc">Nama Pekerja</label>
                                                <input type="text" class="form-control" id="desc" placeholder="Nama Pekerja" name="nama_pekerja">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lokasi">Gaji</label>
                                                <input type="text" class="form-control" id="lokasi" placeholder="Jumlah Gaji" name="gaji">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="dt3">Tanggal Masuk</label>
                                                <input type="date" class="form-control" id="dt3" placeholder="Mulai Bekerja" name="tanggal_masuk">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="desc">Nama Proyek</label>
                                                <select class="form-control" id="proyek" name="id_proyek">
                                                    <?php
                                                    $dataku = $abc->tampil_semua_data();
                                                    foreach ($dataku as $r) { ?>
                                                        <option value="<?= $r->id_proyek ?>"><?= $r->nama_proyek ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bsimpan_pekerja">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->
                    <?php
                    } elseif ($menu == 'proyek') { ?>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Proyek</h1>
                        <p class="mb-4">Tabel Proyek merupakan elemen inti dalam Sistem Manajemen Proyek Konstruksi ini,
                            menyediakan kerangka kerja yang terstruktur untuk merekam dan melacak informasi esensial terkait
                            setiap proyek konstruksi yang sedang berlangsung. Tabel ini mencakup berbagai atribut yang memberikan
                            wawasan menyeluruh tentang proyek tersebut.</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Proyek</h6>
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah"><span class="fa-solid fa-plus"></span> Tambah Data Proyek</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Proyek</th>
                                                <th>Lokasi Proyek</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Proyek</th>
                                                <th>Lokasi Proyek</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $data_array = $abc->tampil_semua_data();
                                            foreach ($data_array as $r) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>
                                                        <?= $r->nama_proyek ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->lokasi_proyek ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->tgl_mulai ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->tgl_selesai ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">
                                                            <span class="fa-solid fa-recycle"></span> Ubah
                                                        </a>
                                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><span class="fa-solid fa-trash"></span> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $r2 = $abc->tampil_data_id_proyek($r->id_proyek);
                                                ?>
                                                <!-- Awal Modal Ubah-->
                                                <div class=" modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Proyek</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form form action="proses.php" method="post">
                                                                <input type="hidden" name="id_proyek" value="<?= $r2->id_proyek ?>" />
                                                                <input type="hidden" name="aksi" value="ubah_proyek" />
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-3">
                                                                        <label for="itm">Nama Proyek</label>
                                                                        <input type="text" class="form-control" id="itm" value="<?= $r2->nama_proyek ?>" name="nama_proyek">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="lokasi">Lokasi Proyek</label>
                                                                        <input type="text" class="form-control" id="lokasi" value="<?= $r2->lokasi_proyek ?>" name="lokasi_proyek">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="ht">Tanggal Mulai Pengerjaan</label>
                                                                        <input type="date" class="form-control" id="dt2" value="<?= $r2->tgl_mulai ?>" name="tgl_mulai">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="sp">Tanggal Selesai Pengerjaan</label>
                                                                        <input type="date" class="form-control" id="sp" value="<?= $r2->tgl_selesai ?>" name="tgl_selesai">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="btnubah_item">Ubah</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Ubah -->

                                                <!-- Awal Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Proyek</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses.php" method="post">
                                                                <input type="hidden" name="id_proyek" value="<?= $r2->id_proyek ?>">
                                                                <input type="hidden" name="aksi" value="hapus_proyek" />
                                                                <div class="modal-body">
                                                                    <h5 class="text-center">Apakah Anda yakin menghapus Proyek ini?</h5>
                                                                    <span class="text-danger"><?= $r2->nama_proyek ?></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="bhapus_item">Ya, Hapus saja</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $no++;
                                            }
                                            unset($data_array, $r, $no);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Awal Modal -->
                        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Proyek</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="proses.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="aksi" value="tambah_proyek" />
                                            <div class="form-group mb-3">
                                                <label for="desc">Nama Proyek</label>
                                                <input type="text" class="form-control" id="desc" placeholder="Proyek" name="nama_proyek">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lokasi">Lokasi Proyek</label>
                                                <input type="text" class="form-control" id="lokasi" placeholder="Jumlah" name="lokasi_proyek">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="dt2">Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="dt2" placeholder="Mulai Proyek" name="tgl_mulai">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="dt1">Tanggal Selesai</label>
                                                <input type="date" class="form-control" id="dt1" placeholder="Seleai Proyek" name="tgl_selesai">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bsimpan_proyek">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->
                    <?php
                    } elseif ($menu == 'pengeluaran') { ?>
                        <h1 class="h3 mb-2 text-gray-800">Pengeluaran Perusahaan</h1>
                        <p class="mb-4">Tabel Pengeluaran adalah komponen penting dalam Sistem Manajemen Proyek Konstruksi ini,
                            memberikan struktur untuk merekam dan melacak semua aspek pengeluaran yang terkait dengan pelaksanaan
                            proyek konstruksi. Informasi yang terdapat dalam tabel ini memungkinkan tim proyek untuk mengelola
                            anggaran dengan lebih efisien dan membuat keputusan yang terinformasi.</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah"><span class="fa-solid fa-plus"></span> Tambah Data Pengeluaran</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Deskrips</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal Pengeluaran</th>
                                                <th>Nama Proyek</th>
                                                <th>Harga Item</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Deskrips</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal Pengeluaran</th>
                                                <th>Nama Proyek</th>
                                                <th>Harga Item</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $data_array = $abc->tampil_semua_data_pengeluaran();
                                            foreach ($data_array as $r) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>
                                                        <?= $r->deskripsi ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->jumlah ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->tanggal_pengeluaran ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->nama_proyek ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->harga_item ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->total ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">
                                                            <span class="fa-solid fa-recycle"></span> Ubah
                                                        </a>
                                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><span class="fa-solid fa-trash"></span> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $r2 = $abc->tampil_data_id_pengeluaran($r->id_pengeluaran);
                                                ?>
                                                <!-- Awal Modal Ubah-->
                                                <div class=" modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Pengeluaran</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form form action="proses.php" method="post" novalidate>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_pengeluaran" value="<?= $r2->id_pengeluaran ?>" />
                                                                    <input type="hidden" name="aksi" value="ubah_pengeluaran" />
                                                                    <div class="form-group mb-3">
                                                                        <label for="itm">Deskripsi</label>
                                                                        <input type="text" class="form-control" id="itm1" value="<?= $r2->deskripsi ?>" name="deskripsi">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="lokasi">Jumlah</label>
                                                                        <input type="text" class="form-control" id="lokasi1" value="<?= $r2->jumlah ?>" name="jumlah">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="ht">Tanggal Pengeluaran</label>
                                                                        <input type="date" class="form-control" id="dt21" value="<?= $r2->tanggal_pengeluaran ?>" name="tanggal_pengeluaran">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="desc">Nama Proyek</label>
                                                                        <select class="form-control" id="proyek" name="id_proyek" require>
                                                                            <option selected disabled>Pilih Proyek...</option>
                                                                            <?php
                                                                            $dataku = $abc->tampil_semua_data();
                                                                            foreach ($dataku as $r) { ?>

                                                                                <option value="<?= $r->id_proyek ?>"><?= $r->nama_proyek ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="desc">Nama Item</label>
                                                                        <select class="form-control" id="item" name="id_item" require>
                                                                            <option selected disabled>Pilih Item...</option>
                                                                            <?php
                                                                            $dataku = $abc->tampil_semua_data_item();
                                                                            foreach ($dataku as $r) { ?>
                                                                                <option value="<?= $r->id_item ?>"><?= $r->nama_item ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="btnubah_pekerja">Ubah</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Ubah -->

                                                <!-- Awal Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Pengeluaran</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="proses.php" method="post">
                                                                <input type="hidden" name="id_pengeluaran" value="<?= $r2->id_pengeluaran ?>">
                                                                <input type="hidden" name="aksi" value="hapus_pengeluaran" />
                                                                <div class="modal-body">
                                                                    <h5 class="text-center">Apakah Anda yakin menghapus Data Pengeluaran ini?</h5>
                                                                    <span class="text-danger"><?= $r2->deskripsi ?>--<?= $r2->nama_proyek ?></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="bhapus_pekerja">Ya, Hapus saja</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $no++;
                                            }
                                            unset($data_array, $r, $no);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Awal Modal -->
                        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Data Pengeluaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="proses.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="aksi" value="tambah_pengeluaran" />
                                            <div class="form-group mb-3">
                                                <label for="desc">Deskripsi</label>
                                                <input type="text" class="form-control" id="desc" placeholder="Deskripsi Pengeluaran" name="deskripsi">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="jm">Jumlah</label>
                                                <input type="text" class="form-control" id="jm" placeholder="Jumlah" name="jumlah">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="dt">Date</label>
                                                <input type="date" class="form-control" id="dt" placeholder="Deskripsi Pengeluaran" name="tanggal_pengeluaran">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="desc">Nama Proyek</label>
                                                <select class="form-control" id="proyek" name="id_proyek">
                                                    <?php
                                                    $dataku = $abc->tampil_semua_data();
                                                    foreach ($dataku as $r) { ?>
                                                        <option value="<?= $r->id_proyek ?>"><?= $r->nama_proyek ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="desc">Nama Item</label>
                                                <select class="form-control" id="proyek" name="id_item">
                                                    <?php
                                                    $dataku = $abc->tampil_semua_data_item();
                                                    foreach ($dataku as $r) { ?>
                                                        <option value="<?= $r->id_item ?>"><?= $r->nama_item ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bsimpan_pengeluaran">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->
                    <?php
                    } else { ?>
                        <h1 class="h3 mb-2 text-gray-800">Sistem Manajemen Proyek Konstruksi menggunakan RESTful JSON</h1>
                        <p class="mb-4">Sistem Manajemen Proyek Konstruksi yang diimplementasikan menggunakan pendekatan RESTful dengan
                            format pertukaran data JSON menawarkan solusi efektif dan terdistribusi untuk
                            tugas UAS Sistem Terdistribusi. Dengan arsitektur yang sesuai dengan prinsip REST,
                            sistem ini memberikan antarmuka yang sederhana, terstandar, dan dapat diakses dengan mudah
                            oleh berbagai klien.</p>
                    <?php
                    } ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>