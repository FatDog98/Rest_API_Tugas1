<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>

<body>

    <form action="/todolist/simpan" method="post">
        <?= csrf_field() ?>
        <label for="kegiatan">Masukkan Kegiatan: </label>
        <br>
        <input type="text" name="kegiatan" id="kegiatan" required>
        <input type="submit" value="Simpan">
    </form>

    <h2>Daftar Kegiatan</h2>
    <ol>
        <?php if (!empty($daftarKegiatan) && is_array($daftarKegiatan)): ?>
            <?php foreach ($daftarKegiatan as $keg): ?>
                <?php if ($keg['status'] != 'selesai'): ?>
                    <li>
                        <?= esc($keg['kegiatan']) ?>
                        <a href="/todolist/selesai/<?= esc($keg['idkegiatan']) ?>">selesai</a>&nbsp;
                        <a href="/todolist/hapus/<?= esc($keg['idkegiatan']) ?>">hapus</a>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        <?php else: ?>
            <li>Kosong</li>
        <?php endif ?>
    </ol>

    <h2>Kegiatan Selesai</h2>
    <ol>
        <?php if (!empty($daftarKegiatan) && is_array($daftarKegiatan)): ?>
            <?php foreach ($daftarKegiatan as $keg): ?>
                <?php if ($keg['status'] == 'selesai'): ?>
                    <li>
                        <del><?= esc($keg['kegiatan']) ?></del>
                        <a href="/todolist/hapus/<?= esc($keg['idkegiatan']) ?>">hapus</a>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        <?php else: ?>
            <li>Kosong</li>
        <?php endif ?>
    </ol>

</body>

</html>