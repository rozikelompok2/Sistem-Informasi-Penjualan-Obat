<?php
session_start();
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";

} else { 

$query= mysqli_query($koneksi, "select kd_transaksi from transaksi order by id_transaksi desc");

$kodeTransaksi=mysqli_fetch_array($query);
if($kodeTransaksi){
	$nilai=substr($kodeTransaksi[0], 1);
	$kode = (int) $nilai;
	$kode=$kode + 1;
	$auto_kode= "T".str_pad($kode, 3,"0", STR_PAD_LEFT);
}else{
	$auto_kode="T001";
}

//no nota otomatis
$sql= mysqli_query($koneksi, "select no_nota from transaksi order by no_nota desc");

$kodeNota=mysqli_fetch_array($sql);
if($kodeNota){
  $nilai=substr($kodeNota[0], 1);
  $kode = (int) $nilai;

  $kode=$kode + 1;
  $autokode= "0".str_pad($kode, 3,"0", STR_PAD_LEFT);
}else{
  $autokode="0001";
}
date_default_timezone_set('Asia/Jakarta');
?>

<!-- page content -->
<div class="right_col" role="main">
	<form action="beli.php" method="post">
	<div class="page-title">
		<div class="title_left">
			<h3>TRANSAKSI</h3>
		</div>
		<br>
	</div>
	<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
					<div class="row">
						<div class="col-md-2">
							<input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d', time()) ?>">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="no-nota">No Nota</label>
								<input type="text" class="form-control" name="no_nota" id="no-nota" value="<?= $autokode ?>" readonly>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="id-transaksi">ID Transaksi</label>
								<input type="text" class="form-control" name="id_transaksi" id="id-transaksi" value="<?= $auto_kode ?>" readonly>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="id-pasien">ID Pasien</label>
								<input type="text" class="form-control" name="id_pasien" id="id-transaksi" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="id-barang">ID Barang</label>
								<select class="form-control" id="id-barang" required></select>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="qty">QTY</label>
								<input type="number" class="form-control" min="1" name="qty" id="qty" required>
							</div>
						</div>
						<input type="hidden" id="harga">
						<input type="hidden" id="idbrg">
						<input type="hidden" name="no" id="no" value="1">
						<div class="col-md-2">
							<div class="form-group">
								<br>
								<a href="#" class="btn btn-default" id="tambah">Tambah</a>
							</div>
						</div>			
					</div>
					<div class="col-md-8">
						<div class="row">
							<div id="list">
								<div class="col-md-4">
									<span>Nama Barang</span>
								</div>
								<div class="col-md-2">
									<span>Harga</span>
								</div>
								<div class="col-md-2">
									<span>QTY</span>
								</div>
								<div class="col-md-3">
									<span>Subtotal</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-1">
						<div class="row">
							<span>Total</span>
							<input type="text" id="stotal" name="total" class="form-control" value="0" readonly>
						</div>
						<br>
						<div class="row">
							<span>Bayar</span>
							<input type="text" id="bayar" name="bayar" class="form-control" required>
						</div>
						<br>
						<div class="row">
							<span>Kembalian</span>
							<input type="text" name="kembalian" id="kembalian" value="0" class="form-control" readonly>
						</div>
						<br>
						<button type="submit" name="simpan" class="btn btn-default"> Simpan</button>
					</div>
				<hr>
			</form>
				<table class="table table-bordered" id="transaksi">
					<thead>
						<tr>
							<td>No.</td>
							<td>No Nota</td>
							<td>ID Transaksi</td>
							
							<td>ID Pasien</td>
							<td>Tanggal</td>
							<td>Total Pembelian</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = mysqli_query($koneksi, "SELECT no_nota, kd_transaksi, id_pasien,  tgl_penjualan, total_pembelian FROM transaksi GROUP BY no_nota ORDER BY id_transaksi DESC");
							$no = 1;
							while ($data = mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $data['no_nota'] ?></td>
							<td><?= $data['kd_transaksi'] ?></td>
							
							<td><?= $data['id_pasien'] ?></td>
							<td><?= $data['tgl_penjualan'] ?></td>
							<td><?= $data['total_pembelian'] ?></td>
							<td>
								<a href="delete.php?id=<?=$data['no_nota']?>" onClick="return confirm('Hapus Data ?')" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						<?php
						$no++;
							}	
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<!-- /page content -->
<script>

function del(no){
	var stotal = parseInt($('#jumlah'+no).val());
    var alltotal = parseInt($('#stotal').val());
    var newtotal = alltotal - stotal;

    $('#stotal').val(newtotal);
    $('#row'+no).remove();
}

$(window).ready(function(){
	$('#transaksi').DataTable();
	$('#transaksi_filter').hide();
	$('#id-barang').select2({
        ajax : {
            url : 'namabarang.php',
            type : 'POST',
            dataType : 'JSON',
            data : function(params){
                return{
                    data : params.term
                };
            },
            processResults : function(data){
                var results = [];

                $.each(data, function(index, item){
                    results.push({
                        id : item.id_barang,
                        text : item.nama_barang
                    })
                });
                return {
                    results : results
                };
            }
        }
    }).on('select2:select', function (evt) {
         var nm = $("#id-barang option:selected").text();
		 $.ajax({
            type : 'POST',
            url : 'hargabarang.php',
            data : { data : nm },
            dataType : 'JSON',
            success : function(res){
				$('#harga').val(res[0].harga);
				$('#idbrg').val(res[0].id_barang);
            }
        })
    });

	$('#tambah').on('click', function(){
		var no = $('#no').val();
		var stotal = parseInt($('#stotal').val());

		var nmbrg = $('#id-barang option:selected').text();
		var harga = $('#harga').val();
		var qty = $('#qty').val();
		var idbrg = $('#idbrg').val();
		var subtotal = parseInt(harga) * parseInt(qty);

		var list = '<div class="row" id="row'+ no +'" style="margin-bottom:10px;">'
                        +'<div class="col-md-4">'
                            +'<input class="form-control" name="nama_barang[]" id="nama'+ no +'" readonly>'
                            +'<input type="hidden" name="id_barang[]" id="idbrg'+ no +'">'
                        +'</div>'
						+'<div class="col-md-2">'
                            +'<input type="text" class="form-control" name="harga[]" id="harga'+ no +'" readonly>'
                        +'</div>'
						+'<div class="col-md-2">'
                            +'<input type="text" class="form-control" name="qty[]" id="qty'+ no +'" readonly>'
                        +'</div>'
						+'<div class="col-md-3">'
                            +'<input type="text" class="form-control" name="stotal[]" id="jumlah'+ no +'" readonly>'
                        +'</div>'
						+'<div class="col-md-1">'
                            +'<a class="btn btn-sm btn-danger" onClick="del('+no+')"> X </a>'
                        +'</div>'
                    +'</div>';
		$('#list').append(list);

		stotal += parseInt(subtotal);

		$('#stotal').val(stotal);
		$('#nama'+no).val(nmbrg);
		$('#harga'+no).val(harga);
		$('#idbrg'+no).val(idbrg);
		$('#qty'+no).val(qty);
		$('#jumlah'+no).val(subtotal);

		var no = (no-1) + 2;
        $('#no').val(no);
	})

	$('#bayar').on('keyup', function(){
		var total = parseInt($('#stotal').val());
		var bayar = parseInt($(this).val());
		var kembalian = bayar - total;

		if (kembalian)
		{
			$('#kembalian').val(kembalian);
		}
		else
		{
			$('#kembalian').val(0);
		}
	})
})
</script>

<?php
include "../templates/footer.php";
}
?>
