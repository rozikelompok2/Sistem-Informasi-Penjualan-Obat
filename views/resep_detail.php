<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Resep (Pasien)</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM resep WHERE id_resep='" . $_GET ['id_resep'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Id Pembeli(Pasien)</td> <td><?= $data['id_resep'] ?></td>
                        </tr>
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
                            <td>Keluhan</td> <td><?= $data['keluhan'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Obat</td> <td><?= $data['nama_obat'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Obat</td> <td><?= $data['jml_obat'] ?></td>
                        </tr>
                        <tr>
                            <td>Aturan Pakai</td> <td><?= $data['aturan_pakai'] ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td> <td><?= $data['harga'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=resep&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Resep </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

