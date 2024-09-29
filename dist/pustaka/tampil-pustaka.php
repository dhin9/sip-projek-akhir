<?php
session_start();
$kategori="";
$penulis="";
$penerbit="";
$tahun_terbit="";

if (isset($_POST['kategori_pustaka'])) {
	foreach ($_POST['kategori_pustaka'] as $value)
	{
		$kategori .= "'$value'". ",";
	}
	$kategori = substr($kategori,0,-1);
}else {
    $kategori = "0"; 
}

if (isset($_POST['penulis'])) {
	foreach ($_POST['penulis'] as $value)
	{
		$penulis .= "'$value'". ",";
	}
	$penulis = substr($penulis,0,-1);
}

if (isset($_POST['penerbit'])) {
	foreach ($_POST['penerbit'] as $value)
	{
		$penerbit .= "'$value'". ",";
	}
	$penerbit = substr($penerbit,0,-1);
}

if (isset($_POST['tahun_terbit'])) {
	foreach ($_POST['tahun_terbit'] as $value)
	{
		$tahun_terbit .= "'$value'". ",";
	}
	$tahun_terbit = substr($tahun_terbit,0,-1);
}
?>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
        <?php 
            if ($_SESSION['level']=='Petugas' or $_SESSION['level']=='petugas'):
        ?>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tambah_pustaka">
            <span class="text"><i class="fas fa-book fa-sm"></i> Tambah Pustaka</span>
        </button>
        <?php endif; ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah_pustaka" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Tambah Pustaka Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include 'tambah.php' ?>
      <form action="pustaka/tambah.php" method="post" enctype="multipart/form-data">
    <!-- rows -->
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group">
                <label>Judul Pustaka:</label>
                <input name="judul_pustaka" type="text" class="form-control" placeholder="Masukan judul pustaka" required>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Kode:</label>
                <h3><?php echo $kodepustaka; ?></h3>
                <input name="kode" value="<?php echo $kodepustaka; ?>" type="hidden" class="form-control">
            </div>
        </div>
    </div>
    <!-- rows -->                 
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Kategori:</label>
                <select name="kategori_pustaka" class="form-control">
                <?php
                    $sql="select * from kategori_pustaka order by id_kategori_pustaka asc";
                    $hasil=mysqli_query($kon,$sql);
                    while ($data = mysqli_fetch_array($hasil)):
                ?>
                    <option value="<?php echo $data['id_kategori_pustaka']; ?>"><?php echo $data['nama_kategori_pustaka']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Penulis:</label>
                <select name="penulis" class="form-control">
                <?php
                    
                    $sql="select * from penulis order by id_penulis asc";
                    $hasil=mysqli_query($kon,$sql);
                    while ($data = mysqli_fetch_array($hasil)):
                ?>
                    <option value="<?php echo $data['id_penulis']; ?>"><?php echo $data['nama_penulis']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
    </div>
    <!-- rows -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Penerbit:</label>
                <select name="penerbit" class="form-control">
                <?php
                    $sql="select * from penerbit order by id_penerbit asc";
                    $hasil=mysqli_query($kon,$sql);
                    while ($data = mysqli_fetch_array($hasil)):
                ?>
                    <option value="<?php echo $data['id_penerbit']; ?>"><?php echo $data['nama_penerbit']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Tahun Terbit:</label>
                <input name="tahun" type="number" class="form-control" placeholder="Masukan tahun" required>
            </div>
        </div>
    </div>
    <!-- rows -->                 
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Halaman:</label>
                        <input name="halaman" type="number" class="form-control" placeholder="Masukan jumlah halaman" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ISBN:</label>
                        <input name="isbn" type="text" class="form-control" placeholder="Masukan isbn" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jumlah Stok:</label>
                        <input name="stok" type="number" class="form-control" placeholder="Masukan stok" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Posisi Rak:</label>
                        <input name="rak" type="text" class="form-control" placeholder="Masukan posisi rak" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rows -->   
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div id="msg"></div>
                <label>Gambar Pustaka:</label>
                <input type="file" name="gambar_pustaka" class="file" >
                    <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                        <div class="input-group-append">
                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                        </div>
                    </div>
                <img src="../src/img/img80.png" id="preview" class="img-thumbnail">
            </div>
        </div>
    </div>

    <!-- rows -->   
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
             <button type="submit" name="tambah_pustaka" class="btn btn-success">Tambah Pustaka</button>
            </div>
        </div>
    </div>

</form>

<style>
    .file {
    visibility: hidden;
    position: absolute;
    }
</style>
<script>
    $(document).on("click", "#pilih_gambar", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    });
</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="row">

