<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku - Perpustakaan Digital</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #007bff; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; font-size: 13px; }
        .btn-tambah { background: #28a745; }
        .btn-edit { background: #ffc107; color: #333; }
        .btn-hapus { background: #dc3545; }
        .btn-logout { background: #6c757d; }
        .search { margin-bottom: 15px; }
        .search input { padding: 8px; width: 250px; }
        .search button { padding: 8px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
        .pagination { margin-top: 20px; }
        .pagination a, .pagination span { margin: 0 5px; padding: 5px 10px; background: #eee; text-decoration: none; color: #333; }
        .pagination .current { background: #007bff; color: white; }
        .alert { padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Perpustakaan Buku Digital</h2>
        <div>
            Halo, <strong><?= $nama ?></strong> | 
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-logout">Logout</a>
        </div>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="search">
        <form method="get" action="<?= base_url('buku') ?>">
            <input type="text" name="q" value="<?= $keyword ?>" placeholder="Cari judul / penulis / penerbit...">
            <button type="submit">Cari</button>
            <?php if($keyword): ?>
                <a href="<?= base_url('buku') ?>">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <a href="<?= base_url('buku/tambah') ?>" class="btn btn-tambah">+ Tambah Buku</a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Penerbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($buku as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b->judul ?></td>
                <td><?= $b->penulis ?></td>
                <td><?= $b->tahun_terbit ?></td>
                <td><?= $b->penerbit ?></td>
                <td><?= $b->stok ?></td>
                <td>
                    <a href="<?= base_url('buku/edit/'.$b->id) ?>" class="btn btn-edit">Edit</a>
                    <a href="<?= base_url('buku/hapus/'.$b->id) ?>" class="btn btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($buku)): ?>
            <tr><td colspan="7" style="text-align:center;">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?= $pagination ?>
</body>
</html>
