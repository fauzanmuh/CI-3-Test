<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <h1 class="mt-3">Daftar Buku</h1>
            <a href="<?= base_url('buku/create'); ?>" class="btn btn-primary mb-3">Tambah Data Buku</a>
            <div class="row">

                <div class="col-lg-12">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari data buku..." name="keyword"
                                autocomplete="off" autofocus>
                            <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($this->session->flashdata('flash')) : ?>
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Buku</strong> berhasil <?php echo $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($buku as $b): ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $b['judul']; ?></td>
                            <td><?= $b['penulis']; ?></td>
                            <td><?= $b['penerbit']; ?></td>
                            <td><?= $b['tahun_terbit']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>buku/delete/<?= $b['id']; ?>" class="badge text-bg-danger" onclick="return confirm('yakin?');">Hapus</a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>