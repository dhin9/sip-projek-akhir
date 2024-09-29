<?php
// session_start();
    if (isset($_POST['tambah_pustaka'])) {
        //Include file koneksi, untuk koneksikan ke database
        include '../../config/database.php';
        
        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            mysqli_query($kon,"START TRANSACTION");

            $kode=input($_POST["kode"]);
            $judul_pustaka=$_POST["judul_pustaka"];
            $kategori_pustaka=input($_POST["kategori_pustaka"]);
            $penulis=input($_POST["penulis"]);
            $penerbit=input($_POST["penerbit"]);
            $tahun=input($_POST["tahun"]);
            $halaman=input($_POST["halaman"]);
            $isbn=input($_POST["isbn"]);
            $stok=input($_POST["stok"]);
            $rak=input($_POST["rak"]);

            $tanggal=date("Y-m-d");

            $ekstensi_diperbolehkan	= array('png','jpg');
            $gambar_pustaka = $_FILES['gambar_pustaka']['name'];
            $x = explode('.', $gambar_pustaka);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['gambar_pustaka']['size'];
            $file_tmp = $_FILES['gambar_pustaka']['tmp_name'];	

            if (!empty($gambar_pustaka)){
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){	
                        //Mengupload gambar
                        move_uploaded_file($file_tmp, 'gambar/'.$gambar_pustaka);
                        $sql="insert into pustaka (kode_pustaka,judul_pustaka,kategori_pustaka,penulis,penerbit,tahun,gambar_pustaka,halaman,isbn,stok,rak) values
                        ('$kode','$judul_pustaka','$kategori_pustaka','$penulis','$penerbit','$tahun','$gambar_pustaka','$halaman','$isbn','$stok','$rak')";
                    } else {
                        header("Location:../../dist/index.php?page=pustaka&add=gagal_ukuran");
                        exit();
                    }
                } else {
                    header("Location:../../dist/index.php?page=pustaka&add=format_gambar_tidak_sesuai");
                    exit();
                }
            }else {
                $gambar_pustaka="gambar_default.png";
                $sql="insert into pustaka (kode_pustaka,judul_pustaka,kategori_pustaka,penulis,penerbit,tahun,gambar_pustaka,halaman,isbn,stok,rak) values
                ('$kode','$judul_pustaka','$kategori_pustaka','$penulis','$penerbit','$tahun','$gambar_pustaka','$halaman','$isbn','$stok','$rak')";
            }

            $simpan_pustaka=mysqli_query($kon,$sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($simpan_pustaka) {
                mysqli_query($kon,"COMMIT");
                header("Location:../../dist/index.php?page=pustaka&add=berhasil");
            }
            else {
                mysqli_query($kon,"ROLLBACK");
                header("Location:../../dist/index.php?page=pustaka&add=gagal");
            }
        }
    }
      // mengambil data pustaka dengan kode paling besar
      include '../../config/database.php';
      $query = mysqli_query($kon, "SELECT max(id_pustaka) as kodeTerbesar FROM pustaka");
      $data = mysqli_fetch_array($query);
      $id_pustaka = $data['kodeTerbesar'];
      $id_pustaka++;
      $huruf = "P";
      $kodepustaka = $huruf . sprintf("%04s", $id_pustaka);

?>

