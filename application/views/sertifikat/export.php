<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NO Sertifikat</th>
            <th>Jenis Pelatihan</th>
            <th>Tahun Pelatihan</th>
            <th>Nama Lengkap</th>
            <th>Nip</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Pangkat</th>
            <th>Jabatan</th>
            <th>Nama Instansi</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($semua as $k) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $k['no_sertifikat'] ?></td>
                <td><?= $k['pelatihan'] ?></td>
                <td><?= $k['tahun_pelatihan'] ?></td>
                <td><?= $k['nama_lengkap'] ?></td>
                <td><?= $k['nip'] ?></td>
                <td><?= $k['ttl'] ?></td>
                <td>
                    <?= $k['pangkat'] ?>
                </td>
                <td><?= $k['jabatan'] ?></td>

                <td><?= $k['nama_instansi'] ?></td>

            </tr>
        <?php $i++;
        endforeach; ?>
    </tbody>
</table>