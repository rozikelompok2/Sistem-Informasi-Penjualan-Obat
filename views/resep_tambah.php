<?php
      $sql = "SELECT * FROM pasien";
      $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
?>
<?php
      $sql1 = "SELECT * FROM pasien";
      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
?>
<?php
      $sql2 = "SELECT * FROM pasien";
      $query2 = mysqli_query($koneksi, $sql2) or die("SQL Anda Salah");
?>
<?php
      $sql3 = "SELECT * FROM pasien";
      $query3 = mysqli_query($koneksi, $sql3) or die("SQL Anda Salah");
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Resep Pasien</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="id_resep" class="col-sm-3 control-label">ID Resep</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_resep" class="form-control" id="inputEmail3" placeholder="Inputkan ID dari Resep" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="id_pasien" class="col-sm-3 control-label">ID Pasien</label>
                            <div class="col-sm-2 col-xs-9">
								<select name="id_pasien" class="form-control">
                                    <?php
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <option value="<?= $data['id_pasien'] ?>"><?= $data['id_pasien'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien" class="col-sm-3 control-label">Nama Pasien</label>
                            <div class="col-sm-3 col-xs-9">
								<select name="nama_pasien" class="form-control">
                                    <?php
                                    while ($data1 = mysqli_fetch_array($query1)) { ?>
                                        <option value="<?= $data1['nama_pasien'] ?>"><?= $data1['nama_pasien'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pasien" class="col-sm-3 control-label">Alamat Pasien</label>
                            <div class="col-sm-3 col-xs-9">
								<select name="alamat_pasien" class="form-control">
                                    <?php
                                    while ($data2 = mysqli_fetch_array($query2)) { ?>
                                        <option value="<?= $data2['alamat_pasien'] ?>"><?= $data2['alamat_pasien'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keluhan" class="col-sm-3 control-label">Keluhan</label>
                            <div class="col-sm-3 col-xs-9">
								<select name="keluhan" class="form-control">
                                    <?php
                                    while ($data3 = mysqli_fetch_array($query3)) { ?>
                                        <option value="<?= $data3['keluhan'] ?>"><?= $data3['keluhan'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nama_obat" class="col-sm-3 control-label">Nama Obat</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_obat" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Obat" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="jml_obat" class="col-sm-3 control-label">Jumlah Obat</label>
                            <div class="col-sm-9">
                                <input type="text" name="jml_obat" class="form-control" id="inputEmail3" placeholder="Inputkan Jumlah Obat" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="aturan_pakai" class="col-sm-3 control-label">Aturan Pakai</label>
                            <div class="col-sm-9">
                                <input type="text" name="aturan_pakai" class="form-control" id="inputEmail3" placeholder="Inputkan Aturan Pakai" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga"class="form-control" id="inputEmail3" placeholder="Inputkan Harga" required>
                            </div>
                        </div>
                        


                        <!--Status-->

                        
                        <!--Akhir Status-->

						

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=resep&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Resep
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $idresep=$_POST['id_resep'];
    $idpasien=$_POST['id_pasien'];
	$namapasien=$_POST['nama_pasien'];
	$alamatpasien=$_POST['alamat_pasien'];
    $keluhan=$_POST['keluhan'];
	$namaobat=$_POST['nama_obat'];
    $jmlobat=$_POST['jml_obat'];
    $aturanpakai=$_POST['aturan_pakai'];
    $harga=$_POST['harga'];
  
    //buat sql
    $sql="INSERT INTO resep VALUES ('$idresep','$idpasien','$namapasien','$alamatpasien','$keluhan','$namaobat','$jmlobat','$aturanpakai','$harga')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Resep Error");
    if ($query){
        echo "<script>window.location.assign('?page=resep&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
