<?php

require_once './koneksi/conn.php';

$nim = $_GET['nim'];

$db->Execute("DELETE FROM `mahasiswa` WHERE `nim` = '$nim'");

echo "Data berhasil dihapus";
