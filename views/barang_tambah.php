<?php
      $sql = "SELECT * FROM beli";
      $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Barang (Obat)</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="id_barang" class="col-sm-3 control-label">ID Obat</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_barang" class="form-control" id="inputEmail3" placeholder="Inputkan ID dari Barang atau Obat" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="id_pembelian" class="col-sm-3 control-label">ID Pembelian</label>
                            <div class="col-sm-2 col-xs-9">
								<select name="id_pembelian" class="form-control">
                                    <?php
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <option value="<?= $data['id_pembelian'] ?>"><?= $data['id_pembelian'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="nama_barang" class="col-sm-3 control-label">Nama Barang</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_barang" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Barang(Obat)" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="harga_beli" class="col-sm-3 control-label">Harga Beli</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga_beli" class="form-control" id="inputEmail3" placeholder="Inputkan Harga Beli Barang(Obat)" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga_jualsatuan" class="col-sm-3 control-label">Harga Jual Persatuan</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga_jualsatuan"class="form-control" id="inputEmail3" placeholder="Inputkan Harga Jual Persatuan dari barang(Obat)" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="stok" class="col-sm-3 control-label">Stok</label>
                            <div class="col-sm-3">
                                <input type="text" name="stok" class="form-control" id="inputEmail3" placeholder="Inputkan Stok Barang(Obat)" required>
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
                    <a href="?page=barang&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Barang
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $idbarang=$_POST['id_barang'];
    $idpembeli=$_POST['id_pembelian'];
	$namabarang=$_POST['nama_barang'];
	$hargabeli=$_POST['harga_beli'];
    $hargajualsatuan=$_POST['harga_jualsatuan'];
	$stok=$_POST['stok'];
  
    //buat sql
    $sql="INSERT INTO barang VALUES ('$idbarang','$idpembeli','$namabarang','$hargabeli','$hargajualsatuan','$stok')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Barang Error");
    if ($query){
        echo "<script>window.location.assign('?page=barang&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
