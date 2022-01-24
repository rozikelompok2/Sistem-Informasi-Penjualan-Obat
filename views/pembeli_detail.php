<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Pembeli(Pasien)</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM pasien WHERE id_pasien='" . $_GET ['id_pasien'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Id Pembeli(Pasien)</td> <td><?= $data['id_pasien'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pembeli</td> <td><?= $data['nama_pasien'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td> <td><?= $data['alamat_pasien'] ?></td>
                        </tr>
						<tr>
                            <td>No. Handphone</td> <td><?= $data['no_telp'] ?></td>
                        </tr>
                        <tr>
                            <td>Keluhan</td> <td><?= $data['keluhan'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=pembeli&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Pembeli </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

