<div class="mt-5">
    <?php if ($this->session->flashdata("type") == "success") : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?= $this->session->flashdata("message"); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php foreach ($list_product as $product) : ?>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="<?= $product["gambar"]; ?>" alt="Gambar <?= $product["nama_barang"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product["nama_barang"]; ?></h5>
                        <form action="<?= base_url("Home/insertCart"); ?>" method="post">
                            <input type="hidden" name="id" value="<?= $product["id"]; ?>">
                            <input type="hidden" name="nama_barang" value="<?= $product["nama_barang"]; ?>">
                            <input type="hidden" name="harga" value="<?= $product["harga"]; ?>">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i> Rp<?= number_format($product["harga"], 0, ',', '.'); ?>
                            </button>
                        </form>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>