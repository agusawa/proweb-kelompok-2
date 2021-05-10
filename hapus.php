<?php

require_once './koneksi/conn.php';

$nim = addslashes($_GET['nim']);

$db->Execute("DELETE FROM `mahasiswa` WHERE `nim` = '$nim'");

echo "Data berhasil dihapus";
