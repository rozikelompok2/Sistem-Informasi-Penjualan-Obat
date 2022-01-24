<?php
//membuat query untuk hapus data
$sql="DELETE FROM beli WHERE id_pembelian ='".$_GET['id_pembelian']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=pembelian&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=pembelian&actions=tampil');</scripr>";
}

