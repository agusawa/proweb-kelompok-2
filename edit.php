<?php

require_once './koneksi/conn.php';

$nim = addslashes($_GET['nim']);
$result = $db->Execute("SELECT * FROM `mahasiswa` WHERE nim = '$nim'");
$mahasiswa = $result->FetchObj();

if ($_POST) {
    $nimLama = addslashes($_GET['nim']);

    $nim = addslashes($_POST['nim']);
    $nama = addslashes($_POST['nama']);
    $uts = $_POST['uts'] ? $_POST['uts'] : 0;
    $uas = $_POST['uas'] ? $_POST['uas'] : 0;
    $tugas = $_POST['tugas'] ? $_POST['tugas'] : 0;
    
    $db->Execute("UPDATE `mahasiswa` SET `nim` = '$nim', `nama` = '$nama' , `uts` = '$uts', `uas` = '$uas', `tugas` = '$tugas' WHERE `nim` = '$nimLama'");
    echo "Data berhasil diedit";
    return;
}

?>

<h3>Edit Mahasiswa</h3>
<pre>
    NIM:    <input type="text" id="nim" value="<?= htmlentities($mahasiswa->nim) ?>">
    Nama:   <input type="text" id="nama" value="<?= htmlentities($mahasiswa->nama) ?>">
    UTS:    <input type="text" id="uts" value="<?= $mahasiswa->uts ?>">
    UAS:    <input type="text" id="uas" value="<?= $mahasiswa->uas ?>">
    Tugas:  <input type="text" id="tugas" value="<?= $mahasiswa->tugas ?>">
    <input type="button" value="Edit" onclick="edit('<?= htmlentities($mahasiswa->nim) ?>')"> <input type="button" value="Batal" onclick="tampilkanFormTambah()">
</pre>
