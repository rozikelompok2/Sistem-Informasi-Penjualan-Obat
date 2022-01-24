<?php
$id=$_GET['id_pembelian'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM beli WHERE id_pembelian ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>

<?php
      $sql2 = "SELECT * FROM supplier";
      $query2 = mysqli_query($koneksi, $sql2) or die("SQL Anda Salah");
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
                    <h3 class="panel-title">Form Update Data Pembelian Barang</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                            <label for="id_pembelian" class="col-sm-3 control-label">ID Pembelian</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_pembelian" value="<?=$data['id_pembelian']?>"class="form-control" id="inputEmail3" placeholder="ID dari Pembelian">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier" class="col-sm-3 control-label">ID Supplier</label>
                            <div class="col-sm-2 col-xs-9">
								<select name="id_supplier" class="form-control">
                                    <?php
                                    while ($data2 = mysqli_fetch_array($query2)) { ?>
                                        <option value="<?= $data2['id_supplier'] ?>"><?= $data2['id_supplier'] ?></option>
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
                            <label for="tgl_beli" class="col-sm-3 control-label">Tanggal Beli(Obat)</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_beli" value="<?=$data['tgl_beli']?>"class="form-control" id="inputEmail3" placeholder="Tanggal Beli">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="no_bukti" class="col-sm-3 control-label">Nomor Bukti</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_bukti" value="<?=$data['no_bukti']?>"class="form-control" id="inputEmail3" placeholder="Nomor Bukti">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="diskon" class="col-sm-3 control-label">Diskon Barang</label>
                            <div class="col-sm-9">
                                <input type="text" name="diskon" value="<?=$data['diskon']?>"class="form-control" id="inputEmail3" placeholder="Diskon">
                            </div>
                        </div>
                        <!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        
                        <!--end tanggal lahir-->           

                        <!--Status-->
                    
                        <!--Akhir Status-->
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Pembelian</button>
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
    $sql="UPDATE beli SET id_supplier='$idsupplier',nama_supplier='$namasupplier',tgl_beli='$tglbeli',no_bukti='$nobukti',diskon='$diskon' WHERE id_pembelian ='$idpembelian'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=pembelian&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



