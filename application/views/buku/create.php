<div class="container">
    <div class="card mt-5 col-sm-12 col-md-12 col-lg-6">
        <div class="card-header">Tambah Data Buku</div>
        <div class="card-body">
            <!-- <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?> -->
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>">
                    <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= set_value('penulis'); ?>">
                    <div class="form-text text-danger"><?= form_error('penulis'); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= set_value('penerbit'); ?>">
                    <div class="form-text text-danger"><?= form_error('penerbit'); ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= set_value('tahun_terbit'); ?>">
                    <div class="form-text text-danger"><?= form_error('tahun_terbit'); ?></div>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>