<?php         
    // include database
    include '../../config/database.php';



    if (isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and !isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori)";
    }else if (isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and !isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and penulis in($penulis)";
    }else if (isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and penerbit in($penerbit)";
    }else if (isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and penulis in($penulis) and penerbit in($penerbit)";
    }else if (isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and !isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and tahun_terbit in($tahun_terbit)";
    }else if (isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and !isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and penulis in($penulis) and tahun_terbit in($tahun_terbit)";
    }else if (isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and penerbit in($penerbit) and tahun_terbit in($tahun_terbit)";
    }else if (isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where kategori_pustaka in($kategori) and penulis in($penulis) and penerbit in($penerbit) and tahun_terbit in($tahun_terbit)";
    }else if (!isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and !isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where penulis in($penulis)";
    }else if (!isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where penulis in($penulis) and penerbit in($penerbit)";
    }else if (!isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and isset($_POST['penerbit']) and !isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where penerbit in($penerbit)";
    }else if (!isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and !isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where tahun_terbit in($tahun_terbit)";
    }else if (!isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and !isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where penulis in($penulis) and tahun_terbit in($tahun_terbit)";
    }else if (!isset($_POST['kategori_pustaka']) and isset($_POST['penulis']) and isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where penulis in($penulis) and penerbit in($penerbit) and tahun_terbit in($tahun_terbit)";
    }else if (!isset($_POST['kategori_pustaka']) and !isset($_POST['penulis']) and isset($_POST['penerbit']) and isset($_POST['tahun_terbit'])){
        $sql="select * from pustaka where penerbit in($penerbit) and tahun_terbit in($tahun_terbit)";
    }else{
        $sql="select * from pustaka";
    }

    $hasil=mysqli_query($kon,$sql);
    $cek=mysqli_num_rows($hasil);

    if ($cek<=0){
        echo"<div class='col-sm-12'><div class='alert alert-warning'>Data tidak ditemukan!</div></div>";
        exit;
    }
    $no=0;
    //Menampilkan data dengan perulangan while
    while ($data = mysqli_fetch_array($hasil)):
    $no++;
?>
<div class="col-sm-3">
    <div class="card border border-light">
        <img class="card-img-cap m-3" src="../dist/pustaka/gambar/<?php echo $data['gambar_pustaka'];?>"  alt="Card image cap">
        <div class="card-body text-center">
        <?php 
            if ($_SESSION['level']=='Petugas' or $_SESSION['level']=='petugas'):
        ?>
            <button  type="button" class="btn-detail-pustaka btn btn-info" id_pustaka="<?php echo $data['id_pustaka'];?>"  kode_pustaka="<?php echo $data['kode_pustaka'];?>" ><span class="text"><i class="fas fa-info"></i></span></button>
            <button  type="button" class="btn-edit-pustaka btn btn-warning" id_pustaka="<?php echo $data['id_pustaka'];?>" kode_pustaka="<?php echo $data['kode_pustaka'];?>" ><span class="text"><i class="fas fa-edit"></i></span></button>
            <a href="pustaka/hapus.php?id_pustaka=<?php echo $data['id_pustaka']; ?>&gambar_pustaka=<?php echo $data['gambar_pustaka']; ?>" class="btn-hapus btn btn-danger" ><i class="fa fa-trash"></i></a>
        <?php endif; ?>
        <?php 
            if ($_SESSION['level']=='Anggota' or $_SESSION['level']=='anggota'):
        ?>
            <button  type="button" class="btn-detail-pustaka btn btn-warning btn-block" id_pustaka="<?php echo $data['id_pustaka'];?>"  kode_pustaka="<?php echo $data['kode_pustaka'];?>" ><span class="text">Lihat</span></button>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
</div>


<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Bagian header -->
        <div class="modal-header">
            <h4 class="modal-title" id="judul"></h4>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Bagian body -->
        <div class="modal-body">
            <div id="tampil_data">

            </div>  
        </div>
        <!-- Bagian footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
</div>


<script>

    // Melihat detail pustaka
    $('.btn-detail-pustaka').on('click',function(){
		var id_pustaka = $(this).attr("id_pustaka");
        var kode_pustaka = $(this).attr("kode_pustaka");
        $.ajax({
            url: 'pustaka/detail.php',
            method: 'post',
			data: {id_pustaka:id_pustaka},
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Detail Pustaka #'+kode_pustaka;
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });

    // Edit pustaka
    $('.btn-edit-pustaka').on('click',function(){
		var id_pustaka = $(this).attr("id_pustaka");
		var kode_pustaka = $(this).attr("kode_pustaka");
        $.ajax({
            url: 'pustaka/edit.php',
            method: 'post',
			data: {id_pustaka:id_pustaka},
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Edit Pustaka #'+kode_pustaka;
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });


       // fungsi hapus karyawan
    $('.btn-hapus').on('click',function(){
        konfirmasi=confirm("Yakin ingin menghapus pustaka ini?")
        if (konfirmasi){
            return true;
        }else {
            return false;
        }
    });
</script>
