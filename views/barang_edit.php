<?php
$id=$_GET['id_barang'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>

<?php
      $sql1 = "SELECT * FROM beli";
      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Barang(Obat)</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                            <label for="id_barang" class="col-sm-3 control-label">ID Barang(Obat)</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_barang" value="<?=$data['id_barang']?>"class="form-control" id="inputEmail3" placeholder="ID dari Barang atau Obat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_pembelian" class="col-sm-3 control-label">ID Pembelian</label>
                            <div class="col-sm-2 col-xs-9">
								<select name="id_pembelian" class="form-control">
                                    <?php
                                    while ($data1 = mysqli_fetch_array($query1)) { ?>
                                        <option value="<?= $data1['id_pembelian'] ?>"><?= $data1['id_pembelian'] ?></option>
                                    <?php
                                    }
                                    ?>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang" class="col-sm-3 control-label">Nama Barang(Obat)</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_barang" value="<?=$data['nama_barang']?>"class="form-control" id="inputEmail3" placeholder="Nama Barang(Obat)">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="harga_beli" class="col-sm-3 control-label">Harga Beli</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga_beli" value="<?=$data['harga_beli']?>"class="form-control" id="inputEmail3" placeholder="Harga Beli Barang(Obat)">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="harga_jualsatuan" class="col-sm-3 control-label">Harga Jual Persatuan</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga_jualsatuan" value="<?=$data['harga_jualsatuan']?>"class="form-control" id="inputEmail3" placeholder="Harga Jual Persatuan dari barang(Obat)">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="stok" class="col-sm-3 control-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="text" name="stok" value="<?=$data['stok']?>"class="form-control" id="inputEmail3" placeholder="Stok Barang(Obat)">
                            </div>
                        </div>
                        <!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        
                        <!--end tanggal lahir-->           

                        <!--Status-->
                    
                        <!--Akhir Status-->
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Barang</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=barang&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Arsip
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
    $sql="UPDATE barang SET id_pembelian='$idpembeli',nama_barang='$namabarang',harga_beli='$hargabeli',harga_jualsatuan='$hargajualsatuan',stok='$stok' WHERE id_barang ='$idbarang'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=barang&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



