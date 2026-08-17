<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; background: white; padding: 20px; border-radius: 8px; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; }
        a { margin-left: 10px; }
    </style>
</head>
<body>
    <h2>Tambah Buku Baru</h2>
    <form action="<?= base_url('buku/simpan') ?>" method="post">
        <label>Judul</label>
        <input type="text" name="judul" required>

        <label>Penulis</label>
        <input type="text" name="penulis" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" min="1900" max="2099">

        <label>Penerbit</label>
        <input type="text" name="penerbit">

        <label>Stok</label>
        <input type="number" name="stok" value="1" min="0">

        <button type="submit">Simpan</button>
        <a href="<?= base_url('buku') ?>">Batal</a>
    </form>
</body>
</html>
