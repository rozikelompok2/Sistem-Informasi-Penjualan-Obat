<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Supplier</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">

						<div class="form-group">
                            <label for="id_supplier" class="col-sm-3 control-label">ID Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_supplier" class="form-control" id="inputEmail3" placeholder="Inputkan ID Supplier" required>
                            </div>
                        </div>

						<div class="form-group">
                            <label for="nama_supplier" class="col-sm-3 control-label">Nama Supplier</label>
                            <div class="col-sm-3">
                                <input type="text" name="nama_supplier" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Supplier" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat_supplier" class="col-sm-3 control-label">Alamat Supplier</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_supplier" class="form-control" id="inputEmail3" placeholder="Inputkan Alamat Supplier" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telpon" class="col-sm-3 control-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="telpon" class="form-control" id="inputEmail3" placeholder="Inputkan No. Telepon Supplier" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Supplier</button>
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
    $sql="INSERT INTO supplier VALUES ('$idsupplier','$namasupplier','$alamatsupplier','$telpon')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Data Supplier Error");
    if ($query){
        echo "<script>window.location.assign('?page=supplier&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
