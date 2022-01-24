<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pembeli(Pasien)</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">

						<div class="form-group">
                            <label for="id_pasien" class="col-sm-3 control-label">ID Pembeli(Pasien)</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_pasien" class="form-control" id="inputEmail3" placeholder="Inputkan ID Pembeli" required>
                            </div>
                        </div>

						<div class="form-group">
                            <label for="nama_pasien" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-3">
                                <input type="text" name="nama_pasien" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Pembeli" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat_pasien" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_pasien" class="form-control" id="inputEmail3" placeholder="Inputkan Alamat Pembeli" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_telp" class="col-sm-3 control-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" class="form-control" id="inputEmail3" placeholder="Inputkan No. Telepon Pembeli" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Keluhan" class="col-sm-3 control-label">Keluhan</label>
                            <div class="col-sm-9">
                                <input type="text" name="Keluhan" class="form-control" id="inputEmail3" placeholder="Inputkan Keluhan Pembeli" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Peminjaman</button>
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
	$nama=$_POST['nama_pasien'];
	$alamat=$_POST['alamat_pasien'];
    $notelp=$_POST['no_telp'];
    $keluhan=$_POST['Keluhan'];
    //buat sql
    $sql="INSERT INTO pasien VALUES ('$idpasien','$nama','$alamat','$notelp','$keluhan')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Data Pembeli Error");
    if ($query){
        echo "<script>window.location.assign('?page=pembeli&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
