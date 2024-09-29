<?php
session_start();
    //Koneksi database
    include '../../config/database.php';
    //Memulai petugas
    mysqli_query($kon,"START TRANSACTION");

    $id_petugas=$_GET['id_petugas'];
    $kode_petugas=$_GET['kode_petugas'];

    //Menghapus data dalam tabel petugas
    $hapus_petugas=mysqli_query($kon,"delete from petugas where id_petugas='$id_petugas'");

    //Menghapus data dalam tabel pengguna
    $hapus_pengguna=mysqli_query($kon,"delete from pengguna where kode_pengguna='$kode_petugas'");


    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hapus_petugas and $hapus_pengguna) {
        mysqli_query($kon,"COMMIT");
        header("Location:../../dist/index.php?page=petugas&hapus=berhasil");
    }
    else {
        mysqli_query($kon,"ROLLBACK");
        header("Location:../../dist/index.php?page=petugas&hapus=gagal");

    }

?>