<?php

require_once './koneksi/conn.php';

$nim = $_GET['nim'];
$result = $db->Execute("SELECT * FROM `mahasiswa` WHERE nim = '$nim'");
$mahasiswa = $result->FetchObj();

if ($_POST) {
    $nimLama = $_GET['nim'];

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];
    
    $db->Execute("UPDATE `mahasiswa` SET `nim` = '$nim', `nama` = '$nama' , `uts` = '$uts', `uas` = '$uas', `tugas` = '$tugas' WHERE `nim` = '$nimLama'");
    echo "Data berhasil diedit";
    return;
}

?>

<h3>Edit Mahasiswa</h3>
<pre>
    NIM:    <input type="text" id="nim" value="<?= $mahasiswa->nim ?>">
    Nama:   <input type="text" id="nama" value="<?= $mahasiswa->nama ?>">
    UTS:    <input type="text" id="uts" value="<?= $mahasiswa->uts ?>">
    UAS:    <input type="text" id="uas" value="<?= $mahasiswa->uas ?>">
    Tugas:  <input type="text" id="tugas" value="<?= $mahasiswa->tugas ?>">
    <input type="button" value="Edit" onclick="edit('<?= $mahasiswa->nim ?>')"> <input type="button" value="Batal" onclick="tampilkanFormTambah()">
</pre>
