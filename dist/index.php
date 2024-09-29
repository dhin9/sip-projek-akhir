<?php 
  session_start();
  if (!$_SESSION["id_pengguna"]){
        header("Location:login.php");
  }else {

    include '../config/database.php';
    $id_pengguna=$_SESSION["id_pengguna"];
    $username=$_SESSION["username"];

    $hasil=mysqli_query($kon,"select username from pengguna where id_pengguna=$id_pengguna");
    $data = mysqli_fetch_array($hasil); 
    $username_db=$data['username'];

    if ($username!=$username_db){
        session_unset();
        session_destroy();
        header("Location:login.php");
    }
  }

?>

<?php
  include '../config/database.php';
  $hasil=mysqli_query($kon,"select * from profil_aplikasi order by nama_aplikasi desc limit 1");
  $data = mysqli_fetch_array($hasil); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $data['nama_aplikasi'];?></title>
        <title>Dashboard - Mazer Admin Dashboard</title>
        <link href="../src/templates/css/styles.css" rel="stylesheet" />
        <link href="../src/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

        <link href="../src/plugin/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="../src/js/font-awesome/all.min.js" crossorigin="anonymous"></script>
        <script src="../src/js/jquery/jquery-3.5.1.min.js"></script>
        <script src="../src/plugin/chart/Chart.js"></script>
        <script src="../src/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="../src/plugin/datatables/dataTables.bootstrap4.min.js"></script>
        <link
            rel="shortcut icon"
            href="../assets/compiled/svg/favicon.svg"
            type="image/x-icon"
        />
        <link
            rel="shortcut icon"
            href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
            type="image/png"
        />

        <link rel="stylesheet" href="../assets/compiled/css/app.css" />
        <link rel="stylesheet" href="../assets/compiled/css/app-dark.css" />
        <link rel="stylesheet" href="../assets/compiled/css/iconly.css" />
    </head>

    <body>
        
        <script src="assets/static/js/initTheme.js"></script>
        <div id="app">
            <div id="sidebar">
                <div class="sidebar-wrapper active">
                    <div class="logo pt-4">
                        <a href="index.php" class="d-flex justify-content-center"
                            ><img
                                src="aplikasi/logo/<?php echo $data['logo'];?>" style="width: 75px ;"
                                alt=""
                                srcset=""
                            /></a>
                            <h4 class="text-center">Hallo, <?= $_SESSION["username"]; ?></h4>
                    </div>
                    <div class="sidebar-toggler x">
                        <a
                            href="#"
                            class="sidebar-hide d-xl-none d-block"
                            ><i class="bi bi-x bi-middle"></i
                        ></a>
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <?php $pagename = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); ?>
                            <?php
                            if ($_SESSION['level']=='Petugas' or $_SESSION['level']=='petugas'):
                            ?>
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item <?= $pagename == 'index.php?page=dashboard' ? 'active' : ''; ?>">
                                <a href="index.php?page=dashboard" class="sidebar-link">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item has-sub">
                                <a href="#" class="sidebar-link">
                                    <i class="bi bi-collection-fill"></i>
                                    <span>Investaris Buku</span>
                                </a>

                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=pustaka"
                                            class="submenu-link"
                                            >Pustaka</a
                                        >
                                    </li>

                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=kategori"
                                            class="submenu-link"
                                            >Kategori</a
                                        >
                                    </li>

                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=penulis"
                                            class="submenu-link"
                                            >Penulis</a
                                        >
                                    </li>

                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=penerbit"
                                            class="submenu-link"
                                            >Penerbit</a
                                        >
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item has-sub">
                                <a href="#" class="sidebar-link">
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Master Data</span>
                                </a>

                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=anggota"
                                            class="submenu-link"
                                            >Anggota</a
                                        >
                                    </li>

                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=petugas"
                                            class="submenu-link"
                                            >Petugas</a
                                        >
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item ">
                                <a href="index.php?page=daftar-peminjaman" class="sidebar-link">
                                    <i class="bi bi-arrow-left-right"></i>
                                    <span>Peminjaman</span>
                                </a>
                            </li>

                            <li class="sidebar-item has-sub">
                                <a href="#" class="sidebar-link">
                                    <i class="bi bi-stack"></i>
                                    <span>Laporan</span>
                                </a>

                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=laporan-peminjaman"
                                            class="submenu-link"
                                            >Peminjaman</a
                                        >
                                    </li>

                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=laporan-pustaka"
                                            class="submenu-link"
                                            >Pustaka</a
                                        >
                                    </li>

                                    <!-- <li class="submenu-item">
                                        <a
                                            href="index.php?page=laporan-anggota"
                                            class="submenu-link"
                                            >Anggota</a
                                        >
                                    </li> -->
                                </ul>
                            </li>

                            <li class="sidebar-item has-sub">
                                <a href="#" class="sidebar-link">
                                <i class="bi bi-gear"></i>
                                    <span>Pengaturan</span>
                                </a>

                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a
                                            href="index.php?page=aplikasi"
                                            class="submenu-link"
                                            >Aplikasi</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>
                            <?php
                            if ($_SESSION['level']=='Anggota' or $_SESSION['level']=='anggota'):
                            ?>
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item">
                                <a href="index.php?page=dashboard" class="sidebar-link">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item ">
                                <a href="index.php?page=pustaka" class="sidebar-link">
                                    <i class="bi bi-journal"></i>
                                    <span>Pustaka</span>
                                </a>
                            </li>
                            <!-- <li class="sidebar-item ">
                                <a href="index.php?page=keranjang" class="sidebar-link">
                                    <i class="bi bi-cart3"></i>
                                    <span>Keranjang Pustaka</span>
                                </a>
                            </li> -->
                            <li class="sidebar-item ">
                                <a href="index.php?page=peminjaman-saya" class="sidebar-link">
                                    <i class="bi bi-arrow-left-right"></i>
                                    <span>Peminjaman</span>
                                </a>
                            </li>
                            <li class="sidebar-item ">
                                <a href="index.php?page=keterlambatan-saya" class="sidebar-link">
                                <i class="bi bi-exclamation-diamond-fill"></i>
                                    <span>Informasi Peminjaman</span>
                                </a>
                            </li>
                            <li class="sidebar-item ">
                                <a href="index.php?page=denda-saya" class="sidebar-link">
                                    <i class="bi bi-currency-dollar"></i>
                                    <span>Denda</span>
                                </a>
                            </li>
                            <?php endif ?>
                            <li class="sidebar-item">
                                <a href="index.php?page=profil" class="sidebar-link">
                                    <i class="bi bi-people-fill"></i>
                                    <span>Profil</span>
                                </a>
                            </li>
                            <li class="submenu-item">
                                <a
                                    href="#"
                                    class="submenu-link"
                                    data-toggle="modal"
                                    data-target="#logoutModal"
                                    ><i class="bi bi-box-arrow-left">
                                        Logout
                                    </i></a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
            <div id="layoutSidenav_content">
                <?php 
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    
                        switch ($page) {
                            case 'dashboard':
                                include "dashboard/index.php";
                                break;
                            case 'anggota':
                                include "anggota/index.php";
                                break;
                            case 'petugas':
                                include "petugas/index.php";
                                break;
                            case 'pustaka':
                                include "pustaka/index.php";
                                break;
                            case 'penulis':
                                include "pustaka/penulis/index.php";
                                break;
                            case 'penerbit':
                                include "pustaka/penerbit/index.php";
                                break;
                            case 'kategori':
                                include "pustaka/kategori/index.php";
                                break;
                            case 'input-peminjaman':
                                include "peminjaman/input-peminjaman.php";
                                break;
                            case 'daftar-peminjaman':
                                include "peminjaman/index.php";
                                break;
                            case 'detail-peminjaman':
                                include "peminjaman/detail-peminjaman.php";
                                break;
                            case 'laporan-peminjaman':
                                include "laporan/peminjaman/laporan-peminjaman.php";
                                break;
                            case 'laporan-pustaka':
                                include "laporan/pustaka/laporan-pustaka.php";
                                break;
                            case 'laporan-anggota':
                                include "laporan/anggota/laporan-anggota.php";
                                break;
                            case 'laporan-pendapatan':
                                include "laporan/pendapatan/laporan-pendapatan.php";
                                break;
                            case 'keranjang':
                                include "keranjang/index.php";
                                break;
                            case 'booking':
                                include "keranjang/booking.php";
                                break;
                            case 'peminjaman-saya':
                                include "peminjaman/anggota/index.php";
                                break;
                            case 'keterlambatan-saya':
                                include "peminjaman/anggota/keterlambatan.php";
                                break;
                            case 'denda-saya':
                                include "peminjaman/anggota/denda.php";
                                break;
                            case 'profil':
                                include "profil/index.php";
                            break;
                            case 'aplikasi':
                                include "aplikasi/index.php";
                            break;
                        default:
                            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                            break;
                        }
                    }
                ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <?php 
                            include '../config/database.php';
                            $hasil=mysqli_query($kon,"select nama_aplikasi from profil_aplikasi order by nama_aplikasi desc limit 1");
                            $data = mysqli_fetch_array($hasil); 
                        ?>
                        <div class="text-dark">&copy; <?php echo $data['nama_aplikasi'];?> <?php echo date('Y');?></div>
                        </div>
                    </div>
                </footer>
            </div>      
        </div>
    </div>
        <script src="../src/js/scripts.js"></script>
        <script src="../src/plugin/select2/select2.min.js"></script>
        <link href="../src/plugin/select2/select2.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="../src/js/jquery-ui/jquery-ui.js"></script>
        <link href="../src/js/jquery-ui/jquery-ui.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="../src/plugin/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/static/js/components/dark.js"></script>
        <script src="../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <script src="../assets/compiled/js/app.js"></script>

        <!-- Need: Apexcharts -->
        <script src="../assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/static/js/pages/dashboard.js"></script>

          <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar?</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-warning" href="logout.php">Logout</a>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
