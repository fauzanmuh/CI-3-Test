<div class="container">
    <div class="row mt-3">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Detail Data Buku
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $buku['judul']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $buku['penulis']; ?></h6>
                    <p class="card-text"><?= $buku['penerbit']; ?></p>
                    <p class="card-text"><?= $buku['tahun_terbit']; ?></p>
                    <a href="<?= base_url(); ?>buku" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>