<?php
      $sql = "SELECT * FROM supplier";
      $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
?>
<?php
      $sql1 = "SELECT * FROM supplier";
      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pembelian Barang</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="id_pembelian" class="col-sm-3 control-label">ID Pembelian</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_pembelian" class="form-control" id="inputEmail3" placeholder="Inputkan ID dari Pembelian" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="id_supplier" class="col-sm-3 control-label">ID Supplier</label>
                            <div class="col-sm-2 col-xs-9">
								<select name="id_supplier" class="form-control">
                                    <?php
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <option value="<?= $data['id_supplier'] ?>"><?= $data['id_supplier'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_supplier" class="col-sm-3 control-label">Nama Supplier</label>
                            <div class="col-sm-3 col-xs-9">
								<select name="nama_supplier" class="form-control">
                                    <?php
                                    while ($data1 = mysqli_fetch_array($query1)) { ?>
                                        <option value="<?= $data1['nama_supplier'] ?>"><?= $data1['nama_supplier'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="tgl_beli" class="col-sm-3 control-label">Tanggal Beli</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_beli" class="form-control" id="inputEmail3" placeholder="Inputkan tanggal beli" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="no_bukti" class="col-sm-3 control-label">Nomor Bukti</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_bukti" class="form-control" id="inputEmail3" placeholder="Inputkan No. Bukti" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="diskon" class="col-sm-3 control-label">Diskon Barang</label>
                            <div class="col-sm-9">
                                <input type="text" name="diskon"class="form-control" id="inputEmail3" placeholder="Inputkan Diskon dari Barang" required>
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
                    <a href="?page=pembelian&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Pembelian
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $idpembelian=$_POST['id_pembelian'];
    $idsupplier=$_POST['id_supplier'];
	$namasupplier=$_POST['nama_supplier'];
	$tglbeli=$_POST['tgl_beli'];
    $nobukti=$_POST['no_bukti'];
	$diskon=$_POST['diskon'];
  
    //buat sql
    $sql="INSERT INTO beli VALUES ('$idpembelian','$idsupplier','$namasupplier','$tglbeli','$nobukti','$diskon')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Pembelian Error");
    if ($query){
        echo "<script>window.location.assign('?page=pembelian&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
