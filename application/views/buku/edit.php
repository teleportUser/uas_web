<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; background: white; padding: 20px; border-radius: 8px; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background: #ffc107; border: none; cursor: pointer; }
        a { margin-left: 10px; }
    </style>
</head>
<body>
    <h2>Edit Buku</h2>
    <form action="<?= base_url('buku/update/'.$buku->id) ?>" method="post">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= $buku->judul ?>" required>

        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= $buku->penulis ?>" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="<?= $buku->tahun_terbit ?>">

        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= $buku->penerbit ?>">

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $buku->stok ?>" min="0">

        <button type="submit">Update</button>
        <a href="<?= base_url('buku') ?>">Batal</a>
    </form>
</body>
</html>
