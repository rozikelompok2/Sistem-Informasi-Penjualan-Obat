<?php
$id=$_GET['id_pasien'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data Pembeli(Pasien)</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_pasien" class="col-sm-3 control-label">ID Pembeli(Pasien)</label>
                             <div class="col-sm-9">
								<input type="text" name="id_pasien" value="<?=$data['id_pasien']?>"class="form-control" id="inputEmail3" placeholder="ID Pembeli">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pasien" value="<?=$data['nama_pasien']?>"class="form-control" id="inputEmail3" placeholder="Nama Pembeli">
                            </div>
                        </div>
						
						<!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        
                            <!--Untuk Bulan-->
                            
                            <!--Untuk Tanggal-->
                            
                        <!--end tanggal--> 
						
						<!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        
                            <!--Untuk Bulan-->
                            
                            <!--Untuk Tanggal-->
                            
						
                        <div class="form-group">
                            <label for="alamat_pasien" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_pasien" value="<?=$data['alamat_pasien']?>" class="form-control" id="inputPassword3" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_telp" class="col-sm-3 control-label">No. Handphone</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" value="<?=$data['no_telp']?>" class="form-control" id="inputPassword3" placeholder="Nomer Handphone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keluhan" class="col-sm-3 control-label">Keluhan</label>
                            <div class="col-sm-9">
                                <input type="text" name="keluhan" value="<?=$data['keluhan']?>" class="form-control" id="inputPassword3" placeholder="Keluhan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Pembeli</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=pembeli&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Pembeli
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $idpasien=$_POST['id_pasien'];
	$namapasien=$_POST['nama_pasien'];
    $alamatpasien=$_POST['alamat_pasien'];
    $notelpon=$_POST['no_telp'];
    $kel=$_POST['keluhan'];
    //buat sql
    $sql="UPDATE pasien SET nama_pasien = '$namapasien', alamat_pasien='$alamatpasien', no_telp='$notelpon', keluhan='$kel' WHERE id_pasien='$idpasien'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=pembeli&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



