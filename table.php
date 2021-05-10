<?php

require_once './koneksi/conn.php';

$dataMahasiswa = $db->Execute("SELECT * FROM `mahasiswa`");

function convertGrade($uts, $uas, $tugas)
{
    $value = ($uts * 30 / 100) + ($uas * 30 / 100) + ($tugas * 40 / 100);

    if ($value >= 90) {
        return 'A';
    } else if ($value >= 80) {
        return 'B';
    } else if ($value >= 70) {
        return 'C';
    } else if ($value >= 60) {
        return 'D';
    } else {
        return 'E';
    }
}

?>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Tugas</th>
            <th>Grade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while ($mahasiswa = $dataMahasiswa->FetchNextObj()) : ?>
            <tr>
                <td><?= htmlentities($mahasiswa->nim) ?></td>
                <td><?= htmlentities($mahasiswa->nama) ?></td>
                <td><?= $mahasiswa->uts ?></td>
                <td><?= $mahasiswa->uas ?></td>
                <td><?= $mahasiswa->tugas ?></td>
                <td><?= convertGrade($mahasiswa->uts, $mahasiswa->uas, $mahasiswa->tugas) ?></td>
                <td>
                    <a href="" onclick="event.preventDefault(); tampilkanFormEdit('<?= htmlentities($mahasiswa->nim) ?>')">Edit</a>
                    <a href="" onclick="event.preventDefault(); hapus('<?= htmlentities($mahasiswa->nim) ?>')">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>