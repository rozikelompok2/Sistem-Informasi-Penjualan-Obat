<?php

include "../../lib/koneksi.php";

if (isset($_POST['data']))
{
    $id = mysqli_real_escape_string($koneksi, trim($_POST['data']));
    $query = "SELECT id_barang,nama_barang FROM barang WHERE id_barang = '".$id."'";
    $sql = mysqli_query($koneksi, $query);
    $array = [];
    while($data = mysqli_fetch_assoc($sql))
    {
        $array['id_barang'] = $data['id_barang'];
        $array['nama_barang'] = $data['nama_barang'];
    }
    $arr[] = $array;

    echo json_encode($arr);
}

?>