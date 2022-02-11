<?php

include "../../lib/koneksi.php";

if (isset($_POST['data']))
{
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['data']));
    $query = "SELECT id_barang, harga_jualsatuan FROM barang WHERE nama_barang = '".$nama."'";
    $sql = mysqli_query($koneksi, $query);
    $array = [];
    while($data = mysqli_fetch_assoc($sql))
    {
        $array['harga'] = $data['harga_jualsatuan'];
        $array['id_barang'] = $data['id_barang'];
    }
    $arr[] = $array;

    echo json_encode($arr);
}

?>