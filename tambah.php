<?php

require_once './koneksi/conn.php';

if ($_POST) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];

    $handle = $db->Execute("INSERT INTO `mahasiswa` (`nim`, `nama`, `uts`, `uas`, `tugas`) VALUES ('$nim', '$nama', '$uts', '$uas', '$tugas')");

    echo "Data berhasil ditambahkan";
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
