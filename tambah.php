<?php

require_once './koneksi/conn.php';

if ($_POST) {
    $nim = addslashes($_POST['nim']);
    $nama = addslashes($_POST['nama']);
    $uts = $_POST['uts'] ? $_POST['uts'] : 0;
    $uas = $_POST['uas'] ? $_POST['uas'] : 0;
    $tugas = $_POST['tugas'] ? $_POST['tugas'] : 0;

    $handle = $db->Execute("INSERT INTO `mahasiswa` (`nim`, `nama`, `uts`, `uas`, `tugas`) VALUES ('$nim', '$nama', '$uts', '$uas', '$tugas')");

    echo "Data berhasil ditambahkan";
    return;
}
?>

<h3>Tambah Mahasiswa</h3>
<pre>
    NIM:    <input type="text" id="nim">
    Nama:   <input type="text" id="nama">
    UTS:    <input type="text" id="uts">
    UAS:    <input type="text" id="uas">
    Tugas:  <input type="text" id="tugas">
    <input type="button" value="Tambah" onclick="simpan()">
</pre>
