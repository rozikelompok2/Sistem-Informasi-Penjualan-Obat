<?php
$id=$_GET['id_supplier'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_supplier='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data Supplier</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_supplier" class="col-sm-3 control-label">ID Supplier</label>
                             <div class="col-sm-9">
								<input type="text" name="id_supplier" value="<?=$data['id_supplier']?>"class="form-control" id="inputEmail3" placeholder="ID Supplier">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_supplier" class="col-sm-3 control-label">Nama Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_supplier" value="<?=$data['nama_supplier']?>"class="form-control" id="inputEmail3" placeholder="Nama Supplier">
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
                            <label for="alamat_supplier" class="col-sm-3 control-label">Alamat Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_supplier" value="<?=$data['alamat_supplier']?>" class="form-control" id="inputPassword3" placeholder="Alamat Supplier">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telpon" class="col-sm-3 control-label">No. Handphone</label>
                            <div class="col-sm-9">
                                <input type="text" name="telpon" value="<?=$data['telpon']?>" class="form-control" id="inputPassword3" placeholder="Nomer Handphone">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Supplier</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=supplier&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Supplier
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $idsupplier=$_POST['id_supplier'];
	$namasupplier=$_POST['nama_supplier'];
    $alamatsupplier=$_POST['alamat_supplier'];
    $telpon=$_POST['telpon'];
    //buat sql
    $sql="UPDATE supplier SET nama_supplier = '$namasupplier', alamat_supplier='$alamatsupplier', telpon='$telpon' WHERE id_supplier='$idsupplier'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=supplier&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